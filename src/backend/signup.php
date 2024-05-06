<?php
include('../../config/database.php');

$fullname = $_POST['fname'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$enc_pass = md5($passwd);

// Consulta para verificar si el correo electrónico ya existe
$squl_validate_email = "SELECT * FROM users WHERE email = '$email'";
$result = pg_query($conn, $squl_validate_email);
$total=pg_num_rows($result);


// Verificar si el correo electrónico ya está registrado
if ($total > 0) {
    echo "<script>alert('Email already exists')</script>";
    header("refresh:0;url=../signin.html");
} else {
    // Insertar nuevo usuario si el correo electrónico no existe
    $sql = "INSERT INTO users (fname, email, passwd) 
            VALUES ('$fullname', '$email', '$enc_pass')";

    $ans = pg_query($conn, $sql);

    
    if ($ans) {
      echo "<script>alert('User has been registered')</script>";
      header("refresh:0;url=../signin.html");
    } else {
        echo "ERROR" . pg_last_error();
    }
}

// Cerrar la conexión a la base de datos
pg_close($conn);
?>
