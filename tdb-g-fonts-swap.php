<?php
/*
 * Plugin Name: TDB G Fonts Swap
 * Version: 1.0.4
 * Plugin URI: https://wordpress.org/plugins/tdb-g-fonts-swap/
 * Description: Increase page speed adding display=swap to Google Fonts
 * Author: TodoBravo
 * Author URI: https://www.todobravo.es/
 * License: GPL v3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: tdb-g-fonts-swap
 * Domain Path: /languages/
 *
 * Copyright 2024  TodoBravo
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
        die;
}

if ( ! function_exists( 'tdb_g_fonts_swap' ) ) :
        /*
         * add display=swap for google-font
         *
         */
        add_filter( 'style_loader_tag',  'tdb_g_fonts_swap', 50, 4 );
        function tdb_g_fonts_swap( $html, $handle, $href, $media ){   
                $search = 'fonts.googleapis.com/css?family';
                $replace = 'fonts.googleapis.com/css?display=swap&#038;family';
                if ( strpos($href, $search) !== false ):
                    if (strpos($html, 'display=swap') === false):
                                $html = str_replace($search, $replace, $html);
                    endif;
                endif;
                return $html;
        }
endif;

?>