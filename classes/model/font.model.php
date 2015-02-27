<?php

namespace Dev\Webfont;

/**
 * Class Model_Font
 *
 * @property int                            font_id
 * @property string                         font_name
 * @property \Dev\Webfont\Model_Font_Symbol font_symbol
 * @package Dev\Webfont
 */
class Model_Font extends \Nos\Orm\Model
{
    protected static $_primary_key = array('font_id');
    protected static $_table_name = 'dev_font';

    protected static $_properties = array(
        'font_id',
        'font_name',
    );

    protected static $_title_property = 'font_name';

    protected static $_observers = array();

    protected static $_behaviours = array();

    protected static $_belongs_to = array();
    protected static $_has_many = array(
        'font_symbol' => array(
            'key_from'       => 'font_id',
            'model_to'       => '\Dev\Webfont\Model_Font_Symbol',
            'key_to'         => 'fosy_font_id',
            'cascade_save'   => true,
            'cascade_delete' => false,
        ),

    );
    protected static $_many_many = array();
}