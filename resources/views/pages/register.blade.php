@extends('pages.layouts.user')
@section('content')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <div class="mt-4" id="header-page">
    <div class="container">
      <h2>تسجيل</h2>
      <a href="{{route('home')}}">الرئيسية</a> / تسجيل</p>
    </div>
  </div>
  <section class="main-bg">
    <div class="col-md-5 col-sm-8 mx-auto">
      <div class="form-login">
        <div class="form-body mt-5">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              @csrf
{{--            <input type="hidden" name="_token" value="3efICprZN9FkbUXuLwimOo2pk99Y4WRITjlwcP5Y">--}}
            <div class="form-group">
              <label>الإسم</label>
                <x-text-input id="name" class="form-control" type="text" name="name" placeholder="الإسم" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
            </div>
            <div class="form-group">
              <label>البريد الإلكتروني</label>
                <x-text-input id="email"  class="form-control " placeholder="البريد الإلكتروني" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
            </div>
              <div class="form-group">
                  <label>الهاتف</label>
                  <x-text-input id="phone"  class="form-control " placeholder="ادخل رقم الهاتف" type="text" name="phone" :value="old('phone')" required />
                  <x-input-error :messages="$errors->get('phone')" class="mt-2 text-danger" />
              </div>
            <div class="form-group">
              <label>الدولة</label>
              <select class="form-control" name="country">
                <option value="SA">السعودية</option>
                <option value="JO">الأردن</option>
                <option value="UAE">الامارات</option>
                <option value="EG">مصر</option>
                <option value="KU">الكويت</option>
              </select>
                <x-input-error :messages="$errors->get('country')" class="mt-2 text-danger" />
            </div>
            <div class="form-group">
                <label>كلمة المرور</label>
                <div class="row">
                <div class="col-md-6 col-12">

                <input id="password" class="form-control w-100 pas "
                              placeholder="كلمة المرور"
                              type="password"
                              name="password"
                              data-toggle="password"
                              required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                </div>

                <div class="col-md-6 col-12">
                <input id="password_confirmation" class="form-control w-100 pas"
                              placeholder="تأكيد كلمة المرور"
                              type="password"
                              data-toggle="password"
                              name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                </div>
                </div>
            </div>
{{--            <div class="form-group priv-text">--}}
{{--              <input type="checkbox" name="policy" value="Bike">--}}
{{--              لقد قرأت و أوافق على <a target="_blank" href="https://revinn.net/pages/register_policy">احكام وشروط--}}
{{--              التسجيل</a>--}}
{{--            </div>--}}
            <div class="form-group text-right">
              <button type="submit" class="btn btn-dark">سجل الآن</button>
            </div>
          </form>
        </div><!--form-body-->
      </div>
    </div>
  </section>
@endsection
