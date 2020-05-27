<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use App\Models\Category;
use Auth;
use Cart;

class ProductController extends Controller
{


    public function index(){

        $products = Product::All();
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('products.show')->with('products',$products)
                                          ->with('categories',$categories);
    }

    public function store(Request $request){

        $products = new Product();

        $products->user_id = Auth::id();
        $products->category_id = $request->input('category_id');
        $products->title = $request->input('title');
        $products->price = $request->input('price');
        $products->country = $request->input('country');
        $products->age = $request->input('age');
        $products->description = $request->input('description');

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $location = public_path('/images/'.$filename);
            Image::make($image)->resize(150, 150)->save($location);
            $products->image = $filename;
            $products->save();
        }

//        $products->save();

        return redirect('/product')->with('status','Date added sucseccfuly');
    }


    public function edit(Product $products, $id){


        $products = Product::findOrFail($id);
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('products.edit')->with('products', $products)
                                          ->with('categories',$categories);
    }

    public function update(Request $request, $id){

        $products = Product::findOrFail($id);

        $products->user_id = Auth::id();
        $products->category_id = $request->input('category_id');
        $products->title = $request->input('title');
        $products->price = $request->input('price');
        $products->country = $request->input('country');
        $products->age = $request->input('age');
        $products->description = $request->input('description');

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $location = public_path('/images/'.$filename);
            Image::make($image)->resize(150, 150)->save($location);
            $products->image = $filename;

        }
        $products->update();
        return redirect('/product')->with('status','Product Apdated');
    }

    public function delete($id){
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect('product')->with('status','Product Deleted');

    }

    public function addToCart(Request $request,$id)
    {
        $item = Product::find($id);

        Cart::add(uniqid(), $item->title, $request->input('price'), $request->input('qty'));

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

}
