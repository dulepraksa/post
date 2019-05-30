@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    @include('post.success')
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                        @include('errors.errors')
                </div>
            @endif
            <div class="card">
                <form method="post" action="{{ route('post.update', $post->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="form-group p-2">
                        <label>Post title</label>
                        <input name="title" class="form-control" placeholder="Post title" value="{{ $post->title }}"></input>                        
                    </div>
                    <div class="form-group p-2">
                        <label>Post body</label>
                        <textarea name="body" class="form-control" placeholder="Post body">{{$post->body}}</textarea>
                    </div>
                    <div class="form-group p-2 d-flex flex-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
