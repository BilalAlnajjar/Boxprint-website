<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('pages.admin.categories',[
            'categories' => $categories,
        ]);
    }

    function active_home(Request $request)
    {
        $id = $request->id;
        if ($id == null) {
            return response()->json(['error' => __('the vendor is not found')]);
        }
        $category = Category::where('id', '=', $id)->first();
        if ($category == null) {
            return response()->json(['error' => __('the category is not found')]);
        }
        if ($category->status == 'active') {
            $category->status = 'deactivate';
            $category->update();
            return response()->json(['error' => parent::CurrentLangShow()->Disable]);
        } else {
            $category->status = 'active';
            $category->update();
            return response()->json(['success' => parent::CurrentLangShow()->Active]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
      $request->validated();

        $category = Category::create([
            'name' => $request->name,
        ]);

      if($request->file('image')) {

          $path = $request->file('image')->store('/imagesSite', ['disk' => 'uploads']);
          $category->update([
              'image' => $path,
          ]);
      }



        if($request->sub_title){
            $category->update([
                'sub_title' => $request->sub_title,
            ]);
        }

        $request->session()->put('message','تم انشاء فئة جديدة بنجاح');

        return back()->with('result','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $caregory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $caregory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $caregory
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('pages.admin.edit_category',[
            'category' =>  $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $caregory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->only('name','sub_title'));

        if($request->file('image')){
            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);
            $category->update([
                'image' => $path,
            ]);
        }
        if($request->status){
            $category->update([
                'status' => 'active',
            ]);
        }else{
            $category->update([
                'status' => 'deactivate',
            ]);
        }


        $request->session()->put('message','تم تحديث بيانات الفئة بنجاح');

        return back()->with('result','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $caregory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Category $category)
    {

//        $offers = $category->offers()->get();
//        $products = $category->products()->get();
//        foreach($offers as $offer){
//            $offer->delete();
//        }
//
//        foreach($products as $product){
//            $product->delete();
//        }

        Storage::disk('uploads')->delete($category->image);

        $category->delete();

        $request->session()->put('message','تم حذف الفئة بنجاح');

        return back()->with("result",'success');
    }
}
