
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<div class="col-sm-8">
 <h1 class="mb-4 font-bold float-left" style="color:white">
 <?php 
 if (!empty($_GET['name'])) {
  $name = filter_var( $_GET['name'], FILTER_SANITIZE_STRING);
  echo $name;
 }
 else { echo "Quick Quotes"; }
 ?>
 </h1>
 </div>
	<nav class="float-left navbar navbar-expand-xl navbar-trans navbar-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleMenu">
    <span class="navbar-toggler-icon"></span>
  </button>
	 <div class="btn-group btn-group-md collapse navbar-collapse navbar" id="collapsibleMenu"  role="group" aria-label="Button Group">
	 <?php
	 switch ($menu) {
	case 1: //index.php
	    ?>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''">Home Page</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Login</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'logout.php?name=Logout'">Logout</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Register</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'view_posts.php?name=Your Quotes'" >Your Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'post.php?name=Add A Quote'">Add A Quote</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_c.php?name=Comic Quotes'" >Comic Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_w.php?name=Wise Quotes'">Wise Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'search.php?name=Search Quotes'" >Search Quotes</button>
	<?php
        break;	 	 
    case 2: // safer-register-page.php
	    ?>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'index.php?name=Quick Quote'">Home Page</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Login</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''">Logout</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Register</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Your Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''">Add A Quote</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Comic Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''">Wise Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Search Quotes</button>
	<?php
        break;
	case 3: // login.php
	    ?>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'index.php?name=Quick Quote'">Home Page</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Login</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''">Logout</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'safer-register-page.php?name=Register'" >Register</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Your Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''">Add A Quote</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Comic Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''">Wise Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Search Quotes</button>
	<?php
		break;
	case 4: //forum.php
	    ?>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'index.php?name=Quick Quotes'">Home Page</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Login</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'logout.php?name=Logout'">Logout</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Register</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'view_posts.php?name=Your Quotes'" >Your Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'post.php?name=Add A Quote'">Add A Quote</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_c.php?name=Comic Quotes'" >Comic Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_w.php?name=Wise Quotes'">Wise Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'search.php?name=Search Quotes'" >Search Quotes</button>
	<?php
        break;	
	case 5: // login.php
	    ?>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''">Home Page</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'login.php?name=Login'" >Login</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''">Logout</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'safer-register-page.php?name=Register'" >Register</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Your Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''">Add A Quote</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Comic Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''">Wise Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Search Quotes</button>
	<?php
		break;
	case 6: //search.php
	    ?>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'index.php?name=Quick Quotes'">Home Page</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Login</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'logout.php?name=Logout'">Logout</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Register</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'view_posts.php?name=Your Quotes'" >Your Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'post.php?name=Add A Quote'">Add A Quote</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_c.php?name=Comic Quotes'" >Comic Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_w.php?name=Wise Quotes'">Wise Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Search Quotes</button>
	<?php
        break;
    case 7: //viewposts.php
	    ?>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'index.php?name=Quick Quotes'">Home Page</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Login</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'logout.php?name=Logout'">Logout</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Register</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Your Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'post.php?name=Add A Quote'">Add A Quote</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_c.php?name=Comic Quotes'" >Comic Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_w.php?name=Wise Quotes'">Wise Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'search.php?name=Search Quotes'" >Search Quotes</button>
	<?php
        break;
    case 8: //post.php
	    ?>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'index.php?name=Quick Quotes'">Home Page</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Login</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'logout.php?name=Logout'">Logout</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Register</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'view_posts.php?name=Your Quotes'" >Your Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''">Add A Quote</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_c.php?name=Comic Quotes'" >Comic Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_w.php?name=Wise Quotes'">Wise Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'search.php?name=Search Quotes'" >Search Quotes</button>
	<?php
        break;	
    case 9: //forum_c.php
	    ?>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'index.php?name=Quick Quotes'">Home Page</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Login</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'logout.php?name=Logout'">Logout</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Register</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'view_posts.php?name=Your Quotes'" >Your Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'post.php?name=Add A Quote'">Add A Quote</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''" >Comic Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_w.php?name=Wise Quotes'">Wise Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'search.php?name=Search Quotes'" >Search Quotes</button>
	<?php
        break;
    case 10: //forum_w.php
	    ?>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'index.php?name=Quick Quotes'">Home Page</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Login</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 110px;" onclick="location.href = 'logout.php?name=Logout'">Logout</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 110px;" onclick="location.href = ''" >Register</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'view_posts.php?name=Your Quotes'" >Your Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'post.php?name=Add A Quotes'">Add A Quote</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'forum_c.php?name=Comic Quotes'" >Comic Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary disabled" style="width: 120px;" onclick="location.href = ''">Wise Quotes</button>
	<button type="button" class="btn btn-secondary bg-primary" style="width: 120px;" onclick="location.href = 'search.php?name=Search Quotes'" >Search Quotes</button>
	<?php
        break;			
	}
	?>
</div>
    </nav>