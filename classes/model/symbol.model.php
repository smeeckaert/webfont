<?php

namespace Dev\Webfont;

use Nos\Tools_File;


/**
 * Class Model_Symbol
 *
 * @property int                            symb_id
 * @property string                         symb_name
 * @property string                         symb_folder
 * @property string                         symb_ext
 * @property string                         symb_input
 * @property \Dev\Webfont\Model_Font_Symbol font_symbol
 * @package Dev\Webfont
 */
class Model_Symbol extends \Nos\Orm\Model
{
    protected static $_primary_key = array('symb_id');
    protected static $_table_name = 'dev_symbol';

    protected static $_properties = array(
        'symb_id',
        'symb_name',
        'symb_input',
        'symb_folder',
        'symb_ext'
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

    public function path()
    {
        return $this->symb_input . $this->symb_folder . $this->symb_name . '.' . $this->symb_ext;
    }

    public function display()
    {
        if ($this->symb_ext == 'svg') {
            return file_get_contents($this->path());
        }
        $content = null;
        \Event::trigger_function('webfont::symbol/display', array($content));
        return $content;
    }

    public static function insertSymbolsInDB()
    {
        $appConfig = \Config::load('webfont::webfont', true);
        if (!isset($appConfig['input']['symbols']) || !isset($appConfig['input']['symbols']['folders']) || !isset($appConfig['input']['symbols']['extensions'])) {
            throw new \Exception("Wrong input configuration");
        }
        $config = $appConfig['input']['symbols'];
        foreach ($config['folders'] as $folder) {

            static::insertFolderInDB(\Dev\Webfont\Tools_File::addSlash($folder), $config['extensions']);
        }
    }

    private static function insertFolderInDB($dir, $extensions)
    {
        $arrayFilters = array('[^\.]+'); // Directories
        foreach ($extensions as $ext) {
            $arrayFilters[] = ".*\.$ext$";
        }
        $list = \File::read_dir($dir, 0, $arrayFilters);
        foreach ($list as $folder => $folderList) {
            foreach ($folderList as $symbol) {
                $realPath  = \Dev\Webfont\Tools_File::addSlash($dir) . $symbol;
                $pathInfos = pathinfo($realPath);
                $symbName  = $pathInfos['filename'];
                $symbExt   = $pathInfos['extension'];
                if (empty($symbExt)) {
                    continue;
                }
                $symbol = Model_Symbol::query()->where(
                    array('symb_name' => $symbName),
                    array('symb_ext' => $symbExt),
                    array('symb_input' => $dir),
                    array('symb_folder' => $folder)
                )->get_one();
                if (empty($symbol)) {
                    $symbol              = Model_Symbol::forge();
                    $symbol->symb_name   = $symbName;
                    $symbol->symb_ext    = $symbExt;
                    $symbol->symb_input  = $dir;
                    $symbol->symb_folder = $folder;
                    $symbol->save();
                }
            }
        }
    }
}