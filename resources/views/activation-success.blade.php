@extends('layout')

@section('content')
    <div class="alert alert-success">
        Hi {{ $user->name }}, your account has been activated
    </div>
@endsection
