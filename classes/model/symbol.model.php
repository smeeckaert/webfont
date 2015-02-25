<?php

namespace Dev\Webfont;


class Model_Symbol extends \Nos\Orm\Model
{
    protected static $_primary_key = array('symb_id');
    protected static $_table_name = 'dev_symbol';

    protected static $_properties = array(
        'symb_id',
        'symb_name',
    );

    protected static $_title_property = 'symb_name';

    protected static $_observers = array();

    protected static $_behaviours = array();

    protected static $_belongs_to = array();
    protected static $_has_many = array(
        'font_symbol' => array(
            'key_from'       => 'symb_id',
            'model_to'       => '\Dev\Webfont\Model_Font_Symbol',
            'key_to'         => 'fosy_symb_id',
            'cascade_save'   => true,
            'cascade_delete' => false,
        ),
    );
    protected static $_many_many = array();

    public static function insertSymbolsInDB()
    {
    }
}