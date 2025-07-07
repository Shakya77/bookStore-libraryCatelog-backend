<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author_id' => 'required',
            'description' => 'required',
            'isbn' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required',
        ]);
    }
}
