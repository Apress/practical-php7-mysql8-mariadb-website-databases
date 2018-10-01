
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Birds Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="birds.css">
</head>
<body>
<div class="container" style="margin-top:30px;border: 3px black solid;">
<!-- Header Section -->
<header class="jumbotron text-center row" id="includeheader"
style="margin-bottom:2px; padding:20px;background-color:#CCFF99;"> 
  <?php include('includes/header.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<!-- Left-side Column Menu Section -->
  <nav class="col-sm-2">
      <ul class="nav nav-pills flex-column">
		<?php include('includes/nav.php'); ?> 
      </ul>
  </nav>
<!-- Center Column Content Section -->
<div class="col-sm-8 row" style="padding-left: 30px;">
<h2 style="padding-left: 50px; padding-top: 20px;">Help Save Our Devon Birds From Extinction</h2>
<div class="col-sm-8 text-left">
<p>The Devon bird reserves were established in an effort to combat the massive decline 
in the bird population. Farmers (the self proclaimed Guardians of the Countryside!) spray 
insecticides, weed killers and pesticides that kill the birds' main source of food. They 
also rip out the hedges that provide the birds with nesting sites and their means of 
travelling safely from field to field. Any birds that survive will probably be shot to 
satisfy a blood lust for living targets</p>
</div>
<div class="col-sm-4">
<h4 class="text-center"><strong>Become a member and support our cause</strong></h4>
<p class="text-left">The annual membership fee includes free or reduced entrance fees to the reserves, 
a free quarterly magazine, news updates and more.</p>
</div>
</div>
<!-- Right-side Column Content Section -->
	<aside class="col-sm-2" style="padding-top: 20px; padding-right: 0px;">
      <?php include('includes/info-col.php'); ?> 
	</aside>
  </div>
<!-- Footer Content Section -->
<footer class="jumbotron text-center row"
style="padding-bottom:1px; padding-top:8px;background-color:#CCFF99;">
  <?php include('includes/footer.php'); ?>
</footer>
</div>
</body>
</html>
