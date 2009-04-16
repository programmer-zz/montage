<?php

class AppController extends Controller {
    var $name = 'App';


	function index() {
        $this->set("msg","Hello CakePHP");
	}

    function view() {
    }


}

?>

