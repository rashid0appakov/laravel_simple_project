<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Client;
class LeadController extends Controller
{
    public function index(Request $request){
        return view('admin.leads.index');
    }
    public function getData(Request $request){
        $leads = Lead::with('client')->latest()->paginate(50);
        return $leads;
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required'
        ]);
        $data = $request->only(['name', 'email', 'phone', 'message']);
        $client = Client::where('email', $data['email'])->first();
        if($client) $data['client_id'] = $client->id;
        Lead::create($data);
        return back();
    }
    public function show(Lead $lead){
        return $lead;
    }
    public function client(Lead $lead){
        $client = $lead->client()->firstOrCreate([
            'email' => $lead->email
        ], [
            'contact' => $lead->name,
            'email' => $lead->email,
            'phone' => $lead->phone
        ]);
        Lead::whereEmail($lead->email)->update([
            'client_id' => $client->id
        ]);
        return $client;
    }
}
