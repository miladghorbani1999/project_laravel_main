@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row">
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
		<div class="col col-10 mx-auto d-block">
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
                        <div class=" post-block-photo js-zoom-gallery">
							<img class="mx-auto d-block" src="{{asset('/storage/img/post-photo7.jpg')}}" alt="photo">
						</div>
                        <div class="text-right mt-5">
                            <p class="">
                                {{$post->title}}
                            </p>
                            <p class="">
                                {{$post->description}}
                            </p>
                        </div>

						<div class="post-additional-info row">

							<ul class="col-1 friends-harmonic">
                                <!--عکس های پایین پست-->
								<li>
									<a href="#">
										<img src="{{asset('/storage/img/friend-harmonic7.jpg')}}" alt="friend">
									</a>
								</li>
							</ul>
							<div class="col-2 names-people-likes">
								<span>نعداد کامنت</span>
								<a href="{{url('posts/comments/'.$post->id)}}">{{count($post->comments)}}</a>
							</div>
							<div style="float: right;" class="col-8 text-right">
								<a href="#" class="friend-count-item">
									<div class="h6">120</div>
									<div class="title">لایک</div>
								</a>
							</div>

						</div>
					</article>
					<form action="{{url('comments/store/'.$post->id)}}" style="width: 700px;" method="POST" class="col-8 d-block mx-auto">
                    @csrf()
                        <div class="form-group col-12 ">
                            <label for="nameInput"> کامنت</label>
                            <div class="row">
                                <input type="text" name="text" class="col-10 form-control">
                                <button style="float:left;" name="submit" type="submit" class="col-2 form-control">ثبت کامنت</button>
                            </div>
                        </div>
                    </form>
				</div>
                <div style="background-color:white;" class="comment">
                    <hr>
                    <div class="col-12 d-black">
                        @foreach($post->comments as $comment)
						<div class="col-12">
                            <div class="row">
                                <p class="col-10">{{$post->user->name}} comment :{{$comment->text}}</p>
                                @if($comment->user_id==Auth::user()->id)
                                <a class="col-2 text-right" href="comments/delete">حذف کامنت</a>
                                @endif
                            </div>


							<br>
						</div>
						@endforeach


                    </div>

                </div>
            </div>
	</div>
</div>
@endsection
