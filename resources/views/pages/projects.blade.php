@extends('pages.layouts.user')
@section('content')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">


        <div class="mt-5" id="header-page">
            <div class="container">
                <h2>المشاريع</h2>
                <p>
                    <a href="{{route('home')}}">الرئيسية</a> / المشاريع</p>
            </div>
        </div>

  <section class="home-project mb-5">
    <div class="container-fluid">

      <div class="row">
        <ul class="gallery_box">

            @if($projects)
            @foreach($projects as $project)

          <li>
            <a href="{{route('user.project.show',$project->id)}}" class="ajax-popup-link"><img
              src="{{asset('images/'.explode(',',$project->images)[0])}}">
              <div class="box_data">
                <span class="text-right">{{$project->title}}</span>
              </div>
            </a>
          </li>

            @endforeach
            @endif

        </ul>
      </div><!--row-->
    </div><!--container-->
  </section>
@endsection
