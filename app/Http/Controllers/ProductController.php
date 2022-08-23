<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */ /* add product */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'category_id' => 'required',
            'tax_id' => 'required',
            'product_code' => 'string|nullable',
            'image_primary' => 'image|nullable|max:1999',
            'image_secondary' => 'image|nullable|max:1999',
            'image_ter' => 'image|nullable|max:1999',
            'video_mp4' => 'nullable|file|max:1999',
        ]);

        if ($request->hasFile('image_primary')) {
            Storage::putFileAs('public/images/products', $request->file('image_primary'), $request->file('image_primary')->getClientOriginalName());

            $validated['image_primary'] = $request->file('image_primary')->getClientOriginalName();
        }

        if ($request->hasFile('image_secondary')) {
            Storage::putFileAs('public/images/products', $request->file('image_secondary'), $request->file('image_secondary')->getClientOriginalName());

            $validated['image_secondary'] = $request->file('image_secondary')->getClientOriginalName();
        }

        if ($request->hasFile('image_ter')) {
            Storage::putFileAs('public/images/products', $request->file('image_ter'), $request->file('image_ter')->getClientOriginalName());

            $validated['image_ter'] = $request->file('image_ter')->getClientOriginalName();
        }

        if ($request->hasFile('video_mp4')) {
            Storage::putFileAs('public/videos', $request->file('video_mp4'), $request->file('video_mp4')->getClientOriginalName());

            $validated['video_mp4'] = $request->file('video_mp4')->getClientOriginalName();
        }

        Product::create($validated);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.show-product', compact('product'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.update-products', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'category_id' => 'required',
            'tax_id' => 'required',
            'product_code' => 'string|nullable',
            'image_primary' => 'image|nullable|max:1999',
            'image_secondary' => 'image|nullable|max:1999',
            'image_ter' => 'image|nullable|max:1999',
            'video_mp4' => 'nullable|file|max:1999',
        ]);

        if ($request->hasFile('image_primary')) {
            Storage::putFileAs('public/images/products', $request->file('image_primary'), $request->file('image_primary')->getClientOriginalName());

            $validated['image_primary'] = $request->file('image_primary')->getClientOriginalName();
        }

        if ($request->hasFile('image_secondary')) {
            Storage::putFileAs('public/images/products', $request->file('image_secondary'), $request->file('image_secondary')->getClientOriginalName());

            $validated['image_secondary'] = $request->file('image_secondary')->getClientOriginalName();
        }

        if ($request->hasFile('image_ter')) {
            Storage::putFileAs('public/images/products', $request->file('image_ter'), $request->file('image_ter')->getClientOriginalName());

            $validated['image_ter'] = $request->file('image_ter')->getClientOriginalName();
        }

        if ($request->hasFile('video_mp4')) {
            Storage::putFileAs('public/videos', $request->file('video_mp4'), $request->file('video_mp4')->getClientOriginalName());

            $validated['video_mp4'] = $request->file('video_mp4')->getClientOriginalName();
        }

        $product->update($validated);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admindashboard');
    }
}
