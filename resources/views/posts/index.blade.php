
@extends('layouts.app')

@section('content')
<div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>My posts</h1>
            </div>

            <a href="{{ route('post.create') }}" type="button" class="btn btn-default">Create post</a>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th></th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $post->created_at }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $post->title }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $post->category->name }}</div>
                                </td>

                                <td>
                                    <form action="/post/{{ $post->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button>Delete</button>
                                    </form>
                                    <form action="{{route('post.update',['id' => $post->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <button>Edit</button>
                                    </form>                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

</div>
@endsection