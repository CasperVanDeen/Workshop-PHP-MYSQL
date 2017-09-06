<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Film details</title>
</head>

<body>
<?php
$filmID= filter_input(INPUT_GET,'filmid',FILTER_VALIDATE_INT) 
or die('Missing/illegal categoryid parameter'); ?>
<?php
	require_once ('dbcon.php');
// selecting title for specific movie
$sql = '
SELECT film_id, title
FROM film
WHERE film_id=?;
';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $filmID);
	$stmt->execute();
	$stmt->bind_result($titleID, $movieTitle);
	while($stmt->fetch()){
		echo '<h3>Movie: '.$movieTitle.'</h3><hr>';
		}
?>
<h4>Description</h4>
<?php
	require_once ('dbcon.php');
//selecting description for specific movie
$sql = '
SELECT film_id, description
FROM film
WHERE film_id=?;
';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $filmID);
	$stmt->execute();
	$stmt->bind_result($desID, $dscp);
	while($stmt->fetch()){
		echo $dscp;
		}
?>
<hr>
<h4>Movie category</h4>

<?php
	require_once ('dbcon.php');
// selecting category if category = to film id
$sql = '
SELECT category.category_id, category.name
FROM category, film_category
WHERE category.category_id=film_category.category_id 
and film_category.film_id=?;
';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $filmID);
	$stmt->execute();
	$stmt->bind_result($catID, $ctitle);
	while($stmt->fetch()){
		echo $ctitle;
		}
?>
<hr>

<h3>Actors</h3>

<?php 

require_once ('dbcon.php');
// selecting all actors from database for specific movie
$sql = '
SELECT actor.actor_id, actor.first_name, actor.last_name
FROM actor, film_actor
WHERE actor.actor_id=film_actor.actor_id 
and film_actor.film_id=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $filmID);
	$stmt->execute();
	$stmt->bind_result($aID, $aFirst, $aLast);
	while($stmt->fetch()){ ?>
		
		<li><a href="actordetails.php?actorid=<?=$aID?>">
		<?=$aFirst?> <?=$aLast?></a></li>
	<?php	
        }
		
		?>
	




</body>
</html>