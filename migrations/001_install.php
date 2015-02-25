<?php
namespace Dev\Webfont\Migrations;

use Dev\Webfont\Model_Symbol;

class Install extends \Nos\Migration
{


    public function up()
    {
        parent::up();
        Model_Symbol::insertSymbolsInDB();
    }
}