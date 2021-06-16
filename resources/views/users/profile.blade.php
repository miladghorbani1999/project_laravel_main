@extends('layouts.main')
@section('content')
<div class="container mt-5">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">

					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="#" class="friend-count-item">
											<div class="h6">{{$count_followers}}</div>
											<div class="title">followers</div>
										</a>
									</li>
                                    <li>
										<a href="#" class="friend-count-item">
											<div class="h6">{{$counter_following}}</div>
											<div class="title">following</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="#" class="friend-count-item">
											<div class="h6">{{Auth::user()->posts->count()}}</div>
											<div class="title">Posts</div>
										</a>
									</li>
									<li>
										<a href="#" class="friend-count-item">
											<div class="h6">{{$count_like}}</div>
											<div class="title">Likes</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="#" class="author-thumb">
							<img class="author-thumb" src="{{asset('/storage/img/img_person/'.Auth::user()->image->image)}}" alt="author">
						</a>
						<div class="author-content">
							<a href="02-ProfilePage.html" class="h4 author-name">{{Auth::user()->name}}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
