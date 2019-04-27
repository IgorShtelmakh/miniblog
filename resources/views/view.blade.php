@extends('layouts.app')

@push('scripts')
    <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
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
                                      appId            : '258406047892626',
                                      autoLogAppEvents : true,
                                      xfbml            : true,
                                      version          : 'v3.2'
                                    });
                                };


                                function share_post() {
                                  FB.ui({
                                    method: 'share',
                                    display: 'popup',
                                    href: 'https://developers.facebook.com/docs/',
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
