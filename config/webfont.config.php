<?php

$outputDirectory = PUBLIC_DIR;
return array(

    'output'      =>
        array(
            'font'       => $outputDirectory . '/fonts',
            'stylesheet' => $outputDirectory . '/css'
        ),
    'input'       => array(
        'symbols' => array(
            'folders'    => array(
                realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'symbols')
            ),
            'extensions' => array(
                'svg'
            )
        ),

    ),
    'font'        => array(
        'types' =>
            array(
                'svg',
                'woff',
                'ttf',
                'eot'
            )
    ),
    'stylesheets' => array(
        'output' => array(
            'css'  => array(
                'driver' => ''
            ),
            'scss' => array(
                'driver' => 'scss'
            )
        )
    )
);

