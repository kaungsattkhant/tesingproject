@extends('Layouts.master')
@section('content')
      <p><h1>Hello World</h1></p>
      <form action="{{url('admin/create')}}" method="get">
          <button type="submit" class="btn btn-outline-success">Create</button>
      </form>
    <div class="table">
        <table class="table-info">
            <thead>
            <tr>
                <th>NO</th>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
            <tbody>
            </tbody>
            </thead>
        </table>
    </div>
    @endsection
