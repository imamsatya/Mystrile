@extends('layouts.app')

@section('content')
<div>
        
<beranda-c :hargabarangs="{{$hargabarangs}}" :sewaalats="{{$sewaalats}}" :jasakonstruksis="{{$jasakonstruksis}}" :id="{{$id}}"></beranda-c>
        
</div>
    
@endsection