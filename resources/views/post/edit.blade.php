@extends('layouts.app') 

@section('myStyle')
<style>
    .error {
        color: #FF0000;
    }
</style>
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('post.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group row">
                <label for="title" class="col-sm-1 col-form-label">標題</label>

                <div class="col-sm-4">
                    <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">

                    @if ($errors->first('title'))
                        <span class="error" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-sm-1 col-form-label">內容</label>

                <div class="col-sm-4">
                    <textarea class="form-control" id="content" name="content">{{ $data->content }}</textarea>

                    @if ($errors->first('content'))
                        <span class="error" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="送出">
                </div>
            </div>
        </form>
    </div>
@endsection
