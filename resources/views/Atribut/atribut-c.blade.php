@extends('layouts.app')

@section('content')
<div>
                <drawer-c :user="{{$user}}">
        <atribut-c></atribut-c>
                </drawer-c>
</div>
    
@endsection