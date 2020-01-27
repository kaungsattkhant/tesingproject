@extends('Layouts.master')
@section('content')
    <div class="container">
        <form action="{{url('admin/store')}}" method="post">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" >
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="password" name="password" >
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" >
            </div>
            <div class="form-group">
                <button type="submit" >Save</button>
            </div>
        </form>

    </div>
    @endsection
