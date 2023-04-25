<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
   public function index() {
    // $title = "Welcome to my Laravel course";
    // $description = "Created by some youtube guy";

    // $data = [
    //     'productOne' => 'iPhone',
    //     'productTwo' => 'Samsung'
    // ];

    // // Directly in the view
    // return view('products.index', [
    //     'data' => $data
    // ]);

    print_r(route('products'));

    return view('products.index');

   }
}
