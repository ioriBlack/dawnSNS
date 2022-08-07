@extends('layouts.login')

@section('content')
{{Form::open(['url' => '/profile/update', 'files' => true])}}
  @csrf
<input type="hidden" name="id" value="{{ $users->id }}">
<label>User Name</label>
<input type="text" name="name" value="{{ $users->username }}">
<label>Mail Address</label>
<input type="email" name="mail" value="{{ $users->mail }}">
<label>Password</label>
<input type="password" name="password" value="{{ $users->password }}">
<label>Bio</label>
<input type="text" name="bio" value="{{ $users->bio }}">
<label>Icon Image</label>
<input type="file" name="icon">
<input type="submit" value="更新">
{{Form::close()}}
@endsection
