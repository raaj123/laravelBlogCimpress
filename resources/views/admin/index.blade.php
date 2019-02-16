@extends(‘layout.main’)
@section(‘content’)
 <style type=”text/css”>
 .login-form {
 width: 248px;
 margin: 0 auto;
 }
 </style>
<div class=”container”>
 {{ Form::open(array(‘/admin’, ‘role’ => ‘form’, ‘class’ => ‘login-form’)) }}
 <h1>Please Login</h1>
<div class=”form-group”>
 {{ Form::label(‘email’, ‘Email Address’) }}
 {{ Form::text(‘email’, ‘’,array(‘class’ => ‘form-control’, ‘placeholder’ => ‘Enter email’)) }}
 </div>
 <div class=”form-group”>
 {{ Form::label(‘passowrd’, ‘Password’) }}
 {{ Form::password(‘password’, array(‘class’ => ‘form-control’, ‘placeholder’ => ‘Password’)) }}
 </div>
 {{ Form::submit(‘Sign in’, array(‘class’ => ‘btn btn-primary’)) }}
 {{ Form::close() }}
 
 </div>
@stop