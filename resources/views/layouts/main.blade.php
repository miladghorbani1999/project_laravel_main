
<!DOCTYPE html>
<html lang="en">
<head>
	<title>شبکه اجتماعی</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet"  href="{{asset('/css/bootstrap.css')}}">
	<link rel="stylesheet"  href="{{asset('/css/main.min.css')}}">
</head>
<body >
<div class="fixed-sidebar">
	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">
		<a href="02-ProfilePage.html" class="logo">
			<div class="img-wrap">
				<img src="{{asset('/storage/img/logo.png')}}" alt="Olympus">
			</div>
		</a>
	</div>
</div>
<div class="fixed-sidebar right">
	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right">

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="chat-users">
                <!--عکس سمت راست نوبار-->
				<li class="inline-items js-chat-open">
					<div class="author-thumb">
						<img alt="author" src="{{asset('/storage/img/avatar67-sm.jpg')}}" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>

<header class="header" id="site-header">

	<div class="page-title">
		<h6>نتایج جستجو</h6>
	</div>

	<div class="header-content-wrapper">
		<form class="search-bar w-search notification-list friend-requests">
			<div class="form-group with-button">
				<input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
				</div>
		</form>

		<a href="#" class="link-find-friend">جستجو دوستان</a>

		<div class="control-block">

			<!--تصویر سمت راست بالا-->
			<div class="author-page author vcard inline-items more">
				<div class="author-thumb">
					<img alt="author" src="/storage/img/author-page.jpg" class="avatar">
					<span class="icon-status online"></span>
					<div class="more-dropdown more-with-triangle">
						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Your Account</h6>
							</div>

							<ul class="account-settings">
								<li>
									<a href="29-YourAccount-AccountSettings.html">
										<svg class="olymp-menu-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
										<span>ویرایش پروفایل</span>
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
						اسم <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
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
</body>
</html>
