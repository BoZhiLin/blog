@extends('layouts.app') 

@section('content')
    <div class="container">
        <div align="center">
            <a href="{{ route('post.create') }}" class="btn btn-primary">我要貼文</a>

            <div class="col-md-4">
                <form action="{{ route('post.index') }}" method="GET">
                    <input type="text" class="form-control" name="title" placeholder="依標題搜尋文章">
                    <input type="submit" class="btn btn-primary" value="送出">
                </form>
            </div>
        </div>
 
        @foreach ($datas as $key => $data)
            <div class="card text-center">
                <div class="card-header">
                    標題：{{ $data->title }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        作者：{{ $data->user->name }}
                    </h5>
                    <a href="{{ route('post.show', $data->id) }}" class="btn btn-secondary">查看文章</a>
                </div>
                <div class="card-footer text-muted">
                    發文日期：{{ $data->created_at }}
                </div>
            </div><br>
        @endforeach
    </div>
@endsection
