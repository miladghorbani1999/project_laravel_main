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
                            <img src="{{asset('/storage/img/img_person/'.$post->user->image->image)}}" alt="author">
							<div class="author-date">
								<a class="h6 post__author-name fn">{{$post->user->name}}</a>
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
							<img style="width: 80%;height:300px" class="mx-auto d-block" src="{{asset('/storage/img/'.$post->image)}}" alt="photo">
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
