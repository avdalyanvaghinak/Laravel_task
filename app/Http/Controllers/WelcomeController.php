<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index()
    {

        $products = Product::All();
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('index', compact('products'))->with([
            'categories' => $categories
        ]);

    }

    public function subCategory(Request $request)
    {

        $parent_id = $request->cat_id;

        $children = Category::where('id', $parent_id)
            ->with('children')
            ->get();

        return response()->json([
            'children' => $children
        ]);
    }

    public function getProduct(Request $request)
    {

        $parent_id = $request->cat_id;

        $product = Product::where('category_id', $parent_id)->get();

        return response()->json([
            'product' => $product
        ]);
    }

}
