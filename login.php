<?php
session_start();
require 'config.php';
include "templates/header.php"; 

$message = ""; // Variable para mensajes

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {  
        // Solo hacemos fetch si hay un resultado
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            header("Location: welcome.php");
            exit();
        } else {
            $message = "<div class='error'>Usuario o contraseña incorrectos.</div>";
        }
    } else {
        $message = "<div class='error'>Usuario o contraseña incorrectos.</div>";
    }

    $stmt->close();
}
?>

<section class="d-flex justify-content-center align-items-center mt-5">
    <div class="mt-5">
        <div class="mt-5">
        </div>
    </div>
</section>


<section class="d-flex justify-content-center align-items-center mt-5">
        <div class="container d-flex justify-content-center">
            <div class="col-lg-6 col-12">

                <!--formulario-->
                <form class="custom-form hero-form" action="#" method="post" role="form">
                    <h4 class="text-white mb-3 text-center">Inicio de sesión</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                        
                                        <input type="text" name="username" id="job-title" class="form-control" placeholder="Usuario" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-key custom-icon"></i></span>

                                        <input type="password" name="password" id="job-location" class="form-control" placeholder="Contraseña" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control">
                                    Ingresar
                                </button>
                                <a href="index.php" class="form-control mt-3 text-center">Regresar</a>

                            </div>
                            <div>
                                <h5 class="text-white text-center mt-5">
                                    
                                <!--mensaje de error-->
                                <?php 

                               if (!empty($message)) {
                                    echo $message;
                                }
                                ?>
                                
                                </h5>

                            </div>
                        </div>
                    </form>
            </div>
        </div>
</section>
