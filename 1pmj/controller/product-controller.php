<?php
    class ProductsController {
    	// constructor
    	function __construct($conn) {
    		$this->conn = $conn;    	
    	}

        // retrieving products data
        public function index() {
            $data  =  array();
            $sql   =  "SELECT * FROM profile ";            
            $result =  $this->conn->query($sql);            
            if($result->num_rows > 0) {            
                $data =  mysqli_fetch_all($result, MYSQLI_ASSOC);            
            }           
           //$db->close($conn);           
           return $data;
        }
    }
?>