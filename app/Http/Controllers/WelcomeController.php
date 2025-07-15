<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function getCategory()
    {
        $categories = Category::where('is_active', 1)->select('id', 'slug', 'name', 'icon', 'color', 'description')->get();

        return response()->json([
            'success' => true,
            'categories' => $categories
        ], 200);
    }
}
