<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="m-3 navbar-brand" href="home.php">Blood Bank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="m-3 nav-link btn btn-outline-danger" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="m-3 nav-link btn btn-outline-danger" href="donor-reg.php">Donor Regestration</a>
        </li>
        <li class="nav-item dropdown">
          <a class="m-3 nav-link dropdown-toggle btn btn-outline-danger" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
          <ul class="dropdown-menu btn btn-outline-danger" aria-labelledby="navbarScrollingDropdown">
            <li><a class="my-3 dropdown-item btn btn-outline-danger" href="login.php">Admin Login</a></li>
            <li><a class="my-3 dropdown-item btn btn-outline-danger" href="#">Donor Login</a></li>
            <li><a class="my-3 dropdown-item btn btn-outline-danger" href="#">Seeker Login</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-danger" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>