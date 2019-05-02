@extends('layouts.app')

@section('content')
<div>
        <drawer-c :user="{{$user}}">
    
    
<home-c :datas="{{$setatributs}}" ></home-c>
    </drawer-c>
</div>
    
@endsection