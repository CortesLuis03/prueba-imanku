<?php
    require('../../model/conexion.php');
    header('Content-Type: application/json; charset=utf-8');
    session_start();
    if($_REQUEST){
        $conexion = new connectMYSQL();
        $conexion->connect();
        switch ($_REQUEST['action']) {
            case 'validateLogin':
                $user = $_POST["user"];
                $pass = $_POST["pass"];

                $query = "
                    SELECT *
                    FROM coordinator
                    WHERE email = '$user';
                ";

                if(count($conexion->getData($query)) > 0){
                    $query = "
                        SELECT *
                        FROM coordinator
                        WHERE email = '$user' AND password = '$pass';
                    ";
                    $result = $conexion->getData($query);
                    if(count($result) > 0){
                        $_SESSION['user_name'] = $result[0]['name'];
                        $_SESSION['user_email'] = $result[0]['email'];
                        $message = 'Correct credentials';
                        $status = true;
                        echo json_encode(compact('message','status'));
                    } else {
                        $message = 'Password does not match the username';
                        $status = false;
                        echo json_encode(compact('message','status'));
                    }
                } else {
                    $message = 'User does not exist';
                    $status = false;
                    echo json_encode(compact('message','status'));
                }

                $conexion->close();
            break;
            default:
                $message = 'No action request';
                $status = false;
                echo json_encode(compact('message','status'));
            break;
        }
    } else {
        if($_SESSION['user_email'] != ''){
            header("Location: ../../pages/elections/");
        } else {
            header("Location: ../../login/");
        }
    }
?>