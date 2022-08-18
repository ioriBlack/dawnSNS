@extends('layouts.login')

@section('content')
<div class="container">
        <h2 class='page-header'>投稿一覧</h2>
        <a href="/profile">編集</a>
        <table class='table table-hover'>
            <tr>
                <th></th>
                <th>投稿内容</th>
                <th>投稿日時</th>

            <th></th>
            <th></th>

            @foreach($myProfiles as $myProfile)
            <tr>
                <td>
                  @if($myProfile->images === 'dawn.png')
                  <img class="TLicon" src="/images/{{ $myProfile->images }}" alt="image">
                  @else
                  <img class="TLicon" src="{{ asset('storage/images/' . $myProfile->images) }}" alt="image">
                  @endif
                </td>
                <td>{{ $myProfile->username }}</td>
                <td>{{ $myProfile->posts }}</td>
                <td>{{ $myProfile->created_at }}</td>

                 <td><a class="edit" href="/myProfile/{{ $myProfile->id }}/update-form">
                  <img class="edit-btn" src="images/edit.png"></a></td>
                 <td><a class="trash" href="/myProfile/{{ $myProfile->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img class="trash-btn" src="images/trash_h.png"></a></td>

            </tr>
            @endforeach
        </table>
</div>
@endsection
