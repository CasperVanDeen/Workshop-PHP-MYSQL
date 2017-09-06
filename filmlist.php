<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Film List</title>
</head>

<body>
<?php
$catID= filter_input(INPUT_GET,'categoryid',FILTER_VALIDATE_INT) or die('Missing/illegal categoryid parameter'); ?>

<h1>Films in category <?=$catID?></h1>
<ul>
<?php 

require ('dbcon.php');

$sql = '		SELECT f.film_id, f.title
				FROM film f, film_category fc
				WHERE f.film_id=fc.film_id
				AND fc.category_id=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $catID);
	$stmt->execute();
	$stmt->bind_result($fID,$fTitle);
	while($stmt->fetch()){ ?>
		<li><a href="filmdetails.php?filmid=<?=$fID?>"><?=$fTitle ?></a> </li>
<?php
	}
?>
</ul>

</body>
</html>