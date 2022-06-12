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
 * @package   theme_almondb
 * @copyright 2021 Huseyin Yemen
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
/**
 * @return url
 */
function almondbpage() {
    global $OUTPUT;

    $theme = theme_config::load('almondb');

    $templatecontext['almondbpageenabled'] = $theme->settings->almondbpageenabled;
    if (empty($templatecontext['almondbpageenabled'])) {
        return $templatecontext;
    }
    $templatecontext['almondbpage'.$theme->settings->almondbpagedesing] = $theme->settings->almondbpagedesing;
    $templatecontext['almondbpageshowheight'] = $theme->settings->almondbpageshowheight;
    $almondbpagecount = $theme->settings->almondbpagecount;
    for ($i = 1, $j = 0; $i <= $almondbpagecount; $i++, $j++) {
        $almondbpageimage = "almondbpageimage{$i}";
        $almondbpagetitle = "almondbpagetitle{$i}";
        $almondbpagecap = "almondbpagecap{$i}";
        $almondbpagebutton = "almondbpagebutton{$i}";
        $almondbpageurl = "almondbpageurl{$i}";

        $templatecontext['almondbpage'][$j]['key'] = $j;
        $templatecontext['almondbpage'][$j]['active'] = false;
        $image = $theme->setting_file_url($almondbpageimage, $almondbpageimage);
        if (empty($image)) {
            $image = $OUTPUT->image_url('almondb/almondbpage/'.$i, 'theme');
        }
        $templatecontext['almondbpage'][$j]['image'] = $image;
        $templatecontext['almondbpage'][$j]['title'] = format_string($theme->settings->$almondbpagetitle);
        $templatecontext['almondbpage'][$j]['caption'] = format_string($theme->settings->$almondbpagecap);
        $templatecontext['almondbpage'][$j]['button'] = format_string($theme->settings->$almondbpagebutton);
        $templatecontext['almondbpage'][$j]['buttonurl'] = format_string($theme->settings->$almondbpageurl);
        if ($i === 1) {
            $templatecontext['almondbpage'][$j]['active'] = true;
        }
    }
    return $templatecontext;
}
