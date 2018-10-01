 <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<div class="col-sm-2" >
<img class="img-fluid" style="padding-top: 5px; height=200" src="images/dove-1.png" alt="dove"> 
</div>
<div class="col-sm-6" style="color :white; padding-top: 5%;">
 <div class="h1 mb-2 font-bold text-left" >The Dove Gallery</div>
 <p class='lead text-center'>Affordable Original Paintings</p>
</div>

<div class="col-sm-4" style="padding-top: 10px; padding-bottom: 10px;">
     <nav class="float-right navbar navbar-expand-md navbar-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleMenu">
    <span class="navbar-toggler-icon"></span>
  </button>
	 <div class="btn-group-vertical btn-group-sm collapse navbar-collapse" id="collapsibleMenu"  role="group" aria-label="Button Group">
	 <ul class="navbar-nav flex-column" style="width: 140px;">
     
	<?php
	 switch ($menu) {
	case 1: //admin_page.php
	    ?>
		 <li class="nav-item">
         <a class="btn btn-primary" id="buttons" href="admin_page.php" role="button">Add Another</a>
		 </li>
		 <li class="nav-item">
	     <a class="btn btn-primary" id="buttons" href="admin_add_artist.php" role="button">Add Artist</a>
		 </li>
		 <li class="nav-item">
	     <a class="btn btn-primary" id="buttons" href="#" role="button">New Password</a>
		 </li>
		 <li class="nav-item">
	     <a class="btn btn-primary" id="buttons" href="Logout.php" role="button">Logout</a>
		 </li>
		<?php
        break;	 	 
    case 2: // added.php, cart.php, found_pics_cart.php
	    ?>
		<li class="nav-item">
        <a class="btn btn-primary" id="buttons" href="index.php" role="button">Home Page</a>
		</li>
		<form name="_xclick" target="paypal"
		action="https://www.paypal.com/uk/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="business" value="me@mybusiness.co.uk">
		<input type="image" src="https://www.paypal.com/en_GB/i/btn/view_cart.gif" border="0" name="submit" 
		alt="Make payments with PayPal - it's fast, free and secure!">
		<input type="hidden" name="display" value="1">
		</form>
		<?php
        break;
    case 3: //admin_page.php
        ?>
		<li class="nav-item">
        <a class="btn btn-primary" id="buttons" href="admin_add_artist.php" role="button">Add Another</a>
		</li>
		<li class="nav-item">
	    <a class="btn btn-primary" id="buttons" href="admin_page.php" role="button">Add Painting</a>
		</li>
		<li class="nav-item">
	    <a class="btn btn-primary" id="buttons" href="#" role="button">New Password</a>
		</li>
		<li class="nav-item">
	    <a class="btn btn-primary" id="buttons" href="Logout.php" role="button">Logout</a>
		</li>
		<?php
        break;
    case 4: // index.php  case 5 - forgot.php
        ?>
		<li class="nav-item">
        <a class="btn btn-primary" id="buttons" href="register.php" role="button">Register</a>
		</li>
		<li class="nav-item">
	    <a class="btn btn-primary" id="buttons" href="Login.php" role="button">Login</a>
		</li>
		<?php
        break;
	case 7: // login.php user_search_page.php
        ?>
		<li class="nav-item">
        <a class="btn btn-primary" id="buttons" href="index.php" role="button">Home</a>
		</li>
		For our newletter
		<?php
        break;
	case 8: //; register.php
        ?> 
		<li class="nav-item">
        <a class="btn btn-primary" id="buttons" href="register.php" role="button">Erase</a>
		</li>
		<?php
        break;
	case 9: //register_thanks.php
        ?>
		<li class="nav-item">
        <a class="btn btn-primary" id="buttons" href="Login.php" role="button">Login</a>
        </li>	
		<?php
        break;
	case 10: //checkout.php
        ?>
		<li class="nav-item">
        <a class="btn btn-primary" id="buttons" href="logout.php" role="button">Logout</a>
        </li>	
		<?php
        break;
}
	?>
	</ul>
	 </div>
    </nav>
	</div>