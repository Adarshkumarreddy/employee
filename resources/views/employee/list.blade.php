@extends('layouts.app1')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <h1>Employees list</h1>
            <a href="{{route('employee.add')}}" type="button" class="btn btn-primary">Add</a>
    <table class="table table-bordered">
         <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Department</th>
            <th scope="col">Remark</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employee as $employees)
            <tr>
            <th scope="row">{{$employees->id}}</th>
            <td>{{$employees->name}}</td>
            <td>{{$employees->email}}</td>
            <td>{{$employees->phone}}</td>
            <td>{{$employees->department}}</td>
            <td>{{$employees->remark}}</td>
            <td>
                <a href="{{route('employee.edit',$employees->id)}}">Edit</a>
                <a href="{{route('employee.delete',$employees->id)}}">Delete</a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
