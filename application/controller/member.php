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

		header("Location: " . URL);
	}

	public function ajax_getlogin()
	{
		$login = $this->model->getLogin($_POST);

		echo json_encode($login);
	}
}
