<?php

class UserModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function signup($id_lop ,$username, $password, $hodem, $ten, $sdt, $email, $gioi_tinh, $ngay_sinh)
	{	
		$sql = "INSERT INTO tbl_users (id_lop ,username, password, hodem, ten, sdt, email, gioi_tinh, ngay_sinh)
							VALUES ('$id_lop', '$username', '$password', '$hodem', '$ten', '$sdt', '$email', '$gioi_tinh', '$ngay_sinh')";
		$this->db->conn->query($sql);
	}

	public function checkExists($username) {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $this->db->conn->query($sql);
		
		return $result;
	}
}

?>