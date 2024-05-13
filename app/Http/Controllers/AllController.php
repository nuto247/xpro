<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class AllController extends Controller
{
    //

    public function welcome()
    {
        $products = Product::all();

        return view('welcome', compact('products'));
    }

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

    public function editproducts(Request $request, $id)

    {
        if ($request->hasFile('image'))
        $validatedData = $request->validate([

            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|string',
            'product_description' => 'required|string',
            'product_price' => 'required|int',
          

        ]);

        $user = Auth::user();
        $product = Product::find($id);
        return view('addproductsedit', compact('product','user'));
    }



    
    public function productupdate(Request $request)
    {


        $product  = Product::find($request->id);

        $product->product_name = request('product_name');

        $product->product_price = request('product_price');

        $product->product_description = request('product_description');


        
        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('images'), $imageName);
    
    
        $product->image_path = $imageName;



        $product->save();





        return redirect('listproducts');
    }

    public function productdetail(Request $request, $id)
    {
        $product  = Product::find($request->id);

        $user = Auth::user();

        return view('productdetail', compact('product', 'user'));
    }


    
    public function dashboard()
    {
        $user = Auth::user();

        return view('dashboard', compact('user'));
    }



    public function deleteproduct($id)
    {
        // Find the record by its ID
        $record = Product::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        // Delete the record
        $record->delete();

        return redirect('listproducts');
    }
}
