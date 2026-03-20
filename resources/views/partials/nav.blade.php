    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">amaz<span>on</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <form class="d-flex flex-grow-1 mx-lg-4 my-2 my-lg-0 search-group">
                    <input class="form-control" type="search" placeholder="Search Amazon">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <div style="line-height: 1.2;">
                                <small style="font-size: 11px;">Hello, Sign in</small><br>
                                <span style="font-weight: 700;">Account & Lists</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <div style="line-height: 1.2;">
                                <small style="font-size: 11px;">Returns</small><br>
                                <span style="font-weight: 700;">& Orders</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link cart-icon" href="{{ route('cart') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-badge">3</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
