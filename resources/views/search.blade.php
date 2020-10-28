@extends('master')

@section('content')
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <h1 class="my-4">You are searching for:
            <small>{{$key}} ({{$post_count}})</small>
        </h1>

        @include('widgets.blog-masonry')

    </div>
    @include('widgets.sidebar')
</div>
@endsection