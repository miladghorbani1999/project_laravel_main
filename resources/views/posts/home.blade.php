<?php

use App\Models\post;
?>
@extends('layouts.main')
@section('nav')
<div class="mCustomScrollbar" data-mcs-theme="dark">
    @foreach($followers as $follower)
		<ul class="chat-users">
            <!--عکس سمت راست نوبار-->
			<li class="inline-items js-chat-open">
				<div class="author-thumb">
					<img alt="author" src="{{asset('/storage/img/img_person/'.$follower->image->image)}}" class="avatar">
				</div>
			</li>
		</ul>
    @endforeach
	</div>
@endsection
@section('content')
<div class="container">
	<div class="row">
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12 ">
			<div class="ui-block">
			</div>
			@foreach($followers as $key=>$follower)

            @foreach($follower->posts as $post)
			<div id="search-items-grid">
				<div class="ui-block">
					<article class=" hentry post searches-item">
                        <div class=" post__author author vcard inline-items">
							<img src="{{asset('/storage/img/img_person/'.$post->user->image->image)}}" alt="author">
							<div class="author-date">
								<a class="h6 post__author-name fn" href="02-ProfilePage.html">{{$follower->name}}</a>
								<div class="country">مکان</div>
							</div>
                            @if($post->user==Auth::user())
							<span class="notification-icon">
								<a href="{{url('/posts/delete/'.$post->id)}}" class="">
									<span class=" without-text">
										حذف
									</span>
								</a>
							</span>
                            @endif
						</div>
                        <div  class="text-right">
                            <h6 class="">
                                {{$post->title}}
                            </h6><br>
                            <p class="user-description">
                                {{$post->description}}
                            </p><br>
                        </div>
                        <div class="post-block-photo js-zoom-gallery">
							<img style="width: 80%;height:300px" class="d-block mx-auto" src="{{asset('/storage/img/'.$post->image)}}" alt="photo">
						</div>
						<div class="post-additional-info">


							<div class="names-people-likes">
								<span>{{count($post->comments)}}</span>
								<a href="{{url('posts/comments/'.$post->id)}}">تعداد کامنت ها</a>
							</div>
							<div class="friend-count ">
                            @csrf
                                <span  class="like"><i name="like"class="check {{ (Auth::user()->like_user()->count()==0)?'far fa-heart':'fas fa-heart'}}"></i>
                                <span class="countLike h6"><?= $post->like_post()->count() ?></span></span>

                                <input  type="hidden" class=" inputValue" value="{{$post->id}}">
							</div>
						</div>


					</article>

				</div>
			</div>
			@endforeach
			@endforeach

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="search-items-to-load.html" data-container="search-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
				</svg>
			</a>
		</div>
		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				<div style="height: 350px !important;" class="widget w-build-fav">

					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>

					<div class="widget-thumb">
						<img src="{{asset('/image/build-fav.png')}}" alt="notebook">
					</div>

					<div  dir="rtl" class="content ">
						<span style="float:right;color:black">مخاطبان خودرا افزایش دهید.</span>
						<a style="float:right;color:black" class="text-decoration-none  h6 mt-2">در چند ثانیه صفحه خودرا بسازید.</a>
						<span class="mt-2 notification-icon">
							<a href="{{url('/posts/add/')}}" class="accept-request">
								<span class=" without-text">
								ایجاد پست
								</span>
							</a>
						</span>
					</div>

				</div>
			</div>
		</div>
		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">اکانت من</h6>

				</div>
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img src="{{asset('/storage/img/img_person/'.Auth::user()->image->image)}}" alt="author">
						</div>
						<div class="notification-event">
							<a class="h6 notification-friend">َ{{Auth::user()->name}}</a>
						</div>
						<span class="notification-icon">
							<a href="{{url('/home/myposts/'.Auth::user()->id)}}" class="accept-request">
								<span class=" without-text">
								دیدن پست ها
								</span>
							</a>
						</span>
					</li>
				</ul>
			</div>
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">پیشنهاد افراد </h6>
                </div>

                @foreach($notFollows as $notFollow)

                    <ul class="widget w-friend-pages-added notification-list friend-requests">
                        <li class="inline-items">
                            <div class="author-thumb">
                                <img src="{{asset('/storage/img/img_person/'.$notFollow->image->image)}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">{{$notFollow->name}} </a>
                            </div>
                            <span class="notification-icon">
                                <a href="{{url('/follow/store/'.$notFollow->id)}}"  class="accept-request btn btn-secondary ">
                                    <span class=" without-text">
                                    درخواست دوستی
                                    </span>
                                </a>
                                <a href="{{url('/follow/show/'.$notFollow->id)}}"  class="accept-request btn btn-secondary ">click</a>
                            </span>
                        </li>
                    </ul>
                @endforeach
            </div>
            <div class="ui-block">
            <div class="ui-block-title">
                    <h6 class="title">درخواست دوستی </h6>
                </div>
            @foreach($request_follow as $follow)
                <ul class="widget w-friend-pages-added notification-list friend-requests">

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="{{asset('/storage/img/img_person/'.$follow->image->image)}}" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">{{$follow->name}} </a>
                        </div>
                        <span class="notification-icon">
                            <a  href="{{url('/follow/accept/'.$follow->id)}}"  class=" btn btn-secondary accept-request ">
                                <span class=" without-text">
                                قبول درخواست
                                </span>
                            </a>
                        </span>
                    </li>
                </ul>
            @endforeach
            </div>
            <div style="background-color: #ff5e3a;" class="ui-block">
                <div class="ui-block-title">
                        <h6 style="color:black" class="title">فالووینگ </h6>
                </div>

                @foreach(Auth::user()->followers as $user)
                    @if($user->accepted_at!=null)
                    @foreach($user->userFollower()->get() as $userFollower)
                    <ul class="widget w-friend-pages-added notification-list friend-requests">

                        <li class="inline-items">
                            <div class="author-thumb">
                                <img src="{{asset('/storage/img/img_person/'.$userFollower->image->image)}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a style="color:black" href="#" class="h6 notification-friend">{{$userFollower->name}} </a>
                            </div>
                            <span class="notification-icon">
                                <a href="{{url('/follow/un_following/'.$userFollower->id)}}"  class=" btn btn-secondary ">
                                    <span class=" without-text">
                                    لغو درخواست
                                    </span>
                                </a>
                            </span>
                        </li>
                    </ul>

                @endforeach
                @endif
                @endforeach

            </div>
            <div style="background-color: #ff5e3a;" class="ui-block">
                 <div class="ui-block-title">
                    <h6 style="color:black" class="title">فالور</h6>
                </div>
                @foreach($followers as $follow)

                    <ul class="widget w-friend-pages-added notification-list friend-requests">
                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="{{asset('/storage/img/img_person/'.$follow->image->image)}}" alt="author">
                        </div>
                        <div class="notification-event">
                            <a style="color:black" href="#" class="h6 notification-friend">{{$follow->name}} </a>
                        </div>
                        <span class="notification-icon">
                            <a href="{{url('/follow/un_follow/'.$follow->id)}}"  class=" btn btn-secondary ">
                                <span class=" without-text">
                                لغو دنبال کردن
                                </span>
                            </a>
                        </span>
                    </li>
                    </ul>
                @endforeach
            </div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
    }
});
$('.like').click(function(){
    var code=$('.inputValue').val();
    $.ajax({
        type:'POST',
        url:'/like_check/' + code,
        success:function(data) {
            if(data==0){
                $('span[class="like"]').children().removeClass("fas")
                $('span[class="like"]').children().addClass("far")
                $('.countLike').text(parseInt($('.countLike').text())-1);
            }else{
                $('span[class="like"]').children().removeClass("far")
                $('span[class="like"]').children().addClass("fas")
                $('.countLike').text(parseInt($('.countLike').text())+1);
            }

        },
    });
})
</script>
@endsection
