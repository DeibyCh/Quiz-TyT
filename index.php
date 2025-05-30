<?php
require 'config.php';
include "templates/header.php"; 
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>TyT</title>
<!--
-----------------------------------------------------------------------------------
Tooplate 2134 Gotto Job https://www.tooplate.com/view/2134-gotto-job
Bootstrap 5 HTML CSS Template
------------------------------------------------------------------------------------
-->
    </head>
    
<body>
    <?php
    include "templates/nav2.php"; 
    ?>
    <main>
        <section class="hero-section d-flex justify-content-center align-items-center mt-2">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <div class="hero-section-text mt-5">
                            <h6 class="text-white">Quieres prepararte para las pruebas TyT?</h6>
                            <h1 class="hero-title text-white mt-4 mb-4">Este cuestionario, <br> es tu mejor opción.</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <form class="custom-form hero-form" action="#" method="get" role="form">
                            <h4 class="text-white mb-3">Regístrate e inicia sesión para empezar con el cuestionario</h4>
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <a href="register.php" class="custom-link text-white">Registrarse</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section mt-2">
            <div class="section-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-10">
                            <h2 class="text-white mb-2">Esta es una pagina sin animo de lucro</h2>
                            <p class="text-white">Lo que esta pagina busca es brindar una herramienta de conocimiento y practica, donde los estudiantes puedan saber y comprender que tipo de preguntas pueden encontrarse en el examen con lo cual practiquen y se preparen para obtener el mejor resultado en su evaluación</p>
                        </div>
                        <div class="col-lg-4 col-12 ms-auto">
                            <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                                <a href="login.php" class="custom-link">Iniciar sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
<?php
include "templates/footer.php"; 
?>


        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/script.js"></script>
        
    </body>
</html>