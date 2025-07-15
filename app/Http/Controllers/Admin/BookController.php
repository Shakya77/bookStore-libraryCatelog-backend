<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function getAuthor()
    {
        $author = Author::where('is_active', true)->select('id', 'name')->get();

        return response()->json([
            'success' => true,
            'data' => $author,
        ], 200);
    }

    public function getCategories()
    {
        $category = Category::where('is_active', true)->select('id', 'name')->get();

        return response()->json([
            'success' => true,
            'data' => $category,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'published_at' => 'required',
            'author' => 'required',
            'category' => 'required'
        ]);

        if (request()->has('coverImage') && (request('coverImage') != null)) {
            $slug = rand();
            $imagePath = request('coverImage');
            $randomNumber = rand(1000, 9999);
            $timestamp = time();
            $new_profile_image = "{$slug}_{$timestamp}_{$randomNumber}.png";
            $destinationPath = 'uploads/book_cover';
            Storage::putFileAs($destinationPath, $imagePath, $new_profile_image);
        }

        if (request()->has('sample_pdf') && (request('sample_pdf') != null)) {
            $slug = rand();
            $imagePath = request('sample_pdf');
            $randomNumber = rand(1000, 9999);
            $timestamp = time();
            $sample_pdf = "{$slug}_{$timestamp}_{$randomNumber}.pdf";
            $destinationPath = 'uploads/book_cover';
            Storage::putFileAs($destinationPath, $imagePath, $sample_pdf);
        }

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'published_at' => $request->published_at,
            'author_id' => $request->author,
            'category_id' => $request->category,
            'cover_image' => $new_profile_image ?? null,
            'sample_pdf' => $sample_pdf ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Book created successfully!',
        ], 200);
    }

    public function getAll()
    {
        $books = Book::where('is_active', true);

        return response()->json([
            'success' => true,
            'data' => $books->get()->map(function ($book) {
                return [
                    'id' => $book->id,
                    'title' => $book->title,
                    'description' => $book->description,
                    'published_at' => $book->published_at,
                    'author' => $book->author->name,
                    'author_id' => $book->author_id,
                    'category' => $book->category->name,
                    'category_id' => $book->category_id,
                    'cover_image' => $book->cover_image,
                    'sample_pdf' => $book->sample_pdf,
                    'rating_avg' => $book->rating_avg,
                    'created_at' => $book->created_at,
                ];
            })
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'published_at' => 'required',
            'author' => 'required',
            'category' => 'required'
        ]);

        $book->fill([
            'title' => $request->title,
            'description' => $request->description,
            'published_at' => $request->published_at,
            'author_id' => $request->author,
            'category_id' => $request->category,
            'cover_image' => $new_profile_image ?? null,
            'sample_pdf' => $sample_pdf ?? null,
        ]);

        if (request()->has('coverImage') && (request('coverImage') != null)) {
            $slug = rand();
            $imagePath = request('coverImage');
            $randomNumber = rand(1000, 9999);
            $timestamp = time();
            $new_profile_image = "{$slug}_{$timestamp}_{$randomNumber}.png";
            $destinationPath = 'uploads/book_cover';
            Storage::putFileAs($destinationPath, $imagePath, $new_profile_image);
            $book->cover_image = $new_profile_image;
        }

        $book->save();

        return response()->json([
            'message' => 'Book updated successfully',
            'success' => true,
        ]);
    }

    public function destroy($id)
    {
        $author = Book::findOrFail($id);
        $author->delete();

        return response()->json([
            'message' => 'Category deleted successfully',
            'success' => true,
        ]);
    }
}
