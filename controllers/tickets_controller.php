<?php
class TicketsController extends AppController {

	var $name = 'Tickets';

	function index() {
		if($this->RequestHandler->isAjax()){
			$response = $this->Ticket->find('all',array('order'=>'modified DESC','limit'=>3));
			echo json_encode($response);exit;
		}else{
			$this->Ticket->recursive = 0;
			$this->set('tickets', $this->paginate());			
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ticket', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ticket', $ticket =  $this->Ticket->read(null, $id));
		
		if($this->RequestHandler->isAjax()){
			echo json_encode($ticket);exit;
		}
	}

	function add() {
		if (!empty($this->data)) {
			$this->Ticket->create();
			if ($this->Ticket->save($this->data)) {
				if($this->RequestHandler->isAjax()){
					$response = array('status'=>'OK','message'=>'Data saved');
					$this->redirect(array('action' => 'view',$this->Ticket->id));
				}else{
					$this->Session->setFlash(__('The ticket has been saved', true));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The ticket could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ticket', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Ticket->save($this->data)) {
				$this->Session->setFlash(__('The ticket has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ticket could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ticket->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ticket', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ticket->delete($id)) {
			$this->Session->setFlash(__('Ticket deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ticket was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
