@extends('layouts.app')

@section('content')

<h2>Add Employee</h2>

<form method="POST" action="{{ route('employees.store') }}">

@csrf

<input type="text" name="name" placeholder="Name">

<input type="email" name="email" placeholder="Email">

<input type="text" name="phone" placeholder="Phone">

<select name="department_id">

@foreach($departments as $department)

<option value="{{ $department->id }}">
{{ $department->name }}
</option>

@endforeach

</select>

<input type="text" name="position" placeholder="Position">

<input type="number" name="salary" placeholder="Salary">

<input type="date" name="join_date">

<button type="submit">Save</button>

</form>

@endsection