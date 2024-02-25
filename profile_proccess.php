<?php

    include_once("url.php");
    include_once("connect.php");
    include_once("dao/UserDAO.php");
    include_once("models/User.php");
    include_once("models/Message.php");
    include_once("models/ProccessImage.php");

    $msg = new Message($BASE_URL);
    $userDao = new UserDAO($db, $BASE_URL);
    $userData = $userDao->findById($_POST["id"]);
    $user = new User();
    $imgProccess = new ProccessImage($db, $BASE_URL);

    if(!empty($_FILES["image"])) {
        $imgProccess->changeUserPhoto($userData->id);
    }

    $dataType = array_keys($_POST)[1];
    
    if($dataType == "password") {
        if(!password_verify($_POST["password"], $userData->password)) {
            if($_POST["passwordConf"] == $_POST["newPasswordConf"]) {
                $newPass = $user->generatePassword($_POST["passwordConf"]);
                $userDao->update($userData->id, $dataType, $newPass);
                $msg->setMessage("Password changed successfully!", "Success", "back");
                //exit();
            }
            else {
                $msg->setMessage("Passwords don't match!", "Error", "back");
                //exit();
            }
        } 
        else {
            $msg->setMessage("Actual password is wrong!", "Error", "back");
            //exit();
        }
        exit();
    }
    else if($dataType == "email") {
        if($_POST["email"] == "") {
            $msg->setMessage("E-mail input can't be blank!", "Error", "back");
            exit();
        }
        if($userDao->findByEmail($_POST[$dataType])) {
            $msg->setMessage("E-mail is already been used!", "Error", "back");
            exit();
        }
    }

    $userDao->update($userData->id, $dataType, $_POST[$dataType]);

    $msg->setMessage("Data changed succesfully!", "Success", "back");

?>