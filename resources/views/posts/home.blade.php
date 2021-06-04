@extends('layouts.main')
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
				<div class="ui-block-title">
					<div class="h6 title">Showing 12 Results for: “<span class="c-primary">Mari</span>”</div>
				</div>
			</div>
			@foreach($posts as $key=>$post)
			<div id="search-items-grid">
				<div class="ui-block">
					<article class=" hentry post searches-item">
                        <div class=" post__author author vcard inline-items">
							<img src="{{asset('/storage/img/avatar75-sm.jpg')}}" alt="author">
							<div class="author-date">
								<a class="h6 post__author-name fn" href="02-ProfilePage.html">{{$post->user->name}}</a>
								<div class="country">مکان</div>
							</div>

							<span class="notification-icon">
								<a href="{{url('/posts/delete/'.$post->id)}}" class="">
									<span class=" without-text">
										حذف
									</span>
								</a>
							</span>
						</div>
                        <p class="user-description">
                            {{$post->title}}
						</p>
						<p class="user-description">
							{{$post->description}}
						</p>
						<div class="post-block-photo js-zoom-gallery">
							<img src="{{asset('/storage/img/post-photo7.jpg')}}" alt="photo">
						</div>
						<div class="post-additional-info">

							<ul class="friends-harmonic">
                                <!--عکس های پایین پست-->
								<li>
									<a href="#">
										<img src="{{asset('/storage/img/friend-harmonic7.jpg')}}" alt="friend">
									</a>
								</li>
							</ul>
							<div class="names-people-likes">
								<span>{{count($post->comments)}}</span>
								<a href="{{url('posts/comments/'.$post->id)}}">تعداد کامنت ها</a>
							</div>
							<div class="friend-count">
								<a href="#" class="friend-count-item">
									<div class="h6">120</div>
									<div class="title">لایک</div>
								</a>
							</div>
						</div>


					</article>

				</div>
			</div>
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
						<img src="{{asset('/storage/img/build-fav.png')}}" alt="notebook">
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
					<h6 class="title">Friend Suggestions</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
				</div>
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img src="{{asset('/storage/img/avatar38-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">اسم دوستان</a>
							<span class="chat-message-item">دوستان مشترک</span>
						</div>
						<span class="notification-icon">
							<a href="#" class="accept-request">
								<span class=" without-text">
								دیدن پست ها
								</span>
							</a>
						</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
