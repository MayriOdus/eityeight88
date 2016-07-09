<?php

/**
 * Class Products
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Products extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
		$_URL = URL . $_SESSION["Lang"] . "/";

        $products = $this->model->getproducts();

        // load views
		$content = 'view/products/index.php';
        require APP . 'view/_templates/layout.php';
    }	

	public function product_detail($p, $id)
	{
		$_URL = URL . $_SESSION["Lang"] . "/";

        $product = $this->model->getproduct_detail($id);

        // load views
		$content = 'view/products/detail.php';
        require APP . 'view/_templates/layout.php';
	}

    public function ajax_addbasket()
    {
        $res = $this->model->add_basket($_POST);
        
        echo json_encode($res);
    }

}
