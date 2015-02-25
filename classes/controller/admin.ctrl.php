<?php


namespace Dev\Webfont;

use Dev\Webfonts\Vendors\SVGFont;

class Controller_Admin extends \Nos\Controller_Admin_Application
{
    public function action_home()
    {
        $class = new SVGFont();
        $config = \Config::load('webfont::webfont', true);
        d($config);
        return '';
    }

}
