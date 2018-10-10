<?php

/**
 * Class Error
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;
use Mini\Model\error;
class errorController
{

    private $error;
    function __construct(){
        $this->error = new error();
      }
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/error/error404.php';
        require APP . 'view/_templates/footer.php';
    }

    public function error500()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/error/error500.php';
        require APP . 'view/_templates/footer.php';
    }
}
