@extends('website.layouts.app', ['bodyClass' => 'article-details'])

@section('content')

<!--inside-article-->
<div class="inside-article">
    <div class="container">

        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="#">المقالات</a></li>
                    <li class="breadcrumb-item active">{{ $post->title }}</li>
                </ol>
            </nav>
        </div>

      

        <!-- title -->
        <div class="article-title col-12">
            <div class="h-text col-6">
                <h4>{{ $post->title }}</h4>
            </div>

            <div class="icon col-6">
                <button type="button">
                    <i class="far fa-heart"></i>
                </button>
            </div>

        </div>
          <!-- article image -->
        <div class="article-image">
            <img src="{{ asset('posts/' . $post->photo) }}" alt="">
        </div>

        <!-- content -->
        <div class="text">
            <p>{{ $post->content }}</p>
        </div>

        <!-- related articles -->
        <div class="articles">

            <div class="title">
                <div class="head-text">
                    <h2>Related articles</h2>
                </div>
            </div>

            <div class="view">
                <div class="row">

                    <div class="owl-carousel articles-carousel">

                        @foreach($relatedPosts as $related)

                            <div class="card">

                                <div class="photo">
                                    <img src="{{ asset('posts/' . $related->photo) }}" class="card-img-top">

                                    <a href="{{ route('website.posts.details', $related->id) }}" class="click">
                                        more
                                    </a>
                                </div>

                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $related->title }}</h5>

                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit($related->content, 120) }}
                                    </p>
                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection