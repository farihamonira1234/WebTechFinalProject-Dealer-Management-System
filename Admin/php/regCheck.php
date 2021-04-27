<?php 
	session_start();
	require_once('../service/userService.php');

	if(isset($_POST['submit'])){
		$id			= $_POST['id'];
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];

		if(empty($id) || empty($username) || empty($password) || empty($email)){
			header('location: ../views/register.php?error=null_value');
		}else{

			if(empty(getByID($id)['id']))
			{
				$user = [
					'id'=>$id,		
					'username'=> $username,
					'password'=> $password,
					'email'=> $email
				];

				$status = insert($user);

				if($status){
					header('location: ../views/login.php?success=registration_done');
				}else{
					header('location: ../views/register.php?error=db_error');
				}	
			}
			else
				header('location: ../views/register.php?error=id_already_exist');
			
		}
	}



?>