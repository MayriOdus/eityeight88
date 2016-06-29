<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Generator" content="EditPlus">
	<meta name="Author" content="OM">
	<meta name="Keywords" content="">
	<meta name="Description" content="">

	<title><?=SITE_TITLE;?></title>

	<?php require APP . 'view/_templates/style.php'; ?>

</head>
<body>

<div class="container">
<div id="header">
    <a href="http://w7.co.th/">
        <img alt="" class="logo" src="http://w7.co.th/wp-content/themes/W7/images/logo.png">
    </a>
    <div class="hright">
        <ul class="hoption">
            <li>
                <a href="http://w7.co.th/wp-login.php" class="hsc">Login</a><a href="http://w7.co.th/wp-login.php?action=register">Register</a>
            </li>
            <li>
                <ul class="qtrans_language_chooser" id="qtranslate-chooser">
                    <li class="active"><a href="http://w7.co.th/products-page/accessories/cleansing-spa-pad/" class="qtrans_flag_en qtrans_flag_and_text" title="English"><span>English</span></a>
                    </li>
                    <li><a href="http://w7.co.th/th/products-page/accessories/cleansing-spa-pad/" class="qtrans_flag_th qtrans_flag_and_text" title="ภาษาไทย"><span>ภาษาไทย</span></a>
                    </li>
                </ul>
                <div class="qtrans_widget_end"></div>
            </li>
        </ul>
        <div class="hnavi">
            <ul class="menu">
                <li class="cat-item"><a href="#">Home</a>
                </li>
                <li class="cat-item cat-item-27"><a href="#" title="About Us">About Us</a>
                </li>
                <li class="cat-item cat-item-26"><a href="#" title="Products">Products</a>
                </li>
                <li><a href="#">Contact us</a>
                </li>
				<li class="cat-item cat-item-26"><a href="#" title="Products">Security Code Checking Ver.88 Bounce Up Pact</a>
                </li>
            </ul>


        </div>
    </div>
    <!--.hright-->
</div>
</div>

<?php 

require APP . $content; 

require APP . 'view/_templates/script.php'; 

?>

</body>
</html>