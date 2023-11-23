<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();

        return [
            'status_code' => 200,
            'message' => 'Category list fetched successfully.',
            'data' => $categories
        ];
    }

    function show($id)
    {
        $validator = Validator::make(['id' => $id], ['id' => 'required|numeric|exists:categories,id']);
        if ($validator->fails()) {
            return [
                'status_code' => 404,
                'message' => 'No Category found.'
            ];
        }

        $category = Category::find($id);
        return [
            'status_code' => 200,
            'message' => 'Category has been found successfully.',
            'data' => $category
        ];
    }
}
