@extends('layouts.app')

@section('content')
<div>
    <drawer-c :user="{{$user}}">       
<beranda-c :hargabarangs="{{$hargabarangs}}" :sewaalats="{{$sewaalats}}" :jasakonstruksis="{{$jasakonstruksis}}" :id="{{$id}}" :setatributs="{{$setatributs}}"></beranda-c>
    </drawer-c>    
</div>
    
@endsection