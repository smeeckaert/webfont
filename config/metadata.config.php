<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2013 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link       http://www.novius-os.org
 */

return array(
    'name'      => __('Webfont Generator'),
    'version'   => '0.1-alpha',
    'provider'  => array(
        'name' => 'Smeeckaert Martin',
    ),
    'namespace' => 'Dev\Webfont',
    'icons'     => array(
        64 => 'static/apps/webfont/img/icons/64.png',
        32 => 'static/apps/webfont/img/icons/32.png',
        16 => 'static/apps/webfont/img/icons/16.png',
    ),
    'launchers' => array(
        'webfont' => array(
            'name'   => 'Webfonts',
            'action' => array(
                'action' => 'nosTabs',
                'tab'    => array(
                    'url' => 'admin/webfont/home',
                ),
            ),
        )

    ),
    'enhancers' => array()
);