<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
class LogController extends Controller
{
    public function index(){
        $logs = Log::latest()->paginate(50);
        return view('admin.logs.index', compact('logs'));
    }
}
