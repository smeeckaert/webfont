<?php

namespace Dev\Webfont;


class Model_Font_Symbol extends \Nos\Orm\Model
{
    protected static $_primary_key = array('font_id');
    protected static $_table_name = 'dev_font';

    protected static $_properties = array(
        'fosy_id',
        'fosy_font_id',
        'fosy_symb_id',
        'fosy_character'
    );

    protected static $_title_property = 'font_name';

    protected static $_observers = array();

    protected static $_behaviours = array();

    protected static $_belongs_to = array(
        'font'   => array(
            'key_from'       => 'fosy_font_id',
            'model_to'       => '\Dev\Webfont\Model_Font',
            'key_to'         => 'font_id',
            'cascade_save'   => true,
            'cascade_delete' => false,
        ),
        'symbol' => array(
            'key_from'       => 'fosy_symb_id',
            'model_to'       => '\Dev\Webfont\Model_Symbol',
            'key_to'         => 'symb_id',
            'cascade_save'   => true,
            'cascade_delete' => false,
        ),

    );
    protected static $_has_many = array();
    protected static $_many_many = array();

}