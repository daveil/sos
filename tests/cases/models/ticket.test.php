<?php
/* Ticket Test cases generated on: 2016-05-02 05:35:05 : 1462160105*/
App::import('Model', 'Ticket');

class TicketTestCase extends CakeTestCase {
	var $fixtures = array('app.ticket');

	function startTest() {
		$this->Ticket =& ClassRegistry::init('Ticket');
	}

	function endTest() {
		unset($this->Ticket);
		ClassRegistry::flush();
	}

}
