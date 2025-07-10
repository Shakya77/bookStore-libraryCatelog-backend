<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        return view('admin.author.index');
    }

    public function create()
    {
        return view('admin.author.create');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'birthday' => 'required',
            'bio' => 'required',
        ]);
        return response()->json([
            'success' => false,
            'meesage' => $validate->errors(),
        ]);

        $author = Author::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'bio' => $request->bio,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully!',
            'data' => $author,
        ]);
    }
}
