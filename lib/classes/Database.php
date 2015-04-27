<?php

	class Database {

		private $pdo, $error = false, $query, $count, $result;
		private static $instance;

		private function __construct() {
			$this->pdo = new PDO(
				'mysql:host=localhost;dbname=rockfestival',
				'root',
				'',
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
			);
		}

		public static function getInstance() {
			if (!isset(self::$instance)) {
				self::$instance = new Database();
			}
			return self::$instance;
		}

		public function query($sql, $params = array()) {
			$this-> _error = false;
			if($this->query = $this->pdo->prepare($sql)) {
				$x = 1;
				if(count($params)){
					foreach($params as $param){
						$this->query->bindValue($x, $param);
						$x++;
					}
				}
				if($this->query->execute()){
					$this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
					$this->count = $this->query->rowCount();
				}else{
					$this->error = true;
				}
			}
			return $this;
		}

		public function result() {
			return $this->result;
		}

		public function first() {
			return $this->result[0];
		}

		public function error() {
			return $this->error;
		}

		public function count() {
			return $this->count;
		}
	}
