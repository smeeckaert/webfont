<?php

namespace Dev\Webfont;


/**
 * Class Model_Font_Symbol
 *
 * @property int                       fosy_id
 * @property string                    fosy_character
 * @property \Dev\Webfont\Model_Symbol symbol
 * @property \Dev\Webfont\Model_Font   font
 * @package Dev\Webfont
 */
class Model_Font_Symbol extends \Nos\Orm\Model
{
    protected static $_primary_key = array('fosy_id');
    protected static $_table_name = 'dev_font_symbol';

    protected static $_properties = array(
        'fosy_id',
        'fosy_character'
    );

    protected static $_title_property = 'fosy_character';

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