@extends('layouts.app') 

@section('content')
    <div class="container">      
        <div class="card text-center">
            <div class="card-header">
                標題：{{ $data->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    作者：{{ $data->user->name }}
                </h5>
                <p class="card-text">
                    {{ $data->content }}
                </p>
            </div>
            <div class="card-footer text-muted">
                發文日期：{{ $data->created_at }}
            </div>
            <div align="center">
                <a href="{{ route('post.edit', $data->id) }}" class="btn btn-primary">編輯</a>

                <form action="{{ route('post.destroy', $data->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- <input type="hidden" name="_method" value="delete"> --}}
                    <button class="btn btn-danger">刪除</button>
                </form>
            </div>
        </div>
    </div>
@endsection
