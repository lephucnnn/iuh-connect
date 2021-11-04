<?php

class Database
{
	public $conn = null;
	private $server = 'localhost';
	private $dbName = 'iuh_connect';
	private $user = 'root';
	private $password = '';

	// private $user = "a7b930_socket";
    // private $password = "jj8DCT3e@";
    // private $server = "mysql5033.site4now.net";
    // private $dbName = "db_a7b930_socket";
        
        // Hàm kết nối CSDL
	public function __construct()
	{
		$this->conn = new mysqli($this->server, $this->user, $this->password, $this->dbName);

		if ($this->conn->connect_error) {
			printf($this->conn->connect_error);
			exit();
		}
		$this->conn->set_charset("utf8");
	}
        // Hàm đóng kết nối CSDL
    public function closeDatabase()
	{
		if ($this->conn) {
			$this->conn->close();
		}
	}
}