<?php
/**
 * Plugin Name: Placehold.it Widget
 * Plugin URI: http://digitalsimple.info/wordpress/plugins/placeholdit/
 * Description: Creates customizable widgets using the <a href="http://placehold.it">placehold.it</a> service created by <a href="http://brentspore.com">Brent Spore</a>.
 * Version: 0.3
 * Author: Sherman Bausch
 * Author URI: http://digitalsimple.info
 *
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * I also don't know if this is cool with the placehold.it guys.
 */

include_once("class-placeholdit-widget.php");
include_once("class-place.php");

$placeholdit = new ds_place();
?>