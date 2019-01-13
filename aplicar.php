<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="At recruitingnow4you we help employers to hire workers, as we help workers to find employees. Is that simple.">
  <meta name="keywords" content="talent agency" "job fair" "jobs available">
  <meta name="author" content="recruitingnow4you.com">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="button.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href=img/favicon.png>
  <title>RecruitingNow4You - Apply for your new job</title>
  <style>
    body {
      background-color: white;
    }

    .container {
      max-width: 760px;
    }

    span {
      color: #d60000;
    }

    .contact-form {
      background-position: center;
      background-size: cover;
      border-radius: 5px;
    }
  </style>
</head>

<body>

  <!-- Navbar start -->
  <nav class="navbar fixed-top navbar-expand-md  navbar-dark bg-primary lead">
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
        <li class="nav-item active">
          <a class="nav-link" href="workers.html">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->

  <!-- Jumbotron showcase -->
  <section class="aplicar__display">
      <div class="aplicar__display__picture">
        <div class="container aplicar__display__text">
          <h1 class="display-5 text-light">Start your new job</h1>
          <p class="lead text-light">Apply from here, send us your resume</p>
          <button type="button" class="btn btn-primary">
            <a class="text-light" href="contact.php">Questions?</a>
          </button>
        </div>
      </div>
    </section>
  <!-- Jumbotron showcase ends-->

  <!-- Section informativa -->
  <section class="container">
    <h1 class="text-primary mt-5">
      <strong>How to apply?</strong>
    </h1>
    <h2 class="text-dark mt-3">Looking for a job? We got you covered!</h2>
    <p class="lead">With over 50 openings, we actually have a job for you.  Fill out the next form and attach your resume, one of our staff members will contact you as soon as possible.  We hope to see you soon.</p>
    <p>If you need help to prepare your resume, press the next button for tips on how to build your resume.</p>
    <button class= "btn btn-primary btn-block mb-5"> <a class="text-light" href="https://www.wikihow.com/Make-a-Resume" target="blank"> Help with my resume!</a></button>
  </section>

  <div class="section container">
    <h4>Attach your resume is mandatory, otherwise call us<a href="#tel"> here</a>.</h4>
  </div>

  <!-- Content start -->
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="contact-form bg-primary text-light mt-3 mb-5 px-4 py-5">
                <h3 class="text-center mb-3">Contact Form</h3>
                <div class="text-center">
                    <?php
                    
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    } else if(isset($_SESSION['msgFields'])){
                        echo $_SESSION['msgFields'];
                        unset($_SESSION['msgFields']);
                    }
                    
                    ?>
                </div>
                <form action="SendGrid-API/f_process2.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            <label for="Name">Name<span>*</span></label>
                            <input type="text" name="name" class="form-control bg-dark text-white">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Phone">Phone<span>*</span></label>
                            <input type="text" name="phone" class="form-control bg-dark text-white">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="Email">Email<span>*</span></label>
                            <input type="text" name="email" class="form-control bg-dark text-white">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="Name">Message<span>*</span></label>
                            <textarea name="message" id="" cols="30" rows="10" class="form-control bg-dark text-white"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="File">Document (Resume)<span>*</span></label><br>
                            <input type="file" name="file" class="file"><br>
                            <span class="text-muted">
                                <?php
                                if(isset($_SESSION['msgFile'])){
                                    echo $_SESSION['msgFile'];
                                    unset($_SESSION['msgFile']);
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- Content ends -->
 
  <!-- footer start -->
  <footer class="footer text-white bg-dark pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col col-12 col-md-4">
          <h5>
            <strong>Navigation</strong>
          </h5>
          <a href="index.html">Home</a>
          <br>
          <a href="nosotros.html">About</a>
          <br>
          <a href="servicios.html">Services</a>
          <br>
          <a href="staff.html">Jobs</a>
          <br>
          <a href="contact.php">Contact</a>
          <br>
          <br>
        </div>
        <div class="col col-12 col-md-4">
          <h5>
            <strong>Need employees</strong>
          </h5>
          <a href="tel:4435382638">443-538-2638</a>
          <br>
          <a href="mailto:carlos@santistaffingsolutions.com">carlos@santistaffingsolutions.com</a>
          <br>
          <a href=https://www.google.com/maps/place/7411+Riggs+Rd+%23212,+Hyattsville,+MD+20783/@38.9826766,-76.9808303,17z/data=!4m5!3m4!1s0x89b7c66832c6794f:0xd22b34dcefa12d15!8m2!3d38.982676!4d-76.978641>7411 Riggs Rd. Suite #212
            <br> Hyattsville, MD, 20783</a>
          <br>
          <br>
        </div>

        <div id="tel" class="col col-12 col-md-4">
          <h5>
            <strong>Need a job</strong>
          </h5>
          <a href="tel:4435382638">(443)960-2386
            <br>
          </a>
          <a href="tel:4434106228">(443)410-6228</a>
          <br>
          <a href="mailto:joaquinleiva03@santistaffingsolutions.com">joaquinleiva03@santistaffingsolutions.com</a>
          <br>
          <a href=https://www.google.com/maps/place/7411+Riggs+Rd+%23212,+Hyattsville,+MD+20783/@38.9826766,-76.9808303,17z/data=!4m5!3m4!1s0x89b7c66832c6794f:0xd22b34dcefa12d15!8m2!3d38.982676!4d-76.978641>7411 Riggs Rd. Suite #212
            <br> Hyattsville, MD, 20783</a>
          <br>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col col-12">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3101.431299469393!2d-76.98080628409996!3d38.98265187955748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7c66832c6794f%3A0xd22b34dcefa12d15!2s7411+Riggs+Rd+%23212%2C+Hyattsville%2C+MD+20783!5e0!3m2!1sen!2sus!4v1521207891489" width="300" height="225" frameborder="0" style="border:0" allowfullscreen></iframe>
          <div class="col col-12 col-md-12 mt-2 mb-2">
            <h5>
              <strong>Appreciate your business</strong>
            </h5>
            <p id=pfooter>Our goal is your satisfaction. See you soon.</p>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          © 2018 Rights Reserved
          <a href="index.html">recruitingnow4you</a>
        </div>
      </div>
  </footer>
  <!-- footer ends -->


  <!-- back to top button -->
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="fas fa-arrow-up"></i>
  </button>
  <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
      } else {
        document.getElementById("myBtn").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- back to top button ends -->

</body>

<!-- bootstrap jquery plugins -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"></script>
<!-- bootstrap jquery plugins ends-->

</html>