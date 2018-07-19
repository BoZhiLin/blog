@extends('layouts.app')

@section('content')
    @foreach ($datas as $key => $data)
        作者：{{ $data->user->name }}
        標題：{{ $data->title }}
        內容：{{ $data->content }} <br />
    @endforeach
@endsection