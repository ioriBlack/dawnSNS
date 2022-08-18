@extends('layouts.logout')

@section('content')
<div class="container">
{!! Form::open() !!}

<p class="welcome">DAWNSNSへようこそ</p>
<div class="login-wrapper">
<label>E-mail</label>
{{ Form::text('mail',null,['class' => 'input']) }}
<label>password</label>
{{ Form::password('password',['class' => 'input']) }}

<input type="submit" value="LOGIN">

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}
</div>
</div>
@endsection
