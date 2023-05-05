@extends('pages.layouts.user')
@section('content')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">


  <div class="mt-4" id="header-page">
    <div class="container">
      <h2>دخول</h2>
      <a href="{{route('home')}}">الرئيسية</a> / دخول</p>
    </div>
  </div>
  <section class="main-bg">
    <div class="col-md-5 col-sm-8 mx-auto">
      <div class="form-login">
        <div class="form-body mt-5">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              @csrf
{{--            <input type="hidden" name="_token" value="3efICprZN9FkbUXuLwimOo2pk99Y4WRITjlwcP5Y">--}}
            <div class="form-group">
              <label for="email">اسم المستخدم</label>
                <x-text-input id="email" class="form-control" placeholder="المستخدم" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="form-group">
              <label for="password">كلمة المرور</label>

                <x-text-input id="password" class="form-control "
                              type="password"
                              name="password"
                              placeholder="كلمة المرور"
                              required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

              <div class="form-group">
                  <label for="remember_me" class="inline-flex items-center">
                      <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                      <span class="ml-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
                  </label>
              </div>


              <div class="form-group  text-right">
{{--                  @if (Route::has('password.request'))--}}
{{--                      <a class="forget-a" href="{{ route('password.request') }}"> نسيت كلمة المرور</a>--}}
{{--                  @endif--}}

                      <div class="form-group  text-right mt-3">
                          <button type="submit" class="btn btn-dark"> دخول</button>
                          <div class="no-acc">لا يوجد حساب لديك ؟ - <a href="{{ route('register') }}">إنشاء جديد!</a></div>
                      </div>
              </div>

            <!-- <div class="form-group mt-5 text-center">
                 <button class="btn btn-social btn-app">
                     <span> sign up Apple</span>
                                <i class="fab fa-apple"></i>
                 </button>
                 <button  class="btn btn-social btn-google">
                     <span>sign up gmail</span>
                                 <i class="fab fa-google-plus-g"></i>
                 </button>
               <button class="btn btn-social btn-twitter">
                     <span>sign up twitter</span>
                                 <i class="fab fa-twitter mr-2"></i>
                 </button>
                 <button class="btn btn-social btn-face">
                     <span> sign up facebook</span>
                                <i class="fab fa-facebook-f mr-2"></i>
                 </button>
             </div>--->

            <!--form-group-->
          </form>
        </div><!--form-body-->
      </div>
    </div>
  </section>

@endsection
