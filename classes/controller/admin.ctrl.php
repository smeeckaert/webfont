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
        $response = array('replaceTab' => 'admin/webfont/home');
        $name     = trim(\Input::post('name'));
        try {
            if (empty($name)) {
                throw new \Exception("Name is empty");
            }
            $font = Model_Font::query()->where('font_name', $name)->get_one();
            if ($font) {
                throw new \Exception("Font already exist");
            }
            $font            = Model_Font::forge();
            $font->font_name = $name;
            $font->save();
            $response['notify'] = __('Font created');
        } catch (\Exception $e) {
            $response['error'] = $e->getMessage();
        }
        return \Response::json($response);
        //return \Response::json(array('notify' => __('Font created'), 'replaceTab' => 'admin/webfont/home'));
    }

    public function action_select()
    {
        $data = array();
        try {
            $symbol = \Input::post('id');
            $status = \Input::post('status');
            $font   = \Input::post('font');
            if (empty($symbol) || empty($font)) {
                throw new \Exception("Wrong parameters");
            }
            $symbol = Model_Symbol::find($symbol);
            if (empty($symbol)) {
                throw new \Exception("Can't find symbol");
            }
            $font = Model_Font::find($font);
            if (empty($font)) {
                throw new \Exception("Can't find font");
            }
            $fontSymb = Model_Font_Symbol::query()->where(array('fosy_font_id' => $font->font_id, 'fosy_symb_id' => $symbol->symb_id))->get_one();
            if ($status == "false") {
                if (!empty($fontSymb)) {
                    $fontSymb->delete();
                }
                $data['notify'] = __('Symbol removed');

            } else {
                if (empty($fontSymb)) {
                    $fontSymb                 = Model_Font_Symbol::forge();
                    $fontSymb->fosy_character = '0';
                    $fontSymb->symbol         = $symbol;
                    $fontSymb->font           = $font;
                    $fontSymb->save();
                }
                $data['notify'] = __('Symbol added');

            }
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }
        return \Response::json($data);
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
