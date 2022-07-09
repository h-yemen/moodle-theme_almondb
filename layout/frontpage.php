<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package   theme_almondb
 * @copyright 2022 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$themeurl = theme_almondb_theme_url();
/*
* js requeris to page example to code --> $PAGE->requires->js('/theme/almondb/js/main.js').
*/
user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

if (isloggedin()) {
    $navdraweropen = false;
    $userlogin = true;
} else {
    $navdraweropen = false;
    $userlogin = false;
}
$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
];
$nav = $PAGE->flatnav;
$templatecontext['userlogin'] = $userlogin;
$templatecontext['flatnavigation'] = $nav;
$templatecontext['firstcollectionlabel'] = $nav->get_collectionlabel();
// Front page section.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpage_section());
$templatecontext = array_merge($templatecontext, theme_almondb_frontpagecolor());
// Slider.
$templatecontext = array_merge($templatecontext, theme_almondb_slideshow());
// Block 01.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock01());
// Block 02.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock02());
// Block 03.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock03());
// Block 04.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock04());
// Block 05.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock05());
// Block 06.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock06());
// Course.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock07());
// Teachers.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock08());
// Categories.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock09());
// TESTIMONIALS.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock10());
// Blog post.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock11());
// HTML block.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock18());
// Partners.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock19());
// Footer.
$templatecontext = array_merge($templatecontext, theme_almondb_frontpageblock20());

echo $OUTPUT->render_from_template('theme_almondb/frontpage/frontpage', $templatecontext);
