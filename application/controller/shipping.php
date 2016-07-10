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
        $paymentId = $this->model->getpaymentid();

        $firstname = "";
        $lastname = "";
        $tel = "";
        $email = "";
        $address = "";

        if( isset($_SESSION["member_ns"]) && !empty($_SESSION["member_ns"]) )
        {
            $contact = $this->model->getmember_contact();

            $firstname = $contact["username"];
            $lastname = $contact["lastname"];
            $tel = $contact["tele"];
            $email = $contact["email"];
            $address = $contact["address"];
        }

        // load views
		$content = 'view/shipping/payment.php';
        require APP . 'view/_templates/layout.php';
    }	

    public function ajax_delbasket($p, $id)
    {
        $basket = $this->model->deletebasket($id);

        echo json_encode($basket);
    }

    public function add_payment()
    {
        $cid = $_SESSION["member_ns"];
        $sid = $_SESSION["member_id"];
        $type = $_SESSION["type_user"];
        $data = $_POST;
        $data["img_payment"] = "";

        if( !empty($sid) && !empty($cid) )
        {
            if( !empty($_FILES['files']['name'][0]) )
            {
                $n_title = '';//$_POST['name_clone'][0];
                $errors = array();
                foreach($_FILES['files']['tmp_name'] as $key => $tmp_name )
                {
                    //$file_name = $_FILES['input-mlogo']['name'][$key];
                    $file_name = "payment_" . $cid . $sid . $data["input-idpost"];

                    $file_size = $_FILES['files']['size'][$key];
                    $file_tmp = $_FILES['files']['tmp_name'][$key];
                    $file_type = $_FILES['files']['type'][$key];  
                    /* name title */
                    $n_title  = '';// $_POST['name_clone'][$key];
                }
        
                $desired_dir = "../public/images/upload/payment/";
                $data["img_payment"] = resize($file_name,$file_type,$file_tmp,$desired_dir,180);
            }
            
            $pay = $this->model->addpayment($data);
            
            echo json_encode($pay);
        } 
    }

}
