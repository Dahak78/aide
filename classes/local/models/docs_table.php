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

class docs_table {
	public function get_doc_table () {
		global $DB;

		$sql = "SELECT *
					FROM {local_aide_docs}
					WHERE id = 1";

		$doc = $DB->get_record_sql($sql);

		return $doc;
	}
}