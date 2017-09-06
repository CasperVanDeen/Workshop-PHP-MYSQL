<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actor details</title>
</head>

<body>
<?php $actorID= filter_input(INPUT_GET,'actorid',FILTER_VALIDATE_INT) 
or die('Missing/illegal categoryid parameter'); ?>
<h1>Actor details: </h1>
<?php
	require_once ('dbcon.php');
// selecting title for specific movie
$sql = '
SELECT actor_id, first_name, last_name
FROM actor
WHERE actor_id=?
';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $actorID);
	$stmt->execute();
	$stmt->bind_result($aID, $aFirst, $aLast);
	while($stmt->fetch()){
		echo '<h3>'.$aFirst.' ' .$aLast.'</h3><hr>';
		}
?>


<h2>Actor played in the movies below :</h2>
<?php 

require_once ('dbcon.php');
// selecting all actors from database for specific movie
$sql = '
SELECT film.film_id, film.title
FROM film, film_actor 
WHERE film.film_id=film_actor.film_id
AND film_actor.actor_id=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $actorID);
	$stmt->execute();
	$stmt->bind_result($aID, $aMovies);
	while($stmt->fetch()){ ?>
		
		<li><a href="filmdetails.php?filmid=<?=$aID?>">
		<?=$aMovies?></a></li>
	<?php	
        }
		
		?>

</body>
</html>