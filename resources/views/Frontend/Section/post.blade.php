@extends('Frontend.Layouts.head')
@section('main_content')
    <!-- ======= About Lists Section ======= -->
    <section class="about-lists">
        <div class="container">

            <div class="section-title">
                <h2>Posts</h2>
            </div>

            <div class="row no-gutters" id="post">

                @foreach($post as $key => $value)
                    <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
                        <span>{{$key+1}}</span>
                        <h4>{{$value->assign_date}}</h4>
                        <h5>{{$value->post_pick_up_time}}</h5>
                        <p>{{$value->description}}</p>
                        @auth()
                            <button class="btn btn-dark"><a href="{{url('view_post' , $value->post_id)}}">More</a>
                            </button>
                        @endauth
                        @guest()
                            <button class="btn btn-dark"><a href="/login">Login</a></button>
                        @endguest
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End About Lists Section -->
@endsection
