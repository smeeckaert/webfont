<?php

namespace Dev\Webfont;

abstract class Driver_Stylesheet
{
    protected $fontFiles;
    private $filename;
    /**
     * @var array associative array 'character' => 'class'
     */
    protected $symbols;

    public function __construct()
    {
        $this->fonts    = array();
        $this->filename = null;
        $this->symbols  = array();
    }

    /**
     * @param       $fontName
     * @param array $files Types of files as an associative array 'type' => 'filepath' eg: ('woff'=>'font.woff')
     *
     * @return mixed
     */
    public function addFont($fontName, $files)
    {
        $this->filename  = $fontName;
        $this->fontFiles = $files;
    }

    public function addSymbol($class, $character)
    {
        $this->symbols[$character] = $class;
    }

    public function write()
    {
        $handle = fopen($this->filename, 'w+');
        $this->_write($handle);
        fclose($handle);
    }

    /**
     * @param ressource $handle a handle to write content
     *
     * @return mixed
     */
    abstract protected function _write($handle);
}