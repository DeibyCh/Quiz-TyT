<?php
session_start();
include "templates/header.php"; 
include "templates/nav.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
</head>
<body id="top">
    <div class="about-page">
        <main>

            <header class="site-header mt-5">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12 col-12 text-center">
                            <h1 class="text-white">Bienvenido, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
                        </div>

                    </div>
                </div>
            </header>

            <section class="reviews-section section-padding mt-5">
            <div class="container text-white">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-2 text-white">Ten en cuenta:</h2>
                        <p class="text-white">En este cuestionario responderás varias preguntas las cuales han sido tomadas de los 
                            libros de apoyo de las pruebas TyT, con un tiempo maximo de duracion el cual esta cronometrado en 120 minutos. 
                            Al finalizar, verás tus resultados, donde se mostrara un grafico de las preguntas acertadas e incorrectas.
                            <br>Asegúrate de leer cada pregunta cuidadosamente antes de responder. 
                            <br>Recuerda que el tiempo es limitado, así que no te distraigas y concéntrate en responder correctamente.
                            <br>Algunas imágenes pueden verse pequeñas, puedes hacer click en cada una para agrandarla y asi leer mejor su contenido.
                            <br>¡Buena suerte!</p>


                        </p>
                      </div>
                    <div class="col-md-auto">
                   
                    </div>
                    <div class="col col-lg-2">
                        <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-5">
                            <a href="quiz.php" class="custom-btn custom-border-btn btn me-4">Iniciar Prueba</a>
                        </div> 
                    </div>
                </div>
                </div>

            </section>
       </main>

        <footer class="site-footer m-0">
            <div class="site-footer-bottom m-0">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-12 d-flex align-items-center">
                            <p class="copyright-text">@DeibyA</p>

                            <ul class="footer-menu d-flex">

                            </ul>
                        </div>



                        <div class="col-lg-3 col-12 mt-2 d-flex align-items-center mt-lg-0">
                            <p>Design: <a class="sponsored-link" rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
                        </div>

                        <a class="back-top-icon bi-arrow-up smoothscroll d-flex justify-content-center align-items-center" href="#top"></a>

                    </div>
                </div>
            </div>
        </footer>

        
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
</body>
</html>
