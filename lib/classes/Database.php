<?php

	class Database {

		private $pdo, $error, $result, 
		private static $instance;

		private function __construct() {
			$this->pdo = new PDO(
				'mysql.host=localhost;dbname=rockfestival',
				'root',
				'',
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
			);
		}

		public function getInstance() {
			if (!isset(self::$instance)) {
				self::$instance = new Database();
			}
			return self::$instance;
		}

		public function query($sql, $params = array()) {
			$this-> _error = false;
			if($this->_query = $this->_pdo->prepare($sql)) {
				$x = 1;
				if(count($params)){
					foreach($params as $param){
						$this->_query->bindValue($x, $param);
						$x++;
					}
				}
				if($this->_query->execute()){
					$this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
					$this->_count = $this->_query->rowCount();
				}else{
					$this->_error = true;

				}
			}
			return $this;
		}

		public function result() {
			return $this->result();
		}

		public function first() {
			return $this->result[0];
		}
	}
