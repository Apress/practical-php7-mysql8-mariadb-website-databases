<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
{ header("Location: login.php");
  exit();
}
?>
<!doctype html>
<html lang="en">
<head>
<title>Members page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="styles.css">
<!--CSS for only the members page-->
<style type="text/css">
#mid-right-col { text-align:center; margin:auto;
}
#midcol h3 { font-size:130%; margin-top:0; margin-bottom:0;
}
footer {
	clear:both:
}
</style>
</head>
<body>
<div id="container">
<header>
<?php include("header-members.php"); ?>
</header>
<nav>
<?php include("nav.php"); ?>
</nav>
<aside>
<?php include("info-col.php"); ?>
</aside>
<div id="content"><!-- Start of the member's page content. -->
<?php
echo '<h2>Welcome to the Members Page!</h2>';
?>
<div id="midcol">
<div id="mid-left-col">
<h3>Member's Events</h3>
<p>The members page content. The members page content. The members page content. 
<br>The members page content. The members page content. The members page content.
<br>The members page content. The members page content. The members page content.
<br>The members page content. The members page content. The members page content.
</p>
</div>
<div id="mid-right-col">
<h3>Special offers to members only.</h3>
    <p><strong>T-Shirts &pound;10.00</strong></p>
<img alt="Polo shirt" title="Polo shirt" height="207" width="280" src="images/polo.png"><br>
<br>
</div>
</div></div><!-- End of the members page content. -->
</div><p></p><p></p>><br>
<footer>
<?php include("footer.php"); ?>
</footer>
</body>
</html>

