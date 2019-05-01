<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Valleecious</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/contestant.php">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav">
    <?php
      $email = '';
      if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
      }
    ?>
    <?php if(!empty($email)){ ?>
      <li class="nav-item">
        <span class="navbar-text">
        <?php echo $email;?>
      </span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout.php">Logout</a>
      </li>
      <?php } else { ?>
      <li class="nav-item">
        <a class="nav-link" href="/register.php">Signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/login.php">Login</a>
      </li>
      <?php } ?>
    </ul>
    <span class="navbar-text">
      
    </span>
  </div>
</nav>
