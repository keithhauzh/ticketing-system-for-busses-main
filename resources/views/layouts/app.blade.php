<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ticketing System for Busses</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>

  <body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <!-- logo -->
        <div class="row d-flex justify-content-end">
          <nav class="navbar navbar-expand-lg">
            <div class="container">
              <a class='navbar-brand' href='/'>
                Ticketing System for Busses
              </a>
            </div>
          </nav>
        </div>

        <!-- navbar -->
        <div class="row d-flex justify-content-start">
          <nav class="navbar navbar-expand-lg">
            <div class="container">
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a aria-current='page' class='nav-link' href='/'>Home</a>
                </li>
                @auth
                  <li class="nav-item">
                    <a aria-current='page' class='nav-link' href='/tickets'>Tickets</a>
                  </li>
                  @if (auth()->user()->role === "admin")
                    <li class="nav-item">
                      <a aria-current='page' class='nav-link' href='/users'>Users</a>
                    </li>
                    <li class="nav-item">
                      <a aria-current='page' class='nav-link' href='/reviews'>Reviews</a>
                    </li>
                  @endif
                  <li class="nav-item">
                    <a aria-current='page' class='nav-link' href='/logout'>Logout</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a aria-current='page' class='nav-link' href='/login'>Login</a>
                  </li>
                  <li class="nav-item">
                    <a aria-current='page' class='nav-link' href='/signup'>Sign Up</a>
                  </li>
                @endguest
              </ul>
            </div>
            </div>
          </nav>
        </div>
      </div>
    </nav>
    <!-- Header End -->

    @yield('content')

    <!-- footer -->
    <div id="footer" class="d-flex justify-content-center pt-5">
      <div class="container">
        <div class="row feet">
          <div class="col-lg-6">
            <p class="fs-5">© 2024 Ticketing System (educational purposes only)</p>
          </div>
          <div class="col-lg-6 d-flex justify-content-end">
            <p class="fs-3 text-dark">
              <i class="bi bi-facebook"></i>
              <i class="bi bi-twitter"></i>
              <i class="bi bi-instagram"></i>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- js shit dont touch beyond this line -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
