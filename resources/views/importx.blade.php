@extends('layouts.app')

@section('content')
<div>
        <drawer-c :user="{{$user}}">
    
            {{-- <import-c></import-c> --}}
            {{-- <input type="file" name="" id="">
            <input type="submit" value="asdasd"> --}}
            <form action="" method="post">
                {{ csrf_field() }}
                <input type="file" name="" id="">   <br><br>
                <input type="submit" value="submit" style="color:aqua;background-color:red">
            </form>

    </drawer-c>
</div>
    
@endsection