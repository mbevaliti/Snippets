<!DOCTYPE html>
<html>
<head>
	<link href="images/Favicon.jpg" rel="icon">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="images/Favicon.jpg" rel="icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="http://use.fontawesome.com/releases/v5.0.6/css/all.css">
  
  <style>
    input[type=submit] {
  size: 30px;
  color:blue;
  size: 10px

  .button{
    border: 20%;
  }
</style>
<style>
	body{
	
	background-size: cover;
}
    p{
    	color: white;
    }
</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg py-3 navbar-dark"style="background-color:#04048c">
  <a class="navbar-brand" href="index.htm">
   <img src="images/logo.jpg" width="30" class="rounded-circle" height="30" class="d-inline-block align-top" alt="" >
    LEARNINGMAT
  </a>
  <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item" ><a href="signin.html" class="nav-link">Sign In</a></li>
        <li class="nav-item"><a href="registration_form.html" class="nav-link">Sign Up</a></li>
      </ul>
    </div>
  
</nav>
<center>
	

<!-- creating a search option that searches and  gets data from the table in the database -->
<form action ="search.php" method="GET">
    	<input type="text" name="search" size="100">
    	<input type="submit" name="submit"value="search">

<?php
 
$button = $_GET ['submit'];
$search = $_GET ['search']; 
 
if(!$button)
echo "<p>you didn't submit a keyword<p>";
else
{
if(strlen($search)<=1)
echo "Search term too short";
else{
echo "You searched for <b>$search</b> <hr size='1'></br>";

require 'connect.php';
$name = '';
$keyword = '';
 
$search_exploded = explode (" ", $search);
 
foreach($search_exploded as $search_each)
{

$name .="name LIKE '%$search_each%' OR keywords LIKE '%$search_each%'";

 
}
 
$construct ="SELECT * FROM docs WHERE $name";
$run = mysqli_query($conn,$construct);
 
$foundnum = mysqli_num_rows($run);
 
if ($foundnum==0)
echo "Sorry, there are no matching result for <b>$search</b>.";
else
{
echo "$foundnum results found !<p>";
 
while($runrows = mysqli_fetch_assoc($run))
{
$name = $runrows ['name'];
$keyword = $runrows ['keywords'];
$link = $runrows ['link'];
 
echo "
<a href='$link'><b>$name</b></a>
<a href='$link'><b>$keyword</b></a>


";
 
}
}
 
}
}
 
?>
</center>
</body>
</html>

 
}
