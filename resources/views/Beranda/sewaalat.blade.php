@extends('layouts.app')

@section('content')
<div>
                <drawer-c :user="{{$user}}">
        <sewaalatcreate-c :id="{{$id}}"></sewaalatcreate-c>
                </drawer-c>
</div>
    
@endsection