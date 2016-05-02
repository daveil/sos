<?php
class Ticket extends AppModel {
	var $name = 'Ticket';
	function beforeSave(&$model){
		if(!$this->id){
			$this->data['Ticket']['id'] = $this->generateTicketId();
			$this->data['Ticket']['status'] ='pending';
		}
		return true;
	}
	protected function generateTicketId(){
		$id = date('ymd',time());
		$count = ($this->find('count')+1) % 9999;
		$pad_len = 6 - (count($id)+strlen($count));
		$id .=str_pad($count, $pad_len, '0', STR_PAD_LEFT);
		return $id;
	}
}
