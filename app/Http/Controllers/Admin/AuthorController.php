<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if (request()->has('profileImage') && (request('profileImage') != null)) {
            $slug = rand();
            $imagePath = request('profileImage');
            $randomNumber = rand(1000, 9999);
            $timestamp = time();
            $new_profile_image = "{$slug}_{$timestamp}_{$randomNumber}.png";
            $destinationPath = 'uploads/authors';
            Storage::putFileAs($destinationPath, $imagePath, $new_profile_image);
        }

        Author::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'bio' => $request->bio,
            'image' => $new_profile_image ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully!',
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'birthday' => 'required|date',
            'profileImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $author->fill([
            'name' => $validated['name'],
            'bio' => $validated['bio'],
            'birthday' => $validated['birthday'],
        ]);

        if (request()->has('profileImage') && (request('profileImage') != null)) {
            $slug = rand();
            $imagePath = request('profileImage');
            $randomNumber = rand(1000, 9999);
            $timestamp = time();
            $new_profile_image = "{$slug}_{$timestamp}_{$randomNumber}.png";
            $destinationPath = 'uploads/authors';
            Storage::putFileAs($destinationPath, $imagePath, $new_profile_image);
            $author->image = $new_profile_image;
        }

        $author->save();

        return response()->json([
            'message' => 'Author updated successfully',
            'data' => $author,
            'id' => $author->id,
            'success' => true,
        ]);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json([
            'message' => 'Author deleted successfully',
            'success' => true,
        ]);
    }
}
