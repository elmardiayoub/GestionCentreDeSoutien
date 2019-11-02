<?php

    session_start();

    $conn = mysqli_connect('localhost','root', '', 'cours_soutien');

    
	$data =[
		'username' => '',
		'password' => '',
		'username_err' => '',
        'password_err' => '',
        'login_err' => ''
	];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// Init data
		$data =[
			'username' => mysqli_real_escape_string($conn, $_POST['username']),
			'password' => mysqli_real_escape_string($conn, $_POST['password']),
			'username_err' => '',
            'password_err' => '',
            'login_err' => ''
		];

		// Validate username
		if(empty($data['username'])){
			$data['username_err'] = 'Please enter username';
		} 
	
	
		// Validate password 
		if(empty($data['password'])){
			$data['password_err'] = 'Please enter your password';
		} 

		// Make sure errors are empty
		if(empty($data['username_err']) && empty($data['password_err'])){

            $username = $data["username"];
            $password = $data["password"];
        
            // $data['password'] = md5($data['password']);
            $query = "SELECT * FROM mylogins WHERE username='$username' AND password='$password'";
            $results = mysqli_query($conn, $query);

            if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $data['username'];
				$_SESSION['success'] = "You are now logged in" ;
				$results=mysqli_fetch_assoc($results);
				$_SESSION['id_username'] =$results['id_user'] ;
				
				
                header('location: index.php');
            }else {
                $data['login_err'] = "Wrong username/password combination";
            }
		}

    }
    
?>   