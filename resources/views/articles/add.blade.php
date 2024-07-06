@extends("layouts.app")
@section('content')
    <div class="container"style="max-width: 800px">
        @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    {{$error}}
                    
                @endforeach
            </div>
            
        @endif
        
        <form method="post">
            @csrf
            <div class="mb-2">
                <label >Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}"/>
            
            {{-- <h1>{{auth()->user()->id}}</h1> --}}
            <div class="mb-2">
                <label >Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="mb-2">
                <label>Category</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach 
                </select>
            </div>
            <button class="btn btn-primary">Add Article</button>
        </form>
    </div>
    
@endsection