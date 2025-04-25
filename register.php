<?php
session_start();
require 'config.php';
include "templates/header.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validación en el servidor
    if ($password !== $confirm_password) {
        $_SESSION['message'] = "<div class='error'>Las contraseñas no coinciden.</div>";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
        $_SESSION['message'] = "<div class='error'>Recuerda la contraseña debe tener al menos 8 caracteres, una mayúscula y un número.</div>";
    } else {
        // Verificar si el usuario ya existe
        $check_stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $check_stmt->bind_param("s", $username);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            $_SESSION['message'] = "<div class='error'>El usuario ya está registrado. Intenta con otro nombre.</div>";
        } else {
            // Encriptar la contraseña
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insertar usuario
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed_password);
            
            if ($stmt->execute()) {
                $_SESSION['message'] = "<div class='success'>Registro exitoso. <a href='login.php'>Iniciar sesión</a></div>";
            } else {
                $_SESSION['message'] = "<div class='error'>Error en el registro.</div>";
            }
            $stmt->close();
        }
        $check_stmt->close();
    }

    // Redirigir para evitar reenvío del formulario
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<section class="d-flex justify-content-center align-items-center mt-5">
    <div class="mt-5">
        <div class="mt-5">
        </div>
    </div>
</section>


<section class="d-flex justify-content-center align-items-center mt-3">
        <div class="container d-flex justify-content-center">
            <div class="col-lg-6 col-12">

                <!--formulario-->
                <form class="custom-form hero-form" action="#" method="post" role="form">
                    <h4 class="text-white mb-5 text-center">Crea un nuevo usuario y contraseña</h4>

                    <!--aviso-->
                    <div class="col">
                            <p class="text-white text-center">La contraseña debe contener mínimo 8 caracteres, una mayúscula y un numero.</p>
                    </div>
                        <!--Usuario-->
                        <div class="row row g-2 ">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="bi-person custom-icon">

                                        </i>
                                    </span>
                                        <input type="text" name="username" id="job-title" class="form-control" placeholder="Usuario" required>
                                </div>
                            </div>
                            <!--Contraseña-->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-key custom-icon"></i></span>

                                        <input type="password" name="password" id="job-location" class="form-control" placeholder="Contraseña" required>
                                </div>
                            </div>

                            <!--confirmación de contraseña-->
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-key custom-icon"></i></span>
                                        <label for="confirm_password"></label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmar contraseña" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control">
                                    Registrar
                                </button>
                                <a href="index.php" class="form-control mt-3 text-center">Regresar</a>

                            </div>
                            <div>
                                <h5 class="text-white text-center mt-5">
                                    
                                <!--mensaje de confirmación-->
                                <?php 
                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message']; 
                                    unset($_SESSION['message']); // Eliminar el mensaje después de mostrarlo
                                }
                                ?>
                                </h5>

                            </div>
                        </div>
                    </form>
            </div>
        </div>
</section>