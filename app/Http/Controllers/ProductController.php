<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $title = "Khanh proplayer";
        return view('product.index', compact('title'));
    }

    public function detail($id) {
        $title = "Khanh proplayer";
        return $id;
    }
}
