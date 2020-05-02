<!-- creating a search option that searches and  gets data from the table in the database -->
<form action ="search.php" method="GET">
    	<input type="text" name="search" size="100">
    	<input type="submit" name="submit"value="search">
<?php
 
$button = $_GET ['submit'];
$search = $_GET ['search']; 
 
if(!$button)
echo "you didn't submit a keyword";
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