<?php


namespace Dev\Webfont;

use Dev\Webfonts\Vendors\SVGFont;

class Controller_Admin extends \Nos\Controller_Admin_Application
{
    public function action_home()
    {
        $class   = new SVGFont();
        $config  = \Config::load('webfont::webfont', true);
        $symbols = Model_Symbol::find('all');
        $fonts   = Model_Font::find('all');
        return \View::forge('webfont::admin/home', array('config' => $config, 'symbols' => $symbols, 'fonts' => $fonts));
    }

    public function action_new()
    {
        return \Response::json(array('notify' => __('Font created'), 'replaceTab' => 'admin/webfont/home'));
    }

}
