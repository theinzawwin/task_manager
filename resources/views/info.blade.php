@extends('layouts.app')

@section('content')
    <div>
        <form action="/request_test">
        @csrf
        Name:<input type="text" name="name" /><br>
        Age:<input type="number" name="age" />
        <br>
        Gender: <input type="radio" name="gender" value="Male" />Male <input type="radio" name="gender" value="Female" />Female<br/>
        Foods: <input type="checkbox" name="foods[]" value="Breakfast" />Breakfast <input type="checkbox" name="foods[]" value="Lunch" />Lunch <input type="checkbox" name="foods[]" value="Dinner" />Dinner<br>
        <button type="submit">Save</button>
        </form>
    </div>
@endsection
