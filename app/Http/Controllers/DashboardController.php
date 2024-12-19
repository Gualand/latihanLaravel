<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        return view('page.dashboard');
    }

    public function inputData() {
        return view('page.fromInput');
    }

    public function kirimData(Request $request) {
        $name = $request->input('name');
        $address = $request->input('address');

        return view('page.data', ['name' => $name, 'address' => $address]);
    }

    public function dataTable(){
        return view('page.dataTable');
    }
}
