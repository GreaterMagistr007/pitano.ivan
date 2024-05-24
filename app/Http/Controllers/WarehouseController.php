<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WarehouseController extends Controller
{
    public function index(Request $request, Restaurant $restaurant)
    {
        return view('warehouse', ['restaurants' => $restaurant->all()]);
    }

    public function edit($id)
    {
        session()->forget('warehouse');
        Session::put('warehouse', $id);

        return redirect('/');
    }
}
