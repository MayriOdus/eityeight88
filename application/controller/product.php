<?php

/**
 * Class Product
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Product extends Controller
{

	public function index()
    {
		$scripts = 'prod';
		
		$manu_mode = ( isset($_GET["p"]) )?$_GET["p"]:0;
		
		$mode = "view";
		$product = $this->model->getProductList();
		
        // load views
        require APP . 'view/_templates/admin/header.php';
        require APP . 'view/product/index.php';
        require APP . 'view/_templates/admin/footer.php';
    }


	public function add()
    {
		$scripts = 'prod';
		
		$p = ( isset($_GET["p"]) )?$_GET["p"]:'';

		$product = array();
		$mode = 'add';
		$title = 'New Product';
		
        // load views
        require APP . 'view/_templates/admin/header.php';
        require APP . 'view/product/ae.php';
        require APP . 'view/_templates/admin/footer.php';
    }

	public function edit()
    {
		$scripts = 'prod';
		
		$p = ( isset($_GET["p"]) )?$_GET["p"]:'';

		$product = $this->model->getProductDetail($p);
		$cont = $this->model->contSerial($product["id"]);
		$mode = 'edit';
		$title = 'Edit Product';
		
        // load views
        require APP . 'view/_templates/admin/header.php';
        require APP . 'view/product/ae.php';
        require APP . 'view/_templates/admin/footer.php';
    }

	public function gencode()
    {
		$scripts = 'prod';
		
		$product = array();
		$p = ( isset($_GET["p"]) )?$_GET["p"]:'';
		$m = $_GET["m"];

		if( $p != '' )
		{
			$product = $this->model->getProductGenCode($p);
			
			if( $m == "view" )
			{
				$serial = $this->model->checkSerialCode($p);
			}
	
			if( $m == "gen" )
			{
				$this->model->generateProductCode($p, $product["stocks"]);
			}
		}

		$mode = 'gencode';
		$title = 'Gencode Product';
		
        // load views
        require APP . 'view/_templates/admin/header.php';
        require APP . 'view/product/gencode.php';
        require APP . 'view/_templates/admin/footer.php';
    }

	public function newproduct()
	{
		$res = array();
		$_POST["imageid"] = 'prod'.date('ymdhis');
		$_POST["fcontent"] = array();
		if( isset($_FILES['fileInput']) && is_uploaded_file($_FILES['fileInput']['tmp_name'][0]) && empty($_POST["txtfiles"]) )
		{
			$img = new Imgs;
			$_POST["fcontent"] = $img->processupload();
			
			if( $_POST["fcontent"][0] == 'invalid' )
			{
				$res["SUCCESS"] = false;
				$res["MESSAGE"] = 'invalid file size.';
			}
		}
		else if( !empty($_POST["txtfiles"]) && $_POST["txtfiles"] != null && isset($_FILES['fileInput']) && !is_uploaded_file($_FILES['fileInput']['tmp_name'][0]) )
		{
			$_POST["fcontent"] = explode(",", $_POST["txtfiles"]);
		}
		else if( !empty($_POST["txtfiles"]) && $_POST["txtfiles"] != null && isset($_FILES['fileInput']) && is_uploaded_file($_FILES['fileInput']['tmp_name'][0]) )
		{	
			$file = explode(",", $_POST["txtfiles"]);
			foreach( $file as $i => $f )
			{
				if( file_exists('../../images/upload/' . $f) )
				{
					unlink('../../images/upload/' . $f);
				}
			}
			$img = new Imgs;
			$_POST["fcontent"] = $img->processupload();
		}

		$res = $this->model->newProduct($_POST);
		
		echo json_encode($res);
	}

	public function updateproduct()
	{
		$res = array();
		$_POST["imageid"] = 'prod'.date('ymdhis');
		$_POST["fcontent"] = array();
		if( isset($_FILES['fileInput']) && is_uploaded_file($_FILES['fileInput']['tmp_name'][0]) && empty($_POST["txtfiles"]) )
		{
			$img = new Imgs;
			$_POST["fcontent"] = $img->processupload();
			
			if( $_POST["fcontent"][0] == 'invalid' )
			{
				$res["SUCCESS"] = false;
				$res["MESSAGE"] = 'invalid file size.';
			}
		}
		else if( !empty($_POST["txtfiles"]) && $_POST["txtfiles"] != null && isset($_FILES['fileInput']) && !is_uploaded_file($_FILES['fileInput']['tmp_name'][0]) )
		{
			$_POST["fcontent"] = explode(",", $_POST["txtfiles"]);
		}
		else if( !empty($_POST["txtfiles"]) && $_POST["txtfiles"] != null && isset($_FILES['fileInput']) && is_uploaded_file($_FILES['fileInput']['tmp_name'][0]) )
		{	
			$file = explode(",", $_POST["txtfiles"]);
			foreach( $file as $i => $f )
			{
				if( file_exists('../../images/upload/' . $f) )
				{
					unlink('../../images/upload/' . $f);
				}
			}
			$img = new Imgs;
			$_POST["fcontent"] = $img->processupload();
		}

		$res = $this->model->updateProduct($_POST);
		
		echo json_encode($res);
	}

	public function deleteproduct()
	{
		$res = $this->model->deleteProduct($_POST);
		
		echo json_encode($res);
	}

	public function clrgen()
	{
		$res = $this->model->deleteGenProduct($_POST);
		
		echo json_encode($res);
	}

}