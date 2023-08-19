@extends('layouts.layouts')

@section('content')
<div class="container mt-5">
    <h2 style=" text-align: center">User details</h2>
<table class="table table-bordered table-striped">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Salary</th>
    </tr>
    <td>{{$data->id}}</td>
    <td>{{$data->name}}</td>
    <td>{{$data->email}}</td>
    <td>{{$data->salary}}</td>
</table>
</div>
@endsection

