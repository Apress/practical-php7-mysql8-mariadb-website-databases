<div class="col-sm-2">
<img class="img-fluid float-left" src="logo.jpg" alt="Logo"> 
</div>
<div class="col-sm-8">
 <h1 class="blue-text mb-4 font-bold">Header Goes Here</h1>
 </div>
     <nav class="col-sm-2">
	 <div class="btn-group-vertical btn-group-sm" role="group" aria-label="Button Group">    
	  <div class="btn-group-vertical btn-group-sm" role="group" aria-label="Button Group">
 
	<?php
	 switch ($menu) {
	case 1: //header.php
	    ?>
		 <button type="button" class="btn btn-secondary" onclick="location.href = 'login.php'" >Login</button>
		 <button type="button" class="btn btn-secondary" onclick="location.href = 'safer-register-page.php'">Register</button>
		 
		<?php
        break;	 	 
    
    case 2: //heder_members_account.php
        ?>
		<button type="button" class="btn btn-secondary" onclick="location.href = 'logout.php'" >Logout</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'edit_your_account.php'">Your Account</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'safer-register-password.php'">New Password</button>
		<?php
        break;
    case 3: // header-thanks.php
        ?>
		 <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'" >Cancel</button>
		<?php
        break;
	case 4: // login-header.php
        ?>
		<button type="button" class="btn btn-secondary" onclick="location.href = 'login.php'" >Erase Entries</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'safer-register-page.php'">Register</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'">Cancel</button>
		<?php
        break;
	case 5: //; members-header.php
        ?> 
		<button type="button" class="btn btn-secondary" onclick="location.href = 'logout.php'" >Logout</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'change-password.php'" >New Password</button>
		<?php
        break;
	case 6: //password-header.php
        ?>
		<button type="button" class="btn btn-secondary" onclick="location.href = 'register-password.php'" >Erase Entries</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'">Cancel</button>
		<?php
        break;
	case 7: //password-header.php
        ?>
		<button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'" >Home Page</button>
		<?php
        break;
	case 8: //thankyou-header.php
        ?>
		<!-- <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'" >Home Page</button>-->
		<?php
        break;
	case 9: //register-header.php
        ?>
		<button type="button" class="btn btn-secondary" 
			onclick="location.href = 'register-page'" >Erase Your Entries</button>
		<button type="button" class="btn btn-secondary" 
			onclick="location.href = 'index.php'">Cancel</button>
		<?php
        break;
}
	?>
	</div>
    </nav>