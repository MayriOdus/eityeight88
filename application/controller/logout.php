<?php

/**
 * Class LOGOUT
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Logout extends Controller
{

	public function index()
    {
		if( isset($_SESSION['EELOGINS']) )
		{			
			session_destroy();
		}

		header('location: ' . URL );
    }

}

