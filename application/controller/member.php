<?php

/**
 * Class Member
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Member extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
	public function profile()
	{
		$_URL = URL . $_SESSION["Lang"] . "/";

		$cid = $_SESSION["member_ns"];
		$sid = $_SESSION["member_id"];
		$type =  $_SESSION["type_user"];
	
		if( $type == 'admin' )
		{
			header("Location: " . URL . "adminp/backoffice-adm.php");
		}

		$user = $this->model->getUserContact($sid);	
		$buyer = $this->model->getBuyer($cid);	

		$logos = URL . "img/unknow.gif";
		if( !empty($user["logos"]) )
		{
			$logos = URL . "upload/" . $user["logos"];
		}

        // load views
		$content = 'view/member/profile.php';
        require APP . 'view/_templates/layout.php';
	}

	public function paymentbill($p, $payid)
	{
		$_URL = URL . $_SESSION["Lang"] . "/";

		$bill = $this->model->getpaymentbill($payid);	

		$content = 'view/member/payment.php';
        require APP . 'view/_templates/layout_payment.php';
	}

	public function profile_edit()
	{
		$_URL = URL . $_SESSION["Lang"] . "/";

		$cid = $_SESSION["member_ns"];
		$sid = $_SESSION["member_id"];
		$type =  $_SESSION["type_user"];
			
		$user = $this->model->getUserContact($sid);	
		//$buyer = $this->model->getBuyer($cid);	

		$logos = URL . "img/unknow.gif";
		if( !empty($user["logos"]) )
		{
			$logos = URL . "upload/" . $user["logos"];
		}

        // load views
		$content = 'view/member/profile-edit.php';
        require APP . 'view/_templates/layout.php';
	}

    public function login()
    {
		$_URL = URL . $_SESSION["Lang"] . "/";

        // load views
		$content = 'view/member/login.php';
        require APP . 'view/_templates/layout.php';
    }	

	public function register()
	{
		$_URL = URL . $_SESSION["Lang"] . "/";

        // load views
		$content = 'view/member/register.php';
        require APP . 'view/_templates/layout.php';
	}

	public function forgot()
	{
		$_URL = URL . $_SESSION["Lang"] . "/";

        // load views
		$content = 'view/member/forgot.php';
        require APP . 'view/_templates/layout.php';
	}

	public function logout()
	{
		unset($_SESSION["member_id"]);
		unset($_SESSION["member_ns"]);
		unset($_SESSION["member_name"]);
		unset($_SESSION["type_user"]);
		unset($_SESSION["authen_session"]);

		header("Location: " . URL);
	}

	public function ajax_getlogin()
	{
		$login = $this->model->getLogin($_POST);

		echo json_encode($login);
	}

	public function ajax_getregis()
	{
		$regis = $this->model->getRegis($_POST);

		echo json_encode($regis);
	}

	public function get_editprofile()
	{
		$cid = $_SESSION["member_ns"];
		$sid = $_SESSION["member_id"];
		$type = $_SESSION["type_user"];
		$hid = $_POST['input-id'];
		$nameimages1 = '';
		$data = array(
			"tele" => "",
			"address" => "",
			"logos" => ""
		);
		$data["iid"] = $hid;

		if( !empty($sid) && !empty($cid) )
		{
			if( isset($_POST['input-TelePhone']) && !empty($_POST['input-TelePhone']) )
			{
				$tele = $_POST['input-TelePhone'];
				$data["tele"] = $tele;
			}

			if( isset($_POST['input-add']) && !empty($_POST['input-add']) )
			{
				$addr = $_POST['input-add'];
				$data["address"] = $addr;
			}

			if( isset($_POST['hidimg']) && !empty($_POST['hidimg']) )
			{
				$nameimages1 = $_POST['hidimg'];
				$data["logos"] = $nameimages1;
			}
			
			if( !empty($_FILES['input-mlogo']['name'][0]) )
			{
				$n_title = '';//$_POST['name_clone'][0];
				$errors = array();
				foreach($_FILES['input-mlogo']['tmp_name'] as $key => $tmp_name )
				{
					//$file_name = $_FILES['input-mlogo']['name'][$key];
					$file_name = "user_" . $cid . $sid;

					$file_size = $_FILES['input-mlogo']['size'][$key];
					$file_tmp = $_FILES['input-mlogo']['tmp_name'][$key];
					$file_type = $_FILES['input-mlogo']['type'][$key];	
					/* name title */
					$n_title  = '';// $_POST['name_clone'][$key];
				}
		
				$desired_dir = "../public/upload/";
		 
				$nameimages1 = resize($file_name,$file_type,$file_tmp,$desired_dir,180);
				$data["logos"] = $nameimages1;
			}
			
			$update = $this->model->updateProfile($data);
			
			echo json_encode($update);
		}	

	}
}
