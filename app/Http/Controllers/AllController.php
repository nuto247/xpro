<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class AllController extends Controller
{
    //

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function addproducts()
    {
        $user = Auth::user();

        return view('addproducts', compact('user'));
    }

  

    public function addproduct(Request $request)
    {

        $validatedData = $request->validate([
            'product_name' => 'required|string',
            'product_description' => 'required|string',
            'product_price' => 'required|int',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);



        $product = new Product();

    

        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description');
        $product->product_price = $request->input('product_price');


        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('images'), $imageName);
    
    
        $product->image_path = $imageName;
   


        $product->save();

        return redirect()->route('listproducts')->with('success', 'Product added successfully!');
    }


    public function listproducts()
    {
        $user = Auth::user();

        $products = Product::all();

        return view('listproducts', compact('user','products'));
    }

    
    public function dashboard()
    {
        $user = Auth::user();

        return view('dashboard', compact('user'));
    }
}
