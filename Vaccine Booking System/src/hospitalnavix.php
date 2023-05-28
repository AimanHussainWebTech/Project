<?php
include "config.php";
?>
<?php if(!isset($_SESSION['hospitalid'])){
    echo "<script>window.location.href = 'hospitalLogin.php'</script>";
}
?>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo $_SESSION['hospitaluser'] ?> Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="updatevacc.php">Update Available Vaccines</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Hospitalprof.php">Appointments</a>
        </li>

    
      <li class="d-flex nav-item">
          <a class="nav-link active" id="logout" aria-current="page" href="updatevacc.php?logout=true">Logout</a>
        </li>
    </div>
  </div>
</nav>