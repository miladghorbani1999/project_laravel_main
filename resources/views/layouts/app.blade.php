
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Landing Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<script src="{{asset('/js/webfontloader.min.js')}}"></script>
    <link rel="stylesheet"  href="{{asset('/css/bootstrap.css')}}">
	<link rel="stylesheet"  href="{{asset('/css/main.min.css')}}">
	<link rel="stylesheet" href="{{asset('/Bootstrap/dist/css/bootstrap-reboot.css')}}">
	<link rel="stylesheet" href="{{asset('/Bootstrap/dist/css/bootstrap-grid.css')}}">
	<link rel="stylesheet" href="{{asset('/css/main.min.css')}}">
	<link rel="stylesheet" href="{{asset('/css/fonts.min.css')}}">
</head>
<body class="landing-page">
<div class="content-bg-wrap"></div>
<div class="header--standard header--standard-landing" id="header--standard">
	<div class="container">
		<div class="header--standard-wrap">

			<a href="#" class="logo">
				<div class="img-wrap">
					<img src="{{asset('/storage/img/logo.png')}}" alt="Olympus">
					<img src="{{asset('/storage/img/logo-colored-small.png')}}" alt="Olympus" class="logo-colored">
				</div>
				<div class="title-block">
					<h6 class="logo-title">olympus</h6>
					<div class="sub-title">شبکه اجتماعی</div>
				</div>
			</a>

			<a href="#" class="open-responsive-menu js-open-responsive-menu">
				<svg class="olymp-menu-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
			</a>

			<div class="nav nav-pills nav1 header-menu">
				<div class="mCustomScrollbar">
					<ul>
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
						<li class="nav-item">
							<a href="#" class="nav-link"> خانه</a>
						</li>
                        <li class="nav-item">
							<a href="#" class="nav-link"> خانه</a>
						</li>
						<li class="nav-item js-expanded-menu">
							<a href="#" class="nav-link">
								<svg class="olymp-menu-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
								<svg class="olymp-close-icon"><use xlink:href="{{asset('/storage/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="header-spacer--standard"></div>

<div class="container">
	<div class="row display-flex">
		<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			<div class="landing-content">
				<h1>به شبکه اجتماعی ما خوش امدید</h1>
				<p>ما بهترین و بزرگترین شبکه اجتماعی هستیم
					برای ثبت نام کلیک کنید
				</p>
				<a href="{{url('/register/')}}" class="btn btn-md btn-border c-white">! ثبت نام</a>
			</div>
		</div>

		<div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
			<div class="registration-login-form">
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Olympus</div>
						<div class="row">
                            @yield('content')
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<script src="{{asset('/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('/js/jquery.appear.js')}}"></script>
<script src="{{asset('/js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/material.min.js')}}"></script>
<script src="{{asset('/js/bootstrap-select.js')}}"></script>
<script src="{{asset('/js/moment.js')}}"></script>
<script src="{{asset('/js/daterangepicker.js')}}"></script>
<script src="{{asset('/js/simplecalendar.js')}}"></script>
<script src="{{asset('/js/base-init.js')}}"></script>
<script src="{{asset('/Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>

</body>
</html>

