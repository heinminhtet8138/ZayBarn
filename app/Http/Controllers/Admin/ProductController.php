<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(10);
        // dd($products);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // dd($request);
        $products = Product::create($request->all());

        //file upload
        $file_name = time().'.'.$request->image->extension(); // 2121212112.png
        $upload = $request->image->move(public_path('images/products/'),$file_name);
        if($upload){
            $products->image = $file_name;
        }
        
        $products->save();
        return redirect()->route('backend.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($id);
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $product = Product::find($id);
        $product->update($request->all());

        if($request->hasFile('image')) {
            //file upload
            $file_name = time().'.'.$request->image->extension(); // 2121212112.png
            $upload = $request->image->move(public_path('images/products/'),$file_name);
            if($upload){
                $product->image = $file_name;
            }
        }else {
            $product->image = $request->old_image;
        }

        $product->save();
        return redirect()->route('backend.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // echo $id;
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('backend.products.index');
    }
}
