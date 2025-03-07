<nav class="navbar navbar-expand-lg navbar-light custom-header">
  <div class="container-fluid">
    <a class="navbar-brand text-white fw-bold" href="/">Online Food Ordering System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse container-fluid navbar-collapse d-flex gap-5" id="navbarNav">
      <ul class="navbar-nav">
        <!--
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/user-profile/1">Profile</a>
            </li>
        -->
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="/product">Product Catalogue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="/admin/dashboard">Dashboard</a>
        </li>
      </ul>

      <!--  
      <span class="d-flex gap-2" style="align-items: center;">
        <form action="/login" method="post">
          <button type="submit">Login</button>
        </form>
        <form action="/logout" method="post">
          <button type="submit">Logout</button>
        </form>
      </span>
      <?= view_cell('UserLoginCell'); ?>
      -->


    </div>
  </div>
</nav>