@extends('layouts.app')

@section('content')
<div>
        <drawer-c :user="{{$user}}">
    <a href="{{route('logout')}}">asdasd</a>
    {{$user->name}}
    
<home-c :datas="{{$setatributs}}" ></home-c>
    </drawer-c>
</div>
    
@endsection