<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Order;
class ClientController extends Controller
{
    public function search(Request $request){
        $q = $request->q;
        return Client::where('name', 'like', "%$q%")->orWhere('phone', 'like', "%$q%")->orWhere('email', 'like', "%$q%")->get();
    }
    public function home(){
        return view('client.index');
    }
    public function getOrders(){
        $orders = auth()->user()->orders()->paginate(15);
        return view('client.orders.index', compact('orders'));
    }
    public function showOrder(Order $order){
        if($order->client_id != auth()->user()->id) abort(403);
        $orders = auth()->user()->orders()->paginate(15);
        return view('client.orders.index', compact('orders'));
    }
    public function index(Request $request){
        $q = $request->q;
        $form = $request->form;
        $clients = false;
        if($form) $clients = Client::whereForm($form);
        if($q){
            if($clients) $clients = $clients->where('name', 'like', "%$q%")->orWhere('email', 'like', "%$q%")->orWhere('phone', 'like', "%$q%");
            else $clients = Client::where('name', 'like', "%$q%")->orWhere('email', 'like', "%$q%")->orWhere('phone', 'like', "%$q%");
        }
        if($clients) $clients = $clients->paginate(50);
        else $clients = Client::paginate(50);
        return view('admin.clients.index', compact('clients', 'q', 'form'));
    }
    public function create(){
        return view('admin.clients.create');
    }
    public function order(Client $client){
        $order = $client->orders()->create();
        session()->flash('success', 'Новый заказ успешно создан');
        return redirect()->route('admin.orders.edit', $order->id);
    }
    public function edit(Client $client){
        return view('admin.clients.edit', compact('client'));
    }
    public function destroy(Client $client){
        $client->delete();
        session()->flash('success', 'Клиент успешно удален');
        return redirect()->route('admin.clients.index');
    }
    public function store(Request $request){
        Client::create($request->all());
        session()->flash('success', 'Клиент успешно добавлен');
        return redirect()->route('admin.clients.index');
    }
    public function update(Request $request, Client $client){
        $client->update($request->all());
        session()->flash('success', 'Клиент успешно обновлен');
        return redirect()->route('admin.clients.index');
    }
}
