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
 
// require_capability('local/aide:afficheraide', context_system::instance());

function local_aide_before_footer() {
	global $DB, $PAGE;

	// $document1 = new stdClass();
	// $document1->id = 1;
	// $document1->contenu = "Contenu";
	// $DB->insert_record("local_aide_docs", $document1);
	
	// $PAGE->requires->js_call_amd('local_aide/debut', 'init');

	// $PAGE->requires->js_init_code("document.getElementById('bulleaide').addEventListener('click', function(){ alert('Hello World!'); });");

	$PAGE->requires->js_init_code("
		require(['core/ajax'], function(ajax) {
			ajax.call([{
				methodname: 'local_aide_get_doc',
				args: {},
				done: function(){ alert('OK!')},
				fail: function(e){ console.log(e)}
			}]);
		});
	");
}

function local_aide_before_standard_top_of_body_html() {
	$htmlbulleaide = "";

	if (has_capability('local/aide:afficheraide', context_system::instance())) {
		$htmlbulleaide =
			"<div id='bulleaide' class='row'>
				<div class='col text-center px-0'>
					<p>
						<button id='bullebouton' class='collapsed' type='button' data-toggle='collapse' data-target='#bullemenuprincipal' aria-expanded='false' aria-controls='bullemenuprincipal'>
							Aide
						</button>
					</p>

					<div class='collapse' id='bullemenuprincipal'>
						<div class='card card-body'>
							<p>
								<button class='btn text-white collapsed' type='button' data-toggle='collapse' data-target='#bullemenu1' aria-expanded='false' aria-controls='bullemenu1'>
									Premiers pas

									<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='16' height='16'><path d='M4.427 7.427l3.396 3.396a.25.25 0 00.354 0l3.396-3.396A.25.25 0 0011.396 7H4.604a.25.25 0 00-.177.427z'></path></svg>
								</button>
							</p>

							<div class='collapse' id='bullemenu1'>
								<p>
									Document 1
								</p>

								<p>
									Document 2
								</p>
							</div>

							<p>
								<button class='btn text-white collapsed' type='button' data-toggle='collapse' data-target='#bullemenu2' aria-expanded='false' aria-controls='bullemenu2'>
									Cours
									
									<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='16' height='16'><path d='M4.427 7.427l3.396 3.396a.25.25 0 00.354 0l3.396-3.396A.25.25 0 0011.396 7H4.604a.25.25 0 00-.177.427z'></path></svg>
								</button>
							</p>

							<div class='collapse' id='bullemenu2'>
								<p>
									Document 1
								</p>

								<p>
									Document 2
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>";
	}
	
	return $htmlbulleaide;
}