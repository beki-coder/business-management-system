@extends('layouts.app')

@section('content')
<h1>Edit Employee</h1>

<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ $employee->name }}" />

    <label>Email:</label>
    <input type="email" name="email" value="{{ $employee->email }}" />

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ $employee->phone }}" />

    <label>Position:</label>
    <input type="text" name="position" value="{{ $employee->position }}" />

    <label>Salary:</label>
    <input type="number" name="salary" value="{{ $employee->salary }}" step="0.01" />

    <label>Department:</label>
    <select name="department_id">
        @foreach($departments as $department)
            <option value="{{ $department->id }}" @if($employee->department_id == $department->id) selected @endif>
                {{ $department->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Update</button>
</form>
@endsection