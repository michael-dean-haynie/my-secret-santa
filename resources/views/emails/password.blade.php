@extends('templates.master')

@section('title')
@endsection

@section('content')
Click here to reset your password: {{ url('password/reset/'.$token) }}
@endsection