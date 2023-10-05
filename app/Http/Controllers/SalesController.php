<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAlamat;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $data['customers'] = Customer::get();
        return view('welcome', $data);
    }
    public function getDataSales($id)
    {
        $alamat = CustomerAlamat::where('customer_id', $id)->latest()->first();
        $sales = Sales::where('customer_id', $id)->get();
        return compact('alamat', 'sales');
    }
}
