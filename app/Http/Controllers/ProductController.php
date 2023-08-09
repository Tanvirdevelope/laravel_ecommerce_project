<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= product::paginate(3);
        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function addProduct(){
        $products= Product::all();
        $returnProducts= array();

        foreach ($products as $product){
            $images= explode('|', $product->image);

            $returnProducts[] = [
                'name'=> $product->name,
                'price'=> $product->price,
                'amount'=> $product->amount,
                'image'=> $images[0]
            ];
        }
    
        return view('add_product', compact('returnProducts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product= new Product();
        $product->name= $request->has('name')? $request->get('name'):'';
        $product->price= $request->has('price')? $request->get('price'):'';
        $product->amount= $request->has('amount')? $request->get('amount'):'';
        $product->is_active= 1;

        if($request->hasFile('images')){
            $files= $request->file('images');
            $imageLocation= array();
            $i=0;
            foreach ($files as $file){
                $extension = $file->getClientOriginalExtension();
                $fileName= 'product_'. time() . ++$i . '.' . $extension;
                $location= '/images/uploads/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation[]= $location. $fileName;

            }

            $product->image= implode('|', $imageLocation);
            $product->save();
            return back()->with('success', 'Product Successfully Saved');
        }else{
            return back()->with('error', 'Product was Not Successfully');
        }

       
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $images= explode('|', $product->image);
        return view('product_details', compact('product','images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function home()
    {
        $featured_products= Product::orderBy('price', 'desc')->limit(4)->get();
        $latest_products= Product::orderBy('created_at', 'desc')->limit(2)->get();

        return view('welcome', compact('featured_products', 'latest_products'));
    }
    
    
}
