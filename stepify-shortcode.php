<?php
/*
Plugin Name: Stepify Tools
Description: Publishing tools for Stepofy
Plugin URI: http://nohatdigital.com
Author: Enrique Chavez
Author URI: https://enriquechavez.co
Version: 1.1
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
 */

/*

Copyright (C) Year  Author  Email

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Add Shortcode in the init
 **/
add_action('init', 'stepify_init');

function stepify_init()
{
    add_shortcode('stepify', 'stepify_embed_code');
}

function stepify_embed_code($atts)
{

    extract(
        shortcode_atts(
            array(
                'type' => 'file',
                'id'   => false,
            ), $atts
        )
    );

    if (!$atts['id']) {
        return 'Please add an vali ID the shortcode should be look like [stepify type="file" id="somefile.json"]';
    }

    $unique_id = 'impactful-tutorial-' . rand(1, 1000);

    $template = '<div id="%s"></div><script src="//client.stepify.co/embed/tutorize.js"></script><script>tutorizeInit("%s", "%s", "%s");</script>';

    return sprintf($template, $unique_id, $atts['type'], $atts['id'], $unique_id);

}
