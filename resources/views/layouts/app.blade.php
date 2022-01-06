<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description-gambolthemes" content="">
	<meta name="author-gambolthemes" content="">
	<title>Incontri Admin</title>
	<link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin-style.css')}}" rel="stylesheet">
    
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/all.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<link href="{{asset('css/select.css')}}" rel="stylesheet">
    @livewireStyles
	<script src="{{ mix('js/app.js') }}" defer></script>
	<script src="{{ asset('js/select.js') }}"></script>
	
</head>

    <body class="sb-nav-fixed">
		<nav class="sb-topnav navbar navbar-expand navbar-light bg-clr">
			<a class="navbar-brand logo-brand" href="{{route('dashboard')}}">INCONTRI</a>
			<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
			<ul class="navbar-nav ml-auto mr-md-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i><span class="text-sm">{{ Auth::user()->name }}</span></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<div class="mt-1 space-y-1">
							<!-- Account Management -->
							<x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
								{{ __('Profile') }}
							</x-jet-responsive-nav-link>
			
							@if (Laravel\Jetstream\Jetstream::hasApiFeatures())
								<x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
									{{ __('API Tokens') }}
								</x-jet-responsive-nav-link>
							@endif
			
							<!-- Authentication -->
							<form method="POST" action="{{ route('logout') }}">
								@csrf
			
								<x-jet-responsive-nav-link href="{{ route('logout') }}"
												onclick="event.preventDefault();
												this.closest('form').submit();">
									{{ __('Log Out') }}
								</x-jet-responsive-nav-link>
							</form>
			
							<!-- Team Management -->
							@if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
								<div class="border-t border-gray-200"></div>
			
								<div class="block px-4 py-2 text-xs text-gray-400">
									{{ __('Manage Team') }}
								</div>
			
								<!-- Team Settings -->
								<x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
									{{ __('Team Settings') }}
								</x-jet-responsive-nav-link>
			
								@can('create', Laravel\Jetstream\Jetstream::newTeamModel())
									<x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
										{{ __('Create New Team') }}
									</x-jet-responsive-nav-link>
								@endcan
			
								<div class="border-t border-gray-200"></div>
			
								<!-- Team Switcher -->
								<div class="block px-4 py-2 text-xs text-gray-400">
									{{ __('Switch Teams') }}
								</div>
			
								@foreach (Auth::user()->allTeams() as $team)
									<x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
								@endforeach
							@endif
						</div>
					</div>
				</li>
			</ul>
		</nav>
		
        <div id="layoutSidenav" class="py-0 my-o">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">	
							<a class="nav-link" href="{{route('index_categoria')}}" >
								<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Categorias productos
							</a>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
								<div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Productos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
                            <div class="collapse" id="collapseProducts" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link sub_nav_link" href="{{route('index_producto')}}">Mostrar productos</a>
									<a class="nav-link sub_nav_link" href="{{route('create_producto')}}">Agregar producto</a>
								</nav>
                            </div>
							<a class="nav-link" href="{{route('index_orden')}}">
								<div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                                Pedidos
							</a>
							<a class="nav-link" href="{{route('index_menu_categoria')}}" >
								<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
								Categorias menu
							</a>
							<div class="collapse" id="collapseCategories" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
								<nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link sub_nav_link" href="category.html">Mostrar categorias</a>
									<a class="nav-link sub_nav_link" href="add_category.html">Agregar categoria</a>
								</nav>
							</div>
							<a class="nav-link" href="{{route('index_menu')}}" >
								<div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
								Menu
							</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('js/scripts.js')}}"></script>
		<script src="{{asset('js/all.min.js')}}"></script>
		<script type="text/javascript">
			function readURL(input) {
				var url = input.value;
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('.imageid').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
					document.getElementById('file_image').innerHTML=url;
				}
			}
		</script>
		<script>
			$(document).ready(function(){
				var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
					removeItemButton: true,
					maxItemCount:5,
					searchResultLimit:5,
					renderChoiceLimit:5
				});
				
			});
		</script>
		@livewireScripts
    </body>
</html>

