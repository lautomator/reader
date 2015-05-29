<?php

// load Smarty library
require('/Applications/XAMPP/xamppfiles/lib/smarty-3.1.13/Smarty.class.php');

// The setup.php file is a good place to load
// required application library files, and you
// can do that right here. An example:
// require('guestbook/guestbook.lib.php');

class Reader extends Smarty {

   function __construct() {

        parent::__construct();

        $this->setTemplateDir('/Applications/XAMPP/htdocs/reader/templates/');
        $this->setCompileDir('/Applications/XAMPP/htdocs/reader/templates_c/');
        $this->setConfigDir('/Applications/XAMPP/htdocs/reader/configs/');
        $this->setCacheDir('/Applications/XAMPP/htdocs/reader/cache/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'Reader');
   }

}

?>
