@extends('Frontend.Layouts.head')
@section('css')
    <link href="{{asset('frontend_assets/assets/css/section_post.css')}}" rel="stylesheet">
@endsection
@section('main_content')
    <section class="" >
        <div class="section-title s-1">
            <h2 class="h2-1">Posts</h2>
        </div>
        <div class="container " id="post" style="margin-left: 10%;">
            <div class="row">
                @foreach($post as $key => $value)
                <div class="col-md-4  mb-4 portfolio-item ">
                    <div class="card h-100 text-white bg-dark " style="max-width: 18rem;">
                        <div class="card-body" style="max-width: 18rem;">
                            <div class="card-title">
                                <h3>Post: {{$key+1}}</h3>
                            </div>
                            <div class="bar">
                                <div class="emptybar"></div>
                                <div class="filledbar"></div>
                            </div>
                            <div class="text">
                                <p class="card-text">Date : {{$value->assign_date}}</p>
                                <p class="card-text">Time : {{$value->post_pick_up_time}}</p>
                                <p class="card-text">Budget :{{$value->budget}}</p>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{url('view_post' , $value->post_id)}}" class="btn btn-primary"> More Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </section><!-- End About Lists Section -->
@endsection
