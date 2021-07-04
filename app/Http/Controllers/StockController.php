<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
class StockController extends Controller
{
    public function search(Request $request){
        $q = $request->q;
        return Stock::where('name', 'like', "%$q%")->orWhere('address', 'like', "%$q%")->get();
    }
    public function index(){
        $stocks = Stock::paginate(50);
        return view('admin.stocks.index', compact('stocks'));
    }
    public function create(){
        return view('admin.stocks.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'nullable|numeric'
        ]);
        $data = $request->only(['name', 'address', 'size', 'filled']);
        Stock::create($data);
        session()->flash('success', 'Новый склад успешно добавлен');
        return redirect()->route('admin.stocks.index');
    }
    public function edit(Stock $stock){
        return view('admin.stocks.edit', compact('stock'));
    }
    public function update(Request $request, Stock $stock){
        $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'nullable|numeric'
        ]);
        $data = $request->only(['name', 'address', 'size', 'filled']);
        $stock->update($data);
        session()->flash('success', 'Склад успешно обновлен');
        return redirect()->route('admin.stocks.index');
    }
    public function destroy(Stock $stock){
        $stock->delete();
        session()->flash('success', 'Склад успешно удален');
        return redirect()->route('admin.stocks.index');
    }
}
