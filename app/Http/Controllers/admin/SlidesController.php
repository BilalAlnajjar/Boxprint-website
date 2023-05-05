<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlideWebRequest;
use App\Http\Requests\UpdateSlideWebRequest;
use App\Models\Slide;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::get();
        return view('pages.admin.slider-home-page',[
            'slides' => $slides,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.add-slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSlideWebRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlideWebRequest $request)
    {
        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => 'required',
        ]);

        $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);

        $slider = Slide::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        $request->session()->put('message','تمت اضافة الشريحة الى الموقع بنجاح');
        return back()->with('result', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slideWeb
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slideWeb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slideWeb
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);

        return view('pages.admin.edit-slider',[
            'slide' => $slide,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSlideWebRequest  $request
     * @param  \App\Models\Slide  $slideWeb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        $slide = Slide::findOrFail($id);

        $slide->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if($request->file('image')){

            Storage::disk('uploads')->delete($slide->image);

            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);
            $slide->update([
                'image' => $path,
            ]);
        }

        $request->session()->put('message','تم تعديل الشريحة بنجاح');
        return back()->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slideWeb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $slide = Slide::findOrFail($id);
        Storage::disk('uploads')->delete($slide->image);
        $slide->delete();

        $request->session()->put('message','تم حذف الشريحة بنجاح');

        return back()->with("result",'success');
    }
}
