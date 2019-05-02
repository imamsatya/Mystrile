@extends('layouts.app')

@section('content')
<div>
                <drawer-c :user="{{$user}}">
        <jasakonstruksicreate-c :id="{{$id}}"></jasakonstruksicreate-c>
                </drawer-c>
</div>
    
@endsection