<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'icon' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::create([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully!',
        ]);
    }

    public function getAll()
    {
        $authors = Category::select('id', 'name', 'icon', 'created_at')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'data' => $authors,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        $category->fill([
            'name' => $validated['name'],
            'icon' => $validated['icon'],
        ]);

        $category->save();

        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $category,
            'id' => $category->id,
            'success' => true,
        ]);
    }

    public function destroy($id)
    {
        $author = Category::findOrFail($id);
        $author->delete();

        return response()->json([
            'message' => 'Category deleted successfully',
            'success' => true,
        ]);
    }
}
