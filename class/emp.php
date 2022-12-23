<?php
class emp{   
    
    private $employeeTable = "emp";      
    public $email;
    public $phone;
    public $password;
    public $confirm_password;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	function read(){	
		if($this->id) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->employeeTable." WHERE id = ?");
			$stmt->bind_param("i", $this->id);					
		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->employeeTable);		
		}		
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}
	
	function create(){
		
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->employeeTable."(`email`, `phone`, `password`, `confirm_password`)
			VALUES(?,?,?,?)");
		
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->phone = htmlspecialchars(strip_tags($this->phone));
		$this->password = htmlspecialchars(strip_tags($this->password));
		$this->confirm_password = htmlspecialchars(strip_tags($this->confirm_password));
		
		
		$stmt->bind_param("ssiis", $this->email, $this->phone, $this->password, $this->confirm_password);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
		
	function update(){
	 
		$stmt = $this->conn->prepare("
			UPDATE ".$this->employeeTable." 
			SET email= ?, phone = ?, password = ?, confirm_password = ?
			WHERE id = ?");
	 
		$this->id = htmlspecialchars(strip_tags($this->id));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->phone = htmlspecialchars(strip_tags($this->phone));
		$this->password = htmlspecialchars(strip_tags($this->password));
		$this->confirm_password = htmlspecialchars(strip_tags($this->confirm_password));
	 
		$stmt->bind_param("ssiisi", $this->email, $this->phone, $this->password, $this->confirm_password, $this->id);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	function delete(){
		
		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->employeeTable." 
			WHERE id = ?");
			
		$this->id = htmlspecialchars(strip_tags($this->id));
	 
		$stmt->bind_param("i", $this->id);
	 
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
}
?>