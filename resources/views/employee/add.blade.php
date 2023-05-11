@extends('layouts.app1')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
        <a href="{{route('employee.list')}}" type="button" class="btn btn-primary">Add</a>
        <form action="{{route('employee.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                           <label for="name">Name:</label>
                           <input type="text" class="form-control" id="name" name="name" required minlength="3" pattern="[A-Za-z]+" />
                        </div>
                        <div class="form-group">
                           <label for="email">Email:</label>
                           <input type="email" class="form-control" id="email" name="email" required />
                           <span id="email-error"></span>
                        </div>
                        <div class="form-group">
                           <label for="phone">Phone:</label>
                           <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}" />
                           <span id="phone-error"></span>
                        </div>
                        <div class="form-group">
                           <label for="department">Department:</label>
                           <select class="form-control" id="department" name="department" required>
                              <option value="">Select Department</option>
                              <option value="HR">HR</option>
                              <option value="Marketing">Marketing</option>
                              <option value="IT">IT</option>
                              <option value="Finance">Finance</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="remark">Remark:</label>
                           <textarea class="form-control" id="remark" name="remark"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                     </form>
        </div>
    </div>
</div>
@endsection