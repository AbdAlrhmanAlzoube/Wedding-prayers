<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Party</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS for icons and styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="site-navbar py-2">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <div class="site-logo">
                    <img src="{{ asset('customer/images/logo.png') }}" alt="Picture" style="max-width: 10%; height: auto; margin-right: 5px">
                    <a href="" class="js-logo-clone font">Elegant Event</a>
                </div>
            </div>
            <div class="main-nav d-none d-lg-block">
                <nav class="site-navigation text-right text-md-center" role="navigation">
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li class="active"><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{ route('view-reservations') }}">Store</a></li>
                        {{-- <li><a href="{{ route('about') }}">About</a></li> --}}
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <a href="{{ route('evaluation') }}">Reviews</a>
                    </ul>
                </nav>
            </div>
            <div class="icons d-flex align-items-center">
                @guest
                    <a href="{{ route('user.login') }}" class="icons-btn d-inline-block ml-3">
                        <span class="icon-user"></span> Login
                    </a>
                @else
                    <div class="dropdown ml-3">
                        <a href="#" class="icons-btn d-inline-block" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon-user"></span> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <a href="{{ route('view_order') }}" class="btn btn-primary ">Order</a>
                @endguest
                <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="" method="GET" class="search-form d-none">
            <input type="text" class="form-control" name="query" placeholder="Search keyword and hit enter...">
        </form>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Additional jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.js-search-toggle').on('click', function (e) {
            e.preventDefault();
            $('.search-form').toggleClass('d-none');
        });

        // Optional: Close the search form when clicking outside of it
        $(document).on('click', function (e) {
            if (!$(e.target).closest('.icons-btn, .search-form').length) {
                $('.search-form').addClass('d-none');
            }
        });
    });
</script>

<style>
    .search-form {
        position: absolute;
        top: 60px;
        right: 0;
        width: 300px;
        background: white;
        border: 1px solid #ddd;
        padding: 10px;
        z-index: 1000;
    }
    .icons {
        display: flex;
        align-items: center;
    }
    .icons-btn {
        margin-left: 10px;
        display: flex;
        align-items: center;
    }
    .dropdown-menu {
        min-width: auto;
        padding: 0.5rem;
    }
    .dropdown-item {
        padding: 0.5rem 1rem;
    }
</style>
</body>
</html>
