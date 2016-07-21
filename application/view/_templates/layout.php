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
	<meta name="viewport" content="width=device-width">

	<title><?=SITE_TITLE;?></title>

	<link href="<?=URL;?>img/logo.gif" rel="apple-touch-icon" />
	<link href="<?=URL;?>img/logo.gif" rel="apple-touch-icon" sizes="76x76" />
	<link href="<?=URL;?>img/logo.gif" rel="apple-touch-icon" sizes="120x120" />
	<link href="<?=URL;?>img/logo.gif" rel="apple-touch-icon" sizes="152x152" />
	<link href="<?=URL;?>img/logo.gif" rel="apple-touch-icon" sizes="180x180" />
	<link href="<?=URL;?>img/logo.gif" rel="icon" sizes="192x192" />
	<link href="<?=URL;?>img/logo.gif" rel="icon" sizes="128x128" />

	<?php require APP . 'view/_templates/style.php'; ?>

</head>
<body>

<div class="wrapper">
	
	<div class="container">
	
		<div class="main-panel">

		<?php require APP . 'view/_templates/header.php'; ?>

		<?php require APP . $content;  ?>

		<?php require APP . 'view/_templates/footer.php'; ?>

		</div>
	</div>

</div>

<div class="modal fade soci-line" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
		<div class="col-xs-12"><input type="image" src="<?=URL;?>img/line-code.jpg"></div>
	</div>
  </div>
</div>

<?php require APP . 'view/_templates/script.php'; ?>

</body>
</html>