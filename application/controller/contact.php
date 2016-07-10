<?php

/**
 * Class Contact
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Contact extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
		$_URL = URL . $_SESSION["Lang"] . "/";

        // load views
		$content = 'view/contact/index.php';
        require APP . 'view/_templates/layout.php';
    }	

    public function ajax_addmessage()
    {
        $contact = $this->model->addcontactmessage($_POST);   

        echo json_encode($contact);
    }
}
