<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'bio' => 'required',
        ]);

        Author::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'bio' => $request->bio,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully!',
        ], 200);
    }

    public function getAll() {
        
    }
}
