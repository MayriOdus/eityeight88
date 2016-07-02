<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Generator" content="EditPlus">
	<meta name="Author" content="OM">
	<meta name="Keywords" content="eityeight88">
	<meta name="Description" content="">

	<title><?=SITE_TITLE;?></title>

	<?php require APP . 'view/_templates/style.php'; ?>

</head>
<body>

<div class="container">
	
	<?php require APP . 'view/_templates/header.php'; ?>

	<?php require APP . $content;  ?>

	<?php require APP . 'view/_templates/footer.php'; ?>

</div>

<?php require APP . 'view/_templates/script.php'; ?>

</body>
</html>