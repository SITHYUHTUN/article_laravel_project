@extends('layouts.app')
@section('content')
    <div class="container" style="max-width:800px">
        {{$articles->links()}}

        @if (session('info'))
        
            <div class="alert alert-info">
                {{session("info")}}
            </div>
            
        @endif

        @foreach ($articles as $article)
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
                    {{-- <div class="text-success mb-1">
                        <samll>
                            Category: {{$article->category->name}}
                            {{$article->created_at->diffForHumans()}}
                            Comment:{{count($article->comments)}}
                        </samll>

                    </div> --}}
                    <div> {{$article->body}} </div>
                    <a href="{{url("/articles/detail/$article->id")}}">View Detail &raquo;</a><br>
                    <a href="{{url("/articles/edit/$article->id")}}">Edit</a>
                </div>
            </div>
            
        @endforeach
    
        {{$articles->links()}}
    </div>
    
@endsection