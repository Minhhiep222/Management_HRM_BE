<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;

class ManagerController extends Controller
{
    //
    public function index(){
        $managers = Manager::with("members")->get();
        return response()->json([
            "managers" => $managers
        ]);
    }
}