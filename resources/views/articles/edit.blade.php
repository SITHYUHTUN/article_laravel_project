@extends('layouts.app')
@section('content')
    <div class="container" style="width: 800px">
        <form method="post">
            @csrf
            <div class="mb-2">
                
                <label>Title</label>
                <input type="text" value="{{$article->title}}" name="title" class="form-control">
            </div>

            <div class="mb-2">
                <label>Body</label>
                <textarea name="body" class="form-control">{{$article->body}}</textarea>
            </div>
            <div class="mb-2">
                <label>Category</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Submit</button>

            
             
        </form>
    </div>
@endsection
