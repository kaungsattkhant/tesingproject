@extends('Layouts.master')
@section('content')
    <create-student v-bind:majors="{{$majors}}"> </create-student>
    @endsection
