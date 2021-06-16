@extends('layouts.main')
@section('content')
<div  class="container ">
	<div class="d-block mx_auto">
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
		<div class="col col-xl-11 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12 ">
			<div class="ui-block">
			</div>


            @foreach($posts as $post)
			<div  id="search-items-grid">
				<div class="ui-block">
					<article class=" hentry post searches-item">
                        <div class=" post__author author vcard inline-items">
							<img  src="{{asset('/storage/img/img_person/'.$post->user->image->image)}}" alt="author">
							<div class="author-date">
								<a class="h6 post__author-name fn" href="#">{{$post->user->name}}</a>
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

						<div class="post-block-photo js-zoom-gallery">
							<img style="width: 80%;height:300px" class="d-block mx-auto" src="{{asset('/storage/img/'.$post->image)}}" alt="photo">
						</div>
                        <div  class="text-right">
                            <h6 class="">
                                {{$post->title}}
                            </h6><br>
                            <p class="user-description">
                                {{$post->description}}
                            </p><br>
                        </div>

						<div class="post-additional-info">

							
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

	</div>
</div>

@endsection
