<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Valleecious</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost:8888/valleevote/contestant.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="http://localhost:8888/valleevote/register.php"><?php if($_SESSION["email"]){ echo '';}else{ echo 'Signup'; } ;?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost:8888/valleevote/login.php"><?php if($_SESSION["email"]){ echo '';}else{ echo 'Login'; } ;?></a>
      </li>
    </ul>
    <span class="navbar-text">
      
    </span>
  </div>
</nav>
