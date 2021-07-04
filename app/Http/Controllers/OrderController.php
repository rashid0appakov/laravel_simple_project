<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;
use Storage;
class OrderController extends Controller
{
    public function index(){
        $orders = Order::latest()->paginate(50);
        return view('admin.orders.index', compact('orders'));
    }
    public function store(Request $request){
        $data = $request->except('file');
        if($request->hasFile('file')){
            $data['file'] = $request->file('file')->store('orders');
        }
        $order = Order::create($data);
        $services = [];
        foreach($request->services as $item){
            $item['order_id'] = $order->id;
            $services[] = $item;
        }
        $order->services()->insert($services);
        session()->flash('success', 'Новый заказ успешно добавлен');
        return redirect()->route('admin.orders.index');
    }
    public function doc1(Order $order){
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $order->load(['company', 'client', 'services', 'services.code']);
        $pdf = PDF::loadView('exports.doc1', [ 
            'order'     => $order,
            'company'   => $order->company,
            'client'    => $order->client
        ]);
        return $pdf->download("Акт приема на утилизацию отходов № $order->id.pdf");
    }
    public function file(Order $order){
        if(!$order->file) abort(404);
        $tmp = explode('.', $order->file);
        $ext = $tmp[count($tmp) - 1];
        $name = 'Договор';
        if($order->doc) $name .= ' '. $order->doc;
        if($order->doc_date) $name .= ' от'. $order->doc_date;
        $name .= '.' . $ext;
        return Storage::download($order->file, $name);
    }
    public function edit(Order $order){
        $order->load(['company', 'client', 'services', 'services.code']);
        return view('admin.orders.edit', compact('order'));
    }
    public function create(){
        return view('admin.orders.create');
    }
    public function update(Request $request, Order $order){
        $data = $request->except(['file', 'services']);
        if($request->hasFile('file')){
            if($order->file) Storage::delete($order->file);
            $data['file'] = $request->file('file')->store('orders');
        }
        $order->update($data);
        $order->services()->delete();
        $services = [];
        foreach($request->services as $item){
            $item['order_id'] = $order->id;
            $services[] = $item;
        }
        $order->services()->insert($services);
        session()->flash('success', 'Заказ успешно обновлен');
        return redirect()->route('admin.orders.edit', $order->id);
    }
    public function destroy(Order $order){
        if($order->file) Storage::delete($order->file);
        $order->delete();
        session()->flash('success', 'Заказ успешно удален');
        return redirect()->route('admin.orders.index');
    }
}
