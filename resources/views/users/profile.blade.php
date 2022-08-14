@extends('layouts.login')

@section('content')
<a class="topicon_profile" href="/myProfile">
                    <img class="profileIcon" src="images/dawn.png">
                  </a>
{{Form::open(['url' => '/profile/update', 'files' => true])}}
  @csrf
  <div class="container">
  <div class="E">
<input type="hidden" name="id" value="{{ $users->id }}">
<label>User Name</label>
<input type="text" name="name" value="{{ $users->username }}">
<br>
<label>Mail Address</label>
<input type="email" name="mail" value="{{ $users->mail }}">
<br>
<label>Password</label>
<input type="password" name="password" value="{{ $users->password }}">
<br>
<label>Bio</label>
<input type="text" name="bio" value="{{ $users->bio }}">
<br>
<label>Icon Image</label>
<input type="file" name="icon">
<br>
<input type="submit" value="更新">
</div>
</div>
{{Form::close()}}
@endsection
