<?php

    class ProductsController {
    	// constructor
    	function __construct($conn) {
    		$this->conn = $conn;    	
    	}

        // retrieving products data
        
        public function update() {
            $nocode = $_GET['no'];
            $data  =  array();
            $sql = "SELECT * FROM profile WHERE no=$nocode";
            $result =  $this->conn->query($sql);
            //$result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                
                //echo "id: " . $row["id"]. " - Name: " . $row["sname"]. " " . $row["fname"]. "<br>";
                //echo $email;
                }
            }
           
            //mysqli_close($conn);
           
        }
    }
?>
