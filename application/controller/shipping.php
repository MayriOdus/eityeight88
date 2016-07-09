<?php

/**
 * Class Shipping
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Shipping extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function payment()
    {
		$_URL = URL . $_SESSION["Lang"] . "/";

         $basket = $this->model->getcomparebasket();

        // load views
		$content = 'view/shipping/payment.php';
        require APP . 'view/_templates/layout.php';
    }	

    public function ajax_delbasket($p, $id)
    {
        $basket = $this->model->deletebasket($id);

        echo json_encode($basket);
    }

}
