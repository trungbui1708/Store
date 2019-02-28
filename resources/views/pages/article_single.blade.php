@extends('pages.layouts.index')
@section('content')
<section class="main-content-section">
        <div class="container">
            <div class="row" style="padding-top: 50px;">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="blog-post">
                            <h2 class="blog-post-title">{{$article_single->title}}</h2>
                            <p class="blog-post-meta">{{$article_single->created_at}} by <a href="#">{{$article_single->user->name}}</a></p>
                            <p>{!!$article_single->description!!}</p>
                            <p>{!!$article_single->content!!}</p>
                            <p><strong><span style="font-size: 18px">
                                <span style="font-family:Times New Roman,Times,serif;">
                                    Đặng Văn Đô sưu tầm bài viết.
                                    <br>
                                    Theo : Meocuocsong.net.
                                </span>
                            </span></strong></p>
                        </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="single-product-right-sidebar">
                        <h2 class="left-title">Bài viết liên quan</h2>
                        <ul>
                            @foreach ($article_hot as $ah)
                            <li>
                            <a href="{{route('pages.single',$ah->slug)}}"><img style="width:100px;" src="storage/{{$ah->thumbnail}}" alt="{{$ah->title}}"></a>
                                <div class="r-sidebar-pro-content">
                                    <h5><a href="{{route('pages.single',$ah->slug)}}">{{$ah->title}}</a></h5>
                                    <p>Người viết : {{$ah->user->name}}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>  
            </div>
        </div>
    </section>
@endsection