<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Type;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('status',1)
        ->get();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $category=new Category();
//        $category->name= ['en' => 'English 2. kategori', 'fr' => 'French 2. kategori'];
//        $category->image= 'denemeurl';
//        $category->save();

//        dd(Category::find(5)->name);


        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->cat_name;

        if ($request->file('image')) {
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/cat_images', $imageName);
            $category->image = $imageName;

        }

        $saved = $category->save();

        if ($saved)
            toastr()->success('Record Is Successfully Updated');
        else
            toastr()->error('Oops! Something\'s Went Wrong');

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->cat_name;

        if ($request->file('image')) {

            if ($category->image and file_exists(storage_path("app\\public\\images\\cat_images\\$category->image")))
                unlink(storage_path("app\\public\\images\\cat_images\\$category->image"));

            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/cat_images', $imageName);
            $category->image = $imageName;

        }

        $saved = $category->save();

        if ($saved)
            toastr()->success('Record Is Successfully Saved');
        else
            toastr()->error('Oops! Something\'s Went Wrong');

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

//        if ($category->image and file_exists(unlink(storage_path("app\\public\\images\\cat_images\\$category->image"))))
//            unlink(storage_path("app\\public\\images\\cat_images\\$category->image"));
        $category->status = 0;
        $type = $category->type;
        foreach ($type as $types){
            $types->status = 0;
            $category->type()->save($types);
        }

        $saved = $category->save();

        if ($saved)
            toastr()->success('Record Is Successfully Deleted');
        else
            toastr()->error('Oops! Something\'s Went Wrong');

        return redirect()->route('admin.category.index');
    }
}
