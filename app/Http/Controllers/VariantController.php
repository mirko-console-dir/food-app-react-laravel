<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreVariantRequest;
use App\Http\Requests\UpdateVariantRequest;
use App\Models\Variant;
use App\Models\Product;



class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.variants.variants');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.variants.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVariantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVariantRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image_primary' => 'image|nullable|max:1999',
            'description' => 'required',
            'price' => 'required',
            'tax_id' => 'required',
        ]);
        if ($request->hasFile('image_primary')) {
            Storage::putFileAs('public/images/products/variants', $request->file('image_primary'), $request->file('image_primary')->getClientOriginalName());

            $validated['image_primary'] = $request->file('image_primary')->getClientOriginalName();
        }


        Variant::create($validated);

        return redirect()->route('variants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function show(Variant $variant)
    {
        return view('admin.variants.show-variant', compact('variant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function edit(Variant $variant)
    {
        return view('admin.variants.edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVariantRequest  $request
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVariantRequest $request, Variant $variant)
    {
        $validated = $request->validate([
            'image_primary' => 'image|nullable|max:1999',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'tax_id' => 'required',
        ]);
        if ($request->hasFile('image_primary')) {
            Storage::putFileAs('public/images/products/variants', $request->file('image_primary'), $request->file('image_primary')->getClientOriginalName());

            $validated['image_primary'] = $request->file('image_primary')->getClientOriginalName();
        }

        $variant->update($validated);
       
        return redirect()->route('variants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variant $variant)
    {
        $variant->delete();
        return redirect()->route('variants.index');

    }
}
