@extends('layouts.app')

@section('content')
    <p>All users see this</p>

    @role('Admin')
        <p>Admin Panel</p>
    @endrole
@endsection