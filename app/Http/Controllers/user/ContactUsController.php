<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
//        $contact_us = ContactUs
        $general_setting_contactUs = GeneralSetting::first();
        return view('pages.callus',[
            'web' => [
                'name' => 'تواصل معنا| Box Print'
            ],
            'general_setting_contactUs' => $general_setting_contactUs,
        ]);
    }
}
