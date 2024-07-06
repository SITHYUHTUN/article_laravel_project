@extends('layouts.app')
@section('content')
    <div class="container" style="max-width:800px">
        

        
            <div class="card mb-2">
                <div class="card-body">
                    
                    
                    <h2 class="h4 card-title">{{$article->title}}</h2>
                    <div class="text-success mb-1">
                        <b class="text-success">{{$article->user->name}}</b>
                        <samll class="text-muted">
                            Category: {{$article->category->name}}
                            {{$article->created_at->diffForHumans()}}
                            
                        </samll>

                    </div>
                    <div class="mb-2"> {{$article->body}} </div>
                    @auth
                    <a href="{{url("/articles/delete/$article->id")}}" class="btn btn-outline-danger"> Delete</a>
                    <a href="{{url("/articles/edit/$article->id")}}" class="btn btn-outline-danger">Edit</a>
                    @endauth
                    
                </div>
            </div>
            
            <ul class="list-group mt-4">
                <li class="list-group-item active">
                    Comments ({{count($article->comments)}})
                </li>
                @foreach ($article->comments as $comment)
                    
                    <li class="list-group-item">
                        {{-- start --}}
                    <div class="text-success mb-1">
                        <b class="text-success">{{$article->user->name}}</b>
                        <samll class="text-muted">
                            Category: {{$article->category->name}}
                            {{$article->created_at->diffForHumans()}}
                            
                        </samll>

                    </div>
                    {{-- end --}}
                        @auth
                        <a href="{{url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>
                        @endauth
                        {{$comment->content}}
                    </li>
                @endforeach
            </ul>
            @auth
            <form action="{{url('/comments/add')}}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <textarea name="content" class="form-control my-2"></textarea>
                <button type="submit" class="btn btn-secondary">Add Comment</button>
            </form>
            @endauth
    
        
    </div>
    
@endsection