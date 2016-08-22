<?php

/**
 * Class LOGIN
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Login extends Controller
{

	public function index()
    {
		$scripts = 'login';
		
        // load views
        require APP . 'view/_templates/admin/header.php';
        require APP . 'view/login/index.php';
        require APP . 'view/_templates/admin/footer_login.php';
    }

	public function getLogin()
	{
		$res = array(
			"SUCCESS" => false	
		);

		$Login = $this->model->chkLogin($_POST);

		if( isset($Login["count"]) && $Login["count"] == 1 )
		{
			$Login["SUCCESS"] = 1;
			echo  json_encode($Login);
		}
		else
		{
			echo json_encode($res);
		}
	}

}