<?php
session_start();
$valid_users = [
    'student@example.com' => 'student123',
    'teacher@example.com' => 'teacher123'
];
//checking the submit...
if($_SERVER['REQUEST_METHODE']==='POST'){
    $email = $POST['email'] ?? '';
    $password = $POST['password'] ??'';
    //checking if the email and password are not empty
    if(!empty($email) && !empty($password)){
        //checking if the email and password are valid
        if(array_key_exists($email, $valid_users) && $valid_users[$email] === $password){
            $_SESSION['user'] = $email;
            echo json_encode(['status' => 'success', 'message' => 'Login successful']);
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
        }
    }
    else{
        echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
    }
}