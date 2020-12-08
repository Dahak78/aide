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
 * @package   local_aide
 * @copyright 2020, Sebastien CHECCHI
 * @author    Sebastien CHECCHI
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once($CFG->libdir . '/externallib.php');

class local_aide_external extends external_api {
	public static function get_doc_parameters() {
        return new external_function_parameters(
            [
                // NO PARAMETER NEEDED
            ]
        );
    }
    
    public static function get_doc_returns() {
        return new external_single_structure([
                'id'                => new external_value(PARAM_NOTAGS, 'id'),
                'contenu'           => new external_value(PARAM_NOTAGS, 'city')
        ]);
    }
    
    public static function get_doc() {
		$obj = new local_aide\local\models\docs_table();
		
		$doc = [];
		$doc = $obj->get_doc_table();

        return $doc;
    }
}