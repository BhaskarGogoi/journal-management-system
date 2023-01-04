<?php
	session_start();

	include '../config.php';

    if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$msg = mysqli_real_escape_string($conn, $_POST['msg']);

		//-----Check if form datas are not filled-----
		if (empty($name) || empty($email) || empty($msg)) {
			header ("Location:../contact?error=empty");
			exit();
        }

        //validate CSRF TOKEN
		if($_POST['csrf_token'] != $_SESSION['csrf_token']){
            header ("Location:../contact?error=500");
            exit();
        }
		
		else {
                
            $sql = "INSERT INTO contact_msg (name, email, message)
            VALUES (?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header ("Location:../contact?error=500");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $name, $email, $msg);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($conn->affected_rows > 0){
                    header ("Location:../contact?success=submitted");
                    exit();
                }else {
                    header ("Location:../contact?error=500");
                    exit();
                }  
            }            
		}
	} else {
		header ("Location:../contact?error=submit");
		exit();
	}

?>