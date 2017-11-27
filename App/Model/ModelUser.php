<?php
	/**
	* 	Representes a Model.
	*	Year: 2017
	*/

	namespace App\Models;

	use App\DataBase\DB;

	class USER {
	
	private $conn;
	
	public function __construct() {
		$this->conn = DB::getPDO();
    }
	
	public function runQuery($sql) {
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($uname, $umail, $upass) {
		try {
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			if (DB::sql("INSERT INTO users(user_name,user_email,user_pass)  VALUES(:uname, :umail, :upass)", array(':uname' => $uname, ':umail' => $umail, ':upass' => $new_password)))
				return true;
			else
				return false;
		}
		catch(PDOException $e) {
			//echo $e->getMessage();
			return false;
		}				
	}
	
	public function doLogin($uname, $umail, $upass) {
		try {
			if (DB::sql("SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_name=:uname OR user_email=:umail", array(':uname'=>$uname, ':umail'=>$umail))) {
				if (password_verify($upass, $userRow['user_pass'])) {
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				} else {
					return false;
				}
			}
		}
		catch(PDOException $e) {
			//echo $e->getMessage();
			return false;
		}
	}
	
	public function is_loggedin() {
		if (isset($_SESSION['user_session']))
			return true;
		else
			return false;
	}
	
	public function redirect($url) {
		header("Location: $url");
	}
	
	public function doLogout() {
		unset($_SESSION['user_session']);
		session_destroy();
		return true;
	}
}
?>