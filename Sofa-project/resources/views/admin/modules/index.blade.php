@extends('admin.master')
@section('module' ,'Admin')
@section('action','Home')  
@section('content')
    <section class="content-header">
    <h1>
Welcome to Admin page
 <h2>{{Auth()->user()->email}}</h2>
 <a href="{{route('logout')}}" class="d-block">Log out</a>
@endsection