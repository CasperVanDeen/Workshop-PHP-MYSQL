<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit film category</title>
</head>

<body>

<form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
<fieldset><h1>Edit Category</h1> <br><br>

<input name="categoryName" type="text" placeholder="category-name" required />
<button name="cmd" value="add-category">Create new category</button>
</fieldset>
</form>
<hr>
<form action="<? $_SERVER['PHP_SELF'] ?>" method="get">
<fieldset><br><br>

<input name="categoryName" type="text" placeholder="category-name" required />
<button name="cmd" value="delete-category">Delete category</button>
</fieldset>
</form>

</body>
</html>