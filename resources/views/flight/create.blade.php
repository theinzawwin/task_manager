@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <form action="/flight" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <label>Name</label><input type="text" name="name" /><br>
    <label>Airline</label><input type="text" name="airline" />
    <br>
    <input type="submit" value="Save" />
    </form>
@endsection
