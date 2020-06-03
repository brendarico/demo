<?php
    error_reporting(0);
    $host='localhost';
    $usuario='root';
    $password='';
    $bd='test';
    $conexion = new mysqli($host,$usuario,$password,$bd) or die('could not connect to database');
    
    $mail = $_POST['mail'];

    date_default_timezone_set('America/Mexico_City');
    $script_tz = date_default_timezone_get();
    $time = date('d-m-Y H:i:s');
    $data = 0;
    $random_id_length = 6;
    $discountcode = generateRandomString( $random_id_length );

    function generateRandomString($length = 10) {
      $characters = '0123456789';
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $randomString;
    }
    
    $queryMail = "INSERT INTO `proof`(`id`, `mail`, `time`, `discountcode`)
    VALUES (NULL, '$mail', '$time', '$discountcode')";

    if (empty($mail)){
        $data = 1;
        echo $data;
    }elseif (mysqli_query($conexion, $queryMail)) {
        $data = $discountcode;
        echo $data;
    } else {
        $data = 0;
        echo $data;
    }
    $conexion->close();
?>