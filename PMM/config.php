<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pmm";

// conexiune bd, varianta orientata pe obiecte, cu 4 parametri
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$conn) {
	die("Connection failed: ". mysqli_connect_error());
}
				// 
        // $sqlUsers = "SELECT * FROM users";
        // $resultUsers = mysqli_query($conn, $sqlUsers);
        // $rowUsers = mysqli_fetch_assoc($resultUsers);
				//
        // $_SESSION['username'] = $rowUsers['username'];
        // $_SESSION['tip'] = $rowUsers['tip'];
