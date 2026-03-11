{{-- @extends('layouts.app')

@section('content')

<div class="container">

<h2>Employees</h2>

<a href="{{ route('employees.create') }}" class="btn btn-primary">
Add Employee
</a>

<table class="table mt-3">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Department</th>
<th>Position</th>
<th>Actions</th>
</tr>
</thead>

<tbody>

@foreach($employees as $employee)

<tr>
<td>{{ $employee->id }}</td>
<td>{{ $employee->name }}</td>
<td>{{ $employee->email }}</td>
<td>{{ $employee->department->name }}</td>
<td>{{ $employee->position }}</td>

<td>

<a href="{{ route('employees.show',$employee->id) }}" class="btn btn-info">View</a>

<a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-warning">Edit</a>

<form action="{{ route('employees.destroy',$employee->id) }}" method="POST" style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger">Delete</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection --}}







@extends('layouts.app')

@section('content')
    <h1>Employees List</h1>

    @if($employees->count())
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Join Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->department->name ?? 'N/A' }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->join_date }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}">View</a>
                            <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $employees->links() }} <!-- Pagination links -->
    @else
        <p>No employees found.</p>
    @endif
@endsection