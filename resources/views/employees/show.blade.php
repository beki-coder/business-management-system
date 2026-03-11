@extends('layouts.app')

@section('content')

<h2>Employee Profile</h2>

<p>Name: {{ $employee->name }}</p>

<p>Email: {{ $employee->email }}</p>

<p>Phone: {{ $employee->phone }}</p>

<p>Department: {{ $employee->department->name }}</p>

<p>Position: {{ $employee->position }}</p>

<p>Salary: {{ $employee->salary }}</p>

@endsection