<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->type_id = $request->type_id;
        $product->width = $request->width;
        $product->length = $request->length;
        $product->price = $request->price;
        $product->price_m2 = $request->price_m2;
        $product->insulation = $request->insulation;
        $product->door = $request->door;
        $product->steep_height = $request->steep_height;
        $product->height_middle = $request->height_middle;
        $product->square_meters = $request->square_meters;
        $product->foot_height = $request->foot_height;
        $product->foot_count = $request->foot_count;
        $product->description = $request->description;

        if ($request->file('image')) {
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/prds_images', $imageName);
            $product->image = $imageName;

        }


        $saved = $product->save();

        if ($saved)
            toastr()->success('Record Is Successfully Saved');
        else
            toastr()->error('Oops! Something\'s Went Wrong');

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {


        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->category_id = $request->category_id;
        $product->type_id = $request->type_id;
        $product->width = $request->width;
        $product->length = $request->length;
        $product->price = $request->price;
        $product->price_m2 = $request->price_m2;
        $product->insulation = $request->insulation;
        $product->door = $request->door;
        $product->steep_height = $request->steep_height;
        $product->height_middle = $request->height_middle;
        $product->square_meters = $request->square_meters;
        $product->foot_height = $request->foot_height;
        $product->foot_count = $request->foot_count;
        $product->description = $request->description;

        if ($request->file('image')) {

            if ($product->image and file_exists(storage_path("app\\public\\images\\prds_images\\$product->image")))
                unlink(storage_path("app\\public\\images\\prds_images\\$product->image"));
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/prds_images', $imageName);
            $product->image = $imageName;

        }


        $saved = $product->save();

        if ($saved)
            toastr()->success('Record Is Successfully Updated');
        else
            toastr()->error('Oops! Something\'s Went Wrong');

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image and file_exists(storage_path("app\\public\\images\\prds_images\\$product->image")))
            unlink(storage_path("app\\public\\images\\prds_images\\$product->image"));
        $saved = $product->delete();

        if ($saved)
            toastr()->success('The record was deleted.');
        else
            toastr()->error('Oops! Something\'s Went Wrong');

        return redirect()->route('admin.product.index');

    }
}
