@extends('layouts.app')

@section('content')
<div>
                <drawer-c :user="{{$user}}">
        <hargabarangcreate-c :id="{{$id}}"></hargabarangcreate-c>
                </drawer-c>
</div>
    
@endsection