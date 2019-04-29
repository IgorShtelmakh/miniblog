@extends('layouts.app')

@push('scripts')
    <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
    <meta property="og:title" content="{{$post->title}}">
    <meta property="og:image" content="{{Request::root()}}/storage/storage/previews/posts/{{$post->id}}.jpg">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="600">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$post->created_at}} :: {{$post->author->name}}</div>

                <div class="card-body">
                        <div>
                            <h2>{{$post->title}}</h2>
                            <p>{{$post->description}}</p>
                            <hr> 
                        </div>
                        <div>

                            <div id="shareBtn" class="btn btn-success clearfix" onclick="share_post()">Share on Facebook</div>
                            
                            @section('footer_scripts')
                            <script>

                                window.fbAsyncInit = function() {
                                    FB.init({
                                      appId            : '{{ config('services.facebook.app_id') }}',
                                      autoLogAppEvents : true,
                                      xfbml            : true,
                                      version          : 'v3.2'
                                    });
                                };


                                function share_post() {
                                  FB.ui({
                                    method: 'share',
                                    display: 'popup',
                                    href: '{{Request::url()}}',
                                  }, function(response){});
                                };

                            </script>     
                            @stop                       
                        </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
