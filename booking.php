<?php
require_once 'partials/config.php';
require_once 'partials/db.php';
require_once 'partials/func.php';
?>

    <?php require_once 'partials/header.php' ?>

  <!-- Navbar start -->
  <nav class="navbar fixed-top navbar-expand-md  navbar-dark bg-primary lead mb-5">
  <img src="img/logo.png" width="30" height="30" class="d-inline-block align-middle" alt="logo">
  <a class="navbar-brand text-light nav-title" href="index.html">recruitingnow4you</a>

    <!-- Responsive button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="nosotros.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="servicios.html">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="workers.html">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->

<header class="my-3 mt-5 text-center">
    <div class="container">
        <div class="jumbotron jumbotron-fluid bg-transparent text-dark">
            <div class="container">
                <h1 class="display-5">Request more information</h1>
                <p class="lead">Schedule an appointment or a phone call.  Wait for confirmation from us.</p>
            </div>
        </div>
    </div>
</header>

<main class="mb-5">
    <div class="container">

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="mb-3 text-right">
                    <?php
                        if(isset($_SESSION['user_data'])) {
                            echo "<a href='viewAll.php' class='btn btn-success'>See all</a> ";
                            echo "<a href='profile.php' class='btn btn-primary'>Profile</a> ";
                            echo "<a href='logout.php' class='btn btn-danger'>Log out</a>";
                        } else {
                            echo "<a href='login.php' class='btn btn-success'>Log in</a>";
                        }
                    ?>

                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="cart-title text-center">Request information</h5>
                            <hr>
                            <label for="">Available time</label>
                            <p>
                                <?php
                                    $times = getTimes();
                                    foreach($times as $t){
                                        if($t['start_time'] == ''){
                                            echo "<strong style='width:100px; display:inline-block; text-align:right'>{$t['day']}:</strong> Not available";
                                        } else {
                                            echo "<strong style='width:100px; display:inline-block; text-align:right'>{$t['day']}:</strong> {$t['start_time']} to {$t['end_time']}<br>";
                                        }
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="text-success">
                                <?php
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                                ?>
                            </div>
                            <div class="text-danger">
                                <?php
                                if(isset($_SESSION['msgErr'])){
                                    echo $_SESSION['msgErr'];
                                    unset($_SESSION['msgErr']);
                                }
                                ?>
                            </div>
                            <form action="partials/process.php" method="post">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="" placeholder="Full Name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">E-Mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="" placeholder="EMail" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Date (Press to choose)</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="date" id="date" onchange="loadTimes()" class="form-control" required placeholder="Pick a date">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Time</label>
                                    <div class="col-sm-10">
                                        <select name="time" id="time" class="form-control" required>
                                            <option selected>Pick a date first</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Purpose</label>
                                    <div class="col-sm-10 mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="purpose[]" type="checkbox" id="inlineCheckbox1" value="Llamada">
                                            <label class="form-check-label" for="inlineCheckbox1">Phone call</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="purpose[]" type="checkbox" id="inlineCheckbox2" value="Cita">
                                            <label class="form-check-label" for="inlineCheckbox2">Appointment</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="purpose[]" type="checkbox" id="inlineCheckbox3" value="Otro">
                                            <label class="form-check-label" for="inlineCheckbox3">Other</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">More details (Optional)</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control" placeholder="Write here..."></textarea>
                                    </div>
                                </div>

                                <button type="submit" name="add_appointment" class="btn btn-secondary offset-sm-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'partials/footer.php' ?>
