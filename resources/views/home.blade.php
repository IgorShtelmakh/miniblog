@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @foreach ($posts as $post)
                        <div>
                            <p>{{$post->created_at->format('d.m.Y H:i')}} // {{$post->author->name}} // {{$post->category->name}} </p>
                            <a href='{{ url('view/'.$post->id) }}'><h2>{{$post->title}}</h2></a>
                            <p>{{ str_limit($post->description, $limit = 200, $end = '...') }}</p>
                            <hr> 
                        </div>
                    @endforeach

                    {{ $posts->links() }}
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
