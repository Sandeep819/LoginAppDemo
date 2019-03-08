  <!DOCTYPE html>
  <html>

  <?php

  session_start();

  ?>
    <head>
      <title>Login Demo App</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>
    <body>
<!-- Nav Bar -->
<div class="row">
  <nav class="col s12 l12 m12 grey">
    <div class="nav-wrapper">
      <a href="index.html" class="brand-logo">Login Demo App</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
         <?php
        //to display logout button if session id is set
        if (isset($_SESSION['userId']))
        {

        echo '
        <form action="includes/logout.php">
        <li><input type="submit" name="logout" class="waves-light btn" value="Logout"></li>
        </form>';
        }
        else
        {
          echo '<li><a class="waves-effect waves-light btn modal-trigger" href="#login">Login</a></li>
        <li><a class="waves-effect waves-light btn modal-trigger" href="#signup">Signup</a></li>
       ';
        }

        ?>
      </ul>
      <ul class="side-nav" id="mobile-demo">
<?php
        //to display logout button if session id is set
        if (isset($_SESSION['userId']))
        {

        echo '
        <form action="includes/logout.php">
        <div class="center">
        <li><input type="submit" name="logout" class="waves-effect waves-light btn" value="Logout"></li>
        </div>
        </form>';
        }
        else
        {
          echo '<li><a href="#login" class="waves-effect waves-light btn modal-trigger">Login</a></li>
        <li><a href="#signup" class="waves-effect waves-light btn modal-trigger">Signup</a></li>
       ';
        }



        ?>
      </ul>
    </div>
  </nav>
</div>
<!-- End of nav bar-->

<!-- Modals -->

  <!-- Modal Structure -->
  <!-- Login Modal -->
  <form action="includes/login.php" method="POST">
  <div id="login" class="modal">
    <div class="modal-content">
      <h4>LOGIN</h4>
            <?php

      if(isset($_GET['error']))
      {
        if($_GET['error'] == "invalidpasswordorusername")
        {
          echo'<p class="red-text"> Invalid Username or Password</p>';
        }
      }

      ?>
      <div class="row">
        <div class="input-field col s6">
          <label for="username" >Username</label>
          <input id="username" minlength="5" name="username" type="text" required/>
        </div>
        <div class="input-field col s6">
          <label for="password">Password</label>
          <input type="password" minlength = "5" name="password"  id="password" required/>
        </div>
        </div>
        <div class="row">

          <div class="input-field col s12">
            <a href="www.gmail.co.in">Forgot password?</a>
          </div>
        </div>
        <p>Don't have an account?? <a class="modal-trigger" href="#signup">Signup</a> </p>

      </div>
   
    <div class="modal-footer">
      <div class="center">
      <input type="submit" name="login" class="green center btn white-text" value="Login">
    </div>
    </div>
    <br>
</div>
</form>

<!-- Signup Modal -->
<form action="includes/signup.php" method="POST">
<div id="signup" class="modal">
 
   <div class="modal-content">
       

      <h4>Sign Up</h4>
      <?php

      if(isset($_GET['signup']))
      {
        if($_GET['signup'] == "passwordmismatch")
        {
          echo'<p class="red-text"> Passwords did not match</p>';
        }
      }

      ?>

        <div class="row">
            <div class="input-field col s6">
            <label for="Email" data-error="wrong" data-success="right">Full Name</label>
            <input id="textfullname" type="text" maxlength="100" class="validate" name="fullname" required/>
          </div>

          <div class="input-field col s6">
            <label for="Email" data-error="wrong" data-success="right">Username</label>
            <input id="usname" type="text" minlength="5" class="validate" name="username" required/>
          </div>
        </div>
      <div class="row">
          <div class="input-field col s6">
            <label for="Email">Email-id</label>
            <input id="Email" type="email" data-error="wrong" data-success="right" name="emailid" class="validate" required/>
          </div>
           <div class="input-field col s6">
            <label for="Email" data-error="wrong" data-success="right">Mobile Number:</label>
              <input id="mobile" type="tel" minlength="10" class="validate" maxlength="10"  name="mobileno"  required/>
          </div>
        </div>
      
        <div class="row">
            <div class="input-field col s6">
              <label for="password">Password</label>
              <input type="password" class="validate" name="password" id="password" required/>
            </div>
            <div class="input-field col s6">
              <label for="password">Confirm Password</label>
              <input type="password" class="validate" name="confirmpassword" id="confirmpassword" required/>
            </div>
        </div>
    
     <div class="modal-footer">
      <div class="center">
      <input type="submit" name="signup" class="green btn white-text" value="Signup">
    </div>
    </div>
    <br>  
    </div>
</div>
</form>

<div class="row">
  <div class="col s12 m6 l6">
<!-- div for cards -->
<!-- Cards -->
    <div class="row">
      <div class="col s12 l6 m6">
      <div class="card blue-grey darken-1 hoverable">
      <div class="card-content white-text">
      <span class="card-title center">Team Members</span>
      </div>
      <div class="card-action center">
      <a href="screen2.html">GO</a>
      </div>
      </div>
      </div>

      <div class="col s12 l6 m6">
      <div class="card blue-grey darken-1 hoverable">
      <div class="card-content white-text">
      <span class="card-title center">Event Details</span>
      </div>
      <div class="card-action center">
      <a href="#">GO</a>
      </div>
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col s12 l6 m6">
      <div class="card blue-grey darken-1 hoverable">
      <div class="card-content white-text">
      <span class="card-title center">Destination Details</span>
      </div>
      <div class="card-action center">
      <a href="#">GO</a>
      </div>
      </div>
      </div>    



      <div class="col s12 l6 m6">
      <div class="card blue-grey darken-1 hoverable">
      <div class="card-content white-text">
      <span class="card-title center">Social Media</span>
      </div>
      <div class="card-action center">
      <a href="#">GO</a>
      </div>
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col s12 l6 m6">
      <div class="card blue-grey darken-1 hoverable">
      <div class="card-content white-text">
      <span class="card-title center">Core Team</span>
      </div>
      <div class="card-action center">
      <a href="#">GO</a>
      </div>
      </div>
      </div>

      <div class="col s12 l6 m6">
      <div class="card blue-grey darken-1 hoverable ">
      <div class="card-content white-text">
      <span class="card-title center">F.R</span>
      </div>
      <div class="card-action center">
      <a href="#">GO</a>
      </div>
      </div>
      </div>    
    </div>
<!-- End of outer divs -->
</div>
<div>
<div class="col s12 m6 l6" >
      <div class="card blue-grey darken-1 hoverable">
      <div class="card-content  hoverable">
            <ul class="collection with-header">
        <li class="collection-header center"><h4>Recent Activities</h4></li>
        <li class="collection-item"><div>Competition<a href="#!" class="secondary-content"><i class="material-icons blue-text">flag</i></a></div></li>
        <li class="collection-item"><div>Competition<a href="#!" class="secondary-content"><i class="material-icons">flag</i></a></div></li>
        <li class="collection-item"><div>Competition<a href="#!" class="secondary-content"><i class="material-icons blue-text">flag</i></a></div></li>
        <li class="collection-item"><div>Competition<a href="#!" class="secondary-content"><i class="material-icons">flag</i></a></div></li>
        <li class="collection-item"><div>Competition<a href="#!" class="secondary-content"><i class="material-icons blue-text">flag</i></a></div></li>
        <li class="collection-item"><div>Competition<a href="#!" class="secondary-content"><i class="material-icons">flag</i></a></div></li>
        <li class="collection-item"><div>Competition<a href="#!" class="secondary-content" ><i class="material-icons blue-text">flag</i></a></div></li>
        <li class="collection-item"><div>Competition<a href="#!" class="secondary-content"><i class="material-icons">flag</i></a></div></li>

      </ul>
      </div>
      </div>
  
</div>
</div>
</div>




<!-- javascript functions -->
            <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

              <!-- JavaScript Functions -->
  <script type="text/javascript"> 
  $(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.modal').modal();
  });
  </script>

    </body>
  </html>