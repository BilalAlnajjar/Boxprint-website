<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SocialMediaController extends Controller
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
        $socials = SocialMedia::get();

        if(!$socials->first()){
            return view('pages.admin.add_social',[
                'socials' => $socials,
            ]);
        }else{
            return view('pages.admin.edit_social',[
                'socials' => $socials,
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'links.*' => 'url',
            'link' => 'unique:social_media'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }


        foreach ($request->icons as  $key => $icon) {
          SocialMedia::create([
               'link'  => $request->links["$key"],
              'icon' => $icon,
            ]);
        }


        $request->session()->put('message', 'تم اضافة مواقع التواصل بنجاح');
        return redirect()->route('social.create')->with('result', "success");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SocialMedia $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SocialMedia $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SocialMedia $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach ($request->links as $key => $link) {
            if($request->ids[$key]){
                $social_media =  SocialMedia::findOrFail($request->ids[$key]);
                $social_media->update([
                    'link'  => $link,
                    'icon' => $request->icons[$key],
                ]);
            }else{
                SocialMedia::create([
                    'link'  => $link,
                    'icon' => $request->icons[$key],
                ]);
            }

            if(!$link){
                SocialMedia::findOrFail($request->ids[$key])->delete();
            }


        }

        foreach (SocialMedia::get() as $social){
            if($social->link == null){
                $social->delete();
            }
        }


        $request->session()->put('message', 'تم تحديث بيانات مواقع التواصل بنجاح');
        return redirect()->route('social.create')->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SocialMedia $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $socialMedia)
    {
        //
    }
}
