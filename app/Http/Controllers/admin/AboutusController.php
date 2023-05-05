<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $about_us = Aboutus::first();
        return view('pages.admin.add_content',[
            'about_us' => $about_us,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
           'imageAboutUs' => 'required',
           'imageOurVision' => 'required',
           'imageOurMessage' => 'required',
        ]);


        $path_image_who_are = $request->file('imageAboutUs')->store('/imagesSite',['disk' => 'uploads']);
        $path_image_our_vision = $request->file('imageOurVision')->store('/imagesSite',['disk' => 'uploads']);
        $path_image_our_message = $request->file('imageOurMessage')->store('/imagesSite',['disk' => 'uploads']);

        $bout_us = Aboutus::create([
            'title_who_are' => $request->title_who_are,
            'title_our_vision' => $request->title_our_vision,
            'title_our_message' => $request->title_our_message,
            'description_who_are' => $request->description_who_are,
            'description_our_vision' => $request->description_our_vision,
            'description_our_message' => $request->description_our_message,
            'image_who_are' => $path_image_who_are,
            'image_our_vision' => $path_image_our_vision,
            'image_our_message' => $path_image_our_message,
        ]);

        $request->session()->put('message','تمت اضافة بيانات القسم بنجاح');
        return back()->with('result', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $about_us = Aboutus::findOrFail($id);
//        return view('pages.admin.add_content',[
//            'about_us' => $about_us,
//        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about_us = Aboutus::findOrFail($id);

        if($request->file('imageAboutUs')){

            Storage::disk('uploads')->delete($about_us->image_who_are);

            $path_image_who_are = $request->file('imageAboutUs')->store('/imagesSite',['disk' => 'uploads']);
            $about_us->update([
                'image_who_are' => $path_image_who_are,
            ]);
        }

        if($request->file('imageOurVision')){

            Storage::disk('uploads')->delete($about_us->image_our_vision);

            $path_image_our_vision = $request->file('imageOurVision')->store('/imagesSite',['disk' => 'uploads']);
            $about_us->update([
                'image_our_vision' => $path_image_our_vision,
            ]);
        }

        if($request->file('imageOurMessage')){

            Storage::disk('uploads')->delete($about_us->image_our_message);

            $path_image_our_message = $request->file('imageOurMessage')->store('/imagesSite',['disk' => 'uploads']);
            $about_us->update([
                'image_our_message' => $path_image_our_message,
            ]);
        }



        $about_us->update([
            'title_who_are' => $request->title_who_are,
            'title_our_vision' => $request->title_our_vision,
            'title_our_message' => $request->title_our_message,
            'description_who_are' => $request->description_who_are,
            'description_our_vision' => $request->description_our_vision,
            'description_our_message' => $request->description_our_message,
        ]);

        $request->session()->put('message','تم تعديل بيانات القسم بنجاح');
        return back()->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
