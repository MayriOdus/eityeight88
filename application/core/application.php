<?php

class Application
{
    /** @var null The controller */
    private $url_controller = null;

    /** @var null The method (of the above controller), often also named "action" */
    private $url_action = null;

    /** @var array URL parameters */
    private $url_params = array();

    private $lang = "en";
	
    /**
     * "Start" the application:
     * Analyze the URL elements and calls the according controller/method or the fallback
     */
    public function __construct()
    {
        // create array with URL parts in $url
        $this->splitUrl();

		$_SESSION["Lang"] = $this->lang;

        if( !isset($_SESSION["authen_session"]) )
        {
            $_SESSION["authen_session"] = session_id() . date("ymdhis");
        }

		require 'lang/'.strtolower($this->lang).'/index.php';

        // check for controller: no controller given ? then load start-page
        if (!$this->url_controller) 
		{
			require APP . 'controller/main.php';
			$page = new Main();
			$page->index();
        } 
		elseif (file_exists(APP . 'controller/' . $this->url_controller . '.php')) 
		{

			require APP . 'controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();
			
            // check for method: does such a method exist in the controller ?
            if (method_exists($this->url_controller, $this->url_action)) 
			{

                if (!empty($this->url_params)) 
				{
                    // Call the method and pass arguments to it
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else 
				{
                    // If no parameters are given, just call the method without parameters, like $this->home->method();
                    $this->url_controller->{$this->url_action}();
                }

            } 
			else 
			{
                if (strlen($this->url_action) == 0) 
				{
                    // no action defined: call the default index() method of a selected controller
                    $this->url_controller->index();
                }
                else 
				{
                    header('location: ' . URL . 'error');
                }
            }
        } 
		else 
		{
            header('location: ' . URL . 'error');
        }
		
    }	

    /**
     * Get and split the URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) 
		{
            // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
			
			$this->lang = "en";
			if( strtolower($url[0]) == "en" || strtolower($url[0]) == "th" )
			{
				$this->lang = $url[0];
				$url[0] = isset($url[1]) ? $url[1] : null;
				$url[1] = isset($url[2]) ? $url[2] : null;
			}

            // Put URL parts into according properties
            // By the way, the syntax here is just a short form of if/else, called "Ternary Operators"
            // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->url_params = array_values($url);

            // for debugging. uncomment this if you have problems with the URL
            //echo 'Controller: ' . $this->url_controller . '<br>';
            //echo 'Action: ' . $this->url_action . '<br>';
            //echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';
        }
    }

}
