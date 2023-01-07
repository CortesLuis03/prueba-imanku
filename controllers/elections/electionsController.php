<?php
    require('../../model/conexion.php');
    header('Content-Type: application/json; charset=utf-8');
    session_start();
    if($_REQUEST){
        $conexion = new connectMYSQL();
        $conexion->connect();
        switch ($_REQUEST['action']) {
            case 'insertData':
                $year = $_POST['year'];
                $vote_count = $_POST['vote_count'];
                $political_party = $_POST['political_party'];
                $code_county = $_POST['county'];

                $query = "
                    INSERT INTO election (year, vote_count, political_party, code_county)
                    vALUES ($year,$vote_count,'$political_party','$code_county');
                ";

                $conexion->executeInstruction($query);
                $conexion->close();
                $message = 'Insert Succesfully';
                $status = true;
                echo json_encode(compact('message','status'));
            break;
            case 'getCounty':
                $query = "
                    SELECT *
                    FROM county
                ";
                $result = $conexion->getData($query);
                $conexion->close();
                echo json_encode(compact('result'));
            break;
            case 'getElections':
                $query = "
                    SELECT *
                    FROM election as elc
                    INNER JOIN county as cnt ON elc.code_county = cnt.code_county;
                ";
                $result = $conexion->getData($query);
                $conexion->close();
                echo json_encode(compact('result'));
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