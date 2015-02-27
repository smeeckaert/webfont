<?php


namespace Dev\Webfont;

use Dev\Webfonts\Vendors\SVGFont;

class Controller_Admin extends \Nos\Controller_Admin_Application
{
    public function action_home()
    {
        $class   = new SVGFont();
        $config  = \Config::load('webfont::webfont', true);
        $symbols = Model_Symbol::query()
            ->order_by('symb_folder', "ASC")
            ->get();
        $fonts   = Model_Font::query()
            ->get();
        return \View::forge('webfont::admin/home', array('config' => $config, 'symbols' => $symbols, 'fonts' => $fonts));
    }

    public function action_new()
    {
        return \Response::json(array('notify' => __('Font created'), 'replaceTab' => 'admin/webfont/home'));
    }

    public function action_refresh()
    {
        $data = array('replaceTab' => 'admin/webfont/home');
        try {
            Model_Symbol::insertSymbolsInDB();
            $data['notify'] = __('Font updated');
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }
        return \Response::json($data);
    }
}
