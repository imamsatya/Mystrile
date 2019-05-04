@extends('layouts.app')

@section('content')
<div>
        <drawer-c :user="{{$user}}">
    
            <about-c></about-c>

    </drawer-c>
</div>
    
@endsection