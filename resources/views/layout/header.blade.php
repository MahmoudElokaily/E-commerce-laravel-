<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="{{route('home')}}">
            Elokaily
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('allCategories')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about-us')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact-us')}}">Contact-Us</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                @auth
                    <a class="nav-icon position-relative text-decoration-none" href="{{route('cart' , \Illuminate\Support\Facades\Auth::user()->id)}}">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        @if(\Illuminate\Support\Facades\Auth::user()->products->count() > 0)
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">{{\Illuminate\Support\Facades\Auth::user()->products->count()}}</span>
                        @endif

                    </a>
                    <div class="dropdown">
                        <button class="nav-icon position-relative text-decoration-none dropbtn" href="{{route('myProfile' , \Illuminate\Support\Facades\Auth::user()->id)}}">
                            <i class="fa fa-fw fa-user text-dark mr-3"></i>
                            <div class="dropdown-content">
                                @if(Auth::user()->admin)
                                    <a href="{{route('admin.add-category')}}">Add Category</a>
                                    <a href="{{route('admin.add-product')}}">Add Product</a>
                                @endif
                                <a href="{{route('myProfile' , Auth::user()->id)}}">My Profile</a>
                                <a href="{{route('admin.logout')}}">Log out</a>
                            </div>
                        </button>
                    </div>
                @endauth
                @guest
                    <div class="dropdown">
                        <button class="dropbtn" style="background-color: #3e8e41">Join us</button>
                        <div class="dropdown-content">
                            <a href="{{route('auth.login')}}">log in</a>
                            <a href="{{route('auth.register')}}">sign up</a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>

    </div>
</nav>
