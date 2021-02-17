<?php

class Tarefa {
	private $id;
	private $id_status;
	private $tarefa;
	private $data_cadastro;

	public function __set($value, $newValue){
		$this->$value = $newValue;
		return $this;
	}

	public function __get($value){
		return $this->$value;
	}

}