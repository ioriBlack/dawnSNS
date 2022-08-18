@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

<label>User Name</label>
{{ Form::text('username',null,['class' => 'input']) }}
@if($errors->has('username'))
  {{ $errors->first('username') }}
@endif

<label>Mail Adress</label>
{{ Form::text('mail',null,['class' => 'input']) }}
@if($errors->has('mail'))
  {{ $errors->first('mail') }}
@endif

<label>Password</label>
{{ Form::text('password',null,['class' => 'input']) }}
@if($errors->has('password'))
  {{ $errors->first('password') }}
@endif

<label>Password Confirm</label>
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
