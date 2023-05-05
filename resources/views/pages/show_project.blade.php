

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

<div class="mt-4 text-white" id="header-page" style="background-color:transparent; font-color: #ffffff">
    <div class="container">
        <h2>{{$project->title}}</h2>
    </div>
</div>

<div class="container bg-dark">
    <section class="home-project">

        <div class="row">

            @foreach(explode(',',$project->images) as $image)

            <div class="col-sm-8 col-md-8 col-lg-12 text-center">

                <img class="img-fluid mb-2" src="{{asset('images/'.$image)}}" />
                </a>

            </div>
            @endforeach

        </div><!--row-->
        <!--container-->
    </section>
</div>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>




