<header>

	@php $menuhtml = \App\Helpers\Helper::menus($menus); @endphp

	<!-- Header desktop -->
	<div class="container-menu-desktop">

		<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop container">

				<!-- Logo desktop -->
				<a href="http://127.0.0.1:8000/" class="logo">
					<img src="/template/images/icons/Logo3.png" alt="IMG-LOGO">
				</a>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li class="active-menu"><a href="/">Trang Chủ</a></li>

						{!! $menuhtml !!}

						<li>
							<a href="/contact">Liên hệ</a>
						</li>
						<li>
							@if(!Auth::user())
							<div class="dropdown">
								<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
									Tài Khoản
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="/users/login">Đăng Nhập</a></li>
									<li><a class="dropdown-item" href="/users/singup">Đăng ký</a></li>

								</ul>
								@else
								<div class="dropdown">
									<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
										{{Auth::user()->name}}
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
										<li><a class="dropdown-item" href="/profile">Thông Tin</a></li>

										<li><a class="dropdown-item" href="/logout">Đăng Xuất</a></li>

									</ul>
								</div>
								@endif
						</li>
					</ul>
				</div>

				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m" id="header_item1">
					<form action="/search" method="GET" class="row " style="margin: 0 auto;padding-top: 15px;">
						<div class="form-group">
							<input type="text" class="form-control" name="query" placeholder="Search here....." value="{{ request()->input('query') }}">
						</div>
						&nbsp;
						<div class="form-group">
							<button type="submit" class="btn btn-primary"><i class="zmdi zmdi-search"></i></button>
						</div>
					</form>
					<div class="icon-header-item cl5 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
						<a href="/carts"><i class="zmdi zmdi-shopping-cart"></i></a>
					</div>
				</div>
			</nav>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->
		<div class="logo-mobile" id="header_item1">
			<a href="http://127.0.0.1:8000/"><img src="/template/images/icons/Logo3.png" alt="IMG-LOGO"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15 id=" header_item1"">
			<div class="icon-header-item cl5 hov-cl1 trans-04 p-r-11 js-show-modal-search">
				<a href=""><i class="zmdi zmdi-search"></i></a>
			</div>

			<div class="icon-header-item cl5 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
				<a href="/carts"><i class="zmdi zmdi-shopping-cart"></i></a>
			</div>
		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<ul class="main-menu-m">
			<li class="active-menu"><a href="/">Trang Chủ</a></li>

			{!! $menuhtml !!}

			<li>
				<a href="contact.html">Liên hệ</a>
			</li>
		</ul>
	</div>
</header>

<!-- sundry -->
@include('sundry')