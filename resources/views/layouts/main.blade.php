
<!DOCTYPE html>
<html lang="en">
<head>
	<title>شبکه اجتماعی</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet"  href="{{asset('/css/bootstrap.css')}}">
	<link rel="stylesheet"  href="{{asset('/css/main.min.css')}}">
    <script src="https://kit.fontawesome.com/cdc025bad6.js" crossorigin="anonymous"></script>
</head>
<body >
<div class="fixed-sidebar">
	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">
		<a href="02-ProfilePage.html" class="logo">
			<div class="img-wrap">
				<img src="{{asset('/image/logo.png')}}" alt="Olympus">
			</div>
		</a>
	</div>
</div>
<div class="fixed-sidebar right">
	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right">
		@yield('nav')
	</div>
</div>

<header class="header" id="site-header">



	<div class="header-content-wrapper">

		<div class="control-block">

			<!--تصویر سمت راست بالا-->
			<div class="author-page author vcard inline-items more">
				<div class="author-thumb">
					<img alt="author" src="{{asset('/storage/img/img_person/'.Auth::user()->image->image)}}" class="avatar">
					<span class="icon-status online"></span>
					<div class="more-dropdown more-with-triangle">
						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Your Account</h6>
							</div>

							<ul class="account-settings">
								<li>
									<a href="{{url('/profile/')}}">
										<svg class="olymp-menu-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
										<span>نمایش پروفایل</span>
									</a>
								</li>
                                <li>
									<a href="{{url('/home')}}">
									<svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="24px" height="24px">
									<path d="M 12 3.90625 L 11.75 4.0625 L 0.25 11.0625 L 0.75 11.9375 L 12 5.09375 L 23.25 11.9375 L 23.75 11.0625 L 20 8.78125 L 20 4 L 18 4 L 18 7.5625 L 12.25 4.0625 Z M 12 6.5 L 2 12.5 L 2 24 L 22 24 L 22 12.5 Z M 9 13 L 15 13 L 15 22 L 9 22 Z"/></svg>
										<span>بازگشت به خانه</span>
									</a>
								</li>
								<li>
									<a href="{{url('/posts/add')}}">
										<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-star-icon')}}"></use></svg>

										<span>ایجاد پست</span>
									</a>
								</li>
								<li>
                                @guest
                                     @if (Route::has('login'))
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                         </li>
                                     @endif
                                     @if (Route::has('register'))
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                         </li>
                                     @endif
                                 @else
                                     <li class="nav-item ">
                                     <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                     <svg class="olymp-logout-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-logout-icon')}}"></use></svg>
                                         {{ __('خروج از حساب') }}
                                     </a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                     </form>
                                     </li>
                                 @endguest
								</li>
								<li>
									<a href="#">
										<svg class="olymp-logout-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-logout-icon')}}"></use></svg>
										<span>دوستان</span>
									</a>
								</li>
							</ul>
						</div>

					</div>
				</div>
				<a href="02-ProfilePage.html" class="author-name fn">
					<div class="author-title">
						{{Auth::user()->name}} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
					</div>
					<span class="author-subtitle">توضیحات</span>
				</a>
			</div>

		</div>
	</div>

</header>
<div class="header-spacer"></div>
@yield('content')

<a class="back-to-top" href="#">
	<img src="{{asset('/storage/svg-icons/back-to-top.svg')}}" alt="arrow" class="back-icon">
</a>
<script src="{{asset('/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/jquery.appear.js')}}"></script>
<script src="{{asset('/js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/material.min.js')}}"></script>
<script src="{{asset('/js/bootstrap-select.js')}}"></script>
<script src="{{asset('/js/moment.js')}}"></script>
<script src="{{asset('/js/base-init.js')}}"></script>
<script src="{{asset('/Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
@yield('scripts')

</body>
</html>
