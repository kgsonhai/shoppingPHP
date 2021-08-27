<?php 
	class Database{
		private $hostname = 'localhost';
		private $username = 'root';
		private $pass = '';
		private $dbname = 'website_giay';
		private $conn = NULL;
		private $result = NULL;

		public function connect()
		{
			$this->conn = new mysqli($this->hostname, $this->username,$this->pass,$this->dbname);
			if (!$this->conn) {
				echo "kết nối thất bại";
				exit();				
			}else {
				mysqli_set_charset($this->conn,'utf8');
			}
			return $this->conn;
		}
		public function execute($sql)
		{
			$this->result = $this->conn->query($sql);
			return $this->result;
		}
		public function getData()
		{
			if ($this->result) {
				$data = mysqli_fetch_assoc($this->result);
			}
			else {
				$data = 0;
			}
			return $data;
		}
		public function getAllData()
		{
			if (!$this->result) {
				$data = 0;
			}
			else {
				while ($datas = $this->getData()) {
				    $data[] = $datas;
				}
			}
			return $data;
		}
	}
 ?>