@extends('layouts.app')

@section('content')


<div class="row justify-content-center">

    
    <div class="col-md-6">

            <h4 class="text-center">View All Posts</h4>
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        @include('post.success')
                    </div>
                @endif
                @foreach($posts as $post)

                    <div class="card m-2">

                        <div class="card-header">

                            <div>{{$post->title}}</div>

                        </div>

                        <div class="card-body">

                            {{$post->body}}

                        </div>

                        <div class="card-footer p-1">
                            
                            <form method="POST" action="/post/{{$post->id}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger float-right" value="Delete">
                                <a  href="{{ route('post.edit', [$post->id]) }}" type="button" class="btn btn-warning float-right mr-2">Edit</a>
                            </form>
                        
                        </div>
                    
                    </div>
          
                    @endforeach
        
                </div>
    </div>

@endsection