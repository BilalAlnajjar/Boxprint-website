<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGeneralSettingRequest;
use App\Http\Requests\UpdateGeneralSettingRequest;
use App\Models\ContactUs;
use App\Models\GeneralSetting;

class GeneralSettingController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $general = GeneralSetting::first();
        return view('pages.admin.generalsettings', [
            'general' => $general,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreGeneralSettingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneralSettingRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => ['nullable'],
            'footer_text' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'loc_Lat' => 'nullable',
            'loc_long' => 'nullable',
            'logo_footer' => 'required',
            'logo_header' => 'required',
            'favicon' => 'required',
            'address' => 'required'
        ]);

        $pathLogoFooter = $request->file('logo_footer')->store('/imagesSite', ['disk' => 'uploads']);
        $pathLogoHeader = $request->file('logo_header')->store('/imagesSite', ['disk' => 'uploads']);
        $pathFav = $request->file('favicon')->store('/imagesSite', ['disk' => 'uploads']);

        GeneralSetting::create([
            'name' => $request->name,
            'description' => $request->description,
            'footer_text' => $request->footer_text,
            'email' => $request->email,
            'phone' => $request->phone,
            'loc_Lat' => $request->loc_Lat,
            'loc_long' => $request->loc_long,
            'logo_footer' => $pathLogoFooter,
            'logo_header' => $pathLogoHeader,
            'favicon' => $pathFav,
            'address' => $request->address,
        ]);

        $request->session()->put('message', 'تمت عملية اضافة بيانات الموقع بنجاح');
        return back()->with('result', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\GeneralSetting $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralSetting $generalSetting)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\GeneralSetting $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateGeneralSettingRequest $request
     * @param \App\Models\GeneralSetting $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneralSettingRequest $request, GeneralSetting $generalSetting)
    {
        $general = GeneralSetting::first();
        $general->update($request->except('logo_footer', 'logo_header', 'favicon'));

        if ($request->file('logo_footer')) {
            $pathLogoFooter = $request->file('logo_footer')->store('/imagesSite', ['disk' => 'uploads']);
            $general->update([
                'logo_footer' => $pathLogoFooter,
            ]);

        }

        if ($request->file('favicon')) {
            $pathFav = $request->file('favicon')->store('/imagesSite', ['disk' => 'uploads']);
            $general->update([
                'favicon' => $pathFav,
            ]);
        }

        if ($request->file('logo_header')) {
            $pathLogoHeader = $request->file('logo_header')->store('/imagesSite', ['disk' => 'uploads']);
            $general->update([
                'logo_header' => $pathLogoHeader,
            ]);
        }


        $request->session()->put('message', 'تم تحديث بيانات الموقع بنجاح');
        return back()->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\GeneralSetting $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
