@extends('layouts.app')

@section('content')
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        標題：<input type="text" name="title">
        內容：<textarea name="content"></textarea>
        <input type="submit" class="btn btn-primary" value="送出">
    </form>
@endsection
