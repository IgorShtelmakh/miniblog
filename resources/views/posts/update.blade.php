
@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Create Task Form... -->


    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/post/{{$post->id}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Post Title -->
            <div class="form-group">
                <label for="post-title" class="col-sm-3 control-label">Title</label>

                <div class="col-sm-6">
                    <input type="text" name="title" id="post-title" class="form-control" value="{{$post->title}}">
                </div>
            </div>

            <!-- Post Category -->
            <div class="form-group">
                <label for="post-title" class="col-sm-3 control-label">Category</label>

                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="category">
                        <option value="0">Select category</option>
                        @if ($categories->count())
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ( $category->id == $post->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>   
                            @endforeach 
                        @endif
                    </select>
                </div>
            </div>

            <!-- Post Description -->
            <div class="form-group">
                <label for="post-description" class="col-sm-3 control-label">Description</label>

                <div class="col-sm-6">
                    <textarea name="description" id="post-description" class="form-control">{{$post->description}}</textarea>
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>





</div>
@endsection