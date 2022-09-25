<?php

class User {
    private $userTable = 'user';
    private $conn;

    public function __construct ($db) {
        $this->conn = $db;
    }

    public function login() {
        if($this->email && $this->password && $this->role) {			
			$sqlQuery = "
				SELECT * FROM ".$this->userTable." 
				WHERE email = ? AND password = ? AND role= ?";				
			$stmt = $this->conn->prepare($sqlQuery);
			$password = md5($this->password);			
			$stmt->bind_param("sss", $this->email, $password, $this->role);	
			$stmt->execute();
			$result = $stmt->get_result();			
			if($result->num_rows > 0) {
				$user = $result->fetch_assoc();
				$_SESSION["userId"] = $user['id'];
				$_SESSION["role"] = $this->role;
				$_SESSION["name"] = $user['first_name']." ".$user['last_name'];					
				return 1;		
			} else {
				return 0;		
			}			
		} else {
			return 0;
		}
    }

	public function register() {      
		if($this->email) {	
			$this->password = md5($this->password);	

			$queryInsert = "
				INSERT INTO ".$this->userTable."(first_name, last_name, phone, address, gender, email, password, role, created_at) 
				VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";				
			$stmt = $this->conn->prepare($queryInsert);
			$stmt->bind_param("sssssssss", $this->first_name, $this->last_name, $this->phone, $this->address, $this->gender, $this->email, $this->password, $this->role, $this->created_at);	
			$stmt->execute();
			return 1;
		} else {
			return 0;
		}
	}	

	public function loggedIn(){
		if(!empty($_SESSION["userId"]) && $_SESSION["userId"]) {
			return 1;
		} else {
			return 0;
		}
	}
}