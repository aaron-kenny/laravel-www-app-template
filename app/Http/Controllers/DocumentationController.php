<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('documentation.index');
    }
    
    public function show($product_name)
    {
        return view("documentation.{$product_name}");
    }
}