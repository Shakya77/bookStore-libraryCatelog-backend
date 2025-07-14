<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/uploads/{type}/{filename}', function ($type, $filename) {
    $allowed_types = ['authors'];
    if (in_array($type, $allowed_types)) {
        $path = storage_path('app/uploads/' . $type . '/' . $filename);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);
        $size = File::size($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        $response->header("Content-Length", $size);
        return $response;
    }
    abort(404);
})->name('assets.uploads');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::get('/getinfo', [LoginController::class, 'getInfo']);
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);

Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
Route::get('/author/getAll', [AuthorController::class, 'getAll'])->name('author.getAll');
Route::put('/author/{id}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('/author/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');

Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/getAll', [CategoryController::class, 'getAll'])->name('category.getAll');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
