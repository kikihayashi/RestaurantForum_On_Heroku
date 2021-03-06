@extends('layouts.app')

@section('content')

@if(isset($allFriends) && count($allFriends) > 0)
<h1 style="margin-left:5%">好友名單</h1>
<br>
<nav>
  <div class="row">
    @foreach($allFriends as $friend) <div class="col-md-3 col-sm-4 col-xs-6 text-center user-item">
      <a href="{{route('UserInfoController.user',$friend->relation_user_id)}}">
        <!-- 放圖片 -->
        @php
        if((File::exists('img/'.$friend->relation_user_account.'.jpg'))){
        $srcUrl="../../../img/".$friend->relation_user_account.".jpg";
        $altMsg="沒有大頭貼";
        } else {
        $srcUrl="https://raw.githubusercontent.com/kikihayashi/RestaurantForum_Image/main/User/".($friend->relation_user_id%10).".png?raw=true";
        $altMsg="圖片已失效";
        }
        @endphp

        <img class="rounded" style="width: 140px;height:128px;" src={{$srcUrl}} alt={{$altMsg}}>

        <br><br>
        <h4>{{$friend->relation_user_name}}</h4>
      </a>
      <br>
    </div>
    @endforeach
  </div>
</nav>
@else
<h1 style="margin-left:5%">暫無好友</h1>
@endif
@endsection