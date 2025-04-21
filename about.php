<?php
require 'config.php';
include "templates/header.php"; 
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>TyT</title>
        
<!--
-----------------------------------------------------------------------------------
Tooplate 2134 Gotto Job
https://www.tooplate.com/view/2134-gotto-job
Bootstrap 5 HTML CSS Template
------------------------------------------------------------------------------------
-->
    </head>
    
    <body>
        
    <nav class="navbar navbar-expand-lg" id="top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <div class="d-flex flex-column">
                <strong class="logo-text">Preguntas saber TyT</strong>
                <small class="logo-slogan">Icfes</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-center ms-lg-5">
                <li class="nav-item">
                    <a class="nav-link active" href="index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Acerca de</a>
                </li>
                <li class="nav-item ms-lg-auto">
                    <a class="nav-link" href="register.php">Regístrate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-btn btn" href="login.php">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>

<header class="site-header mt-5">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            
            <div class="col-lg-12 col-12 text-center">
                <h1 class="text-white">¿Que son las pruebas TyT?</h1>

            </div>

        </div>
    </div>
</header>


<section class="about-section mt-5 bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-12">
                <div class="about-info-text">
                    <h2 class="mb-0 mt-5">Examen de Estado de la Calidad de la Educación Superior</h2>

                    <h4 class="mb-2">Saber TyT</h4>

                    <p>Es un instrumento de evaluación estandarizada para la medición externa de la calidad de la educación superior que evalúa las competencias de los estudiantes que están próximos a culminar los distintos programas técnicos profesionales y tecnológicos.</p>

                    <div class="d-flex align-items-center mt-5 mb-5">
                    <p>Saber TyT está compuesto por un grupo de competencias genéricas y otro de específicas. 
                    El primer conjunto evalúa cinco módulos genéricos: 
                    <strong>Lectura Crítica, Razonamiento Cuantitativo, Competencias Ciudadanas, Comunicación Escrita e Inglés</strong> 
                    El segundo grupo está compuesto por tres módulos asociados a temáticas y contenidos específicos que los estudiantes pueden presentar de 
                    acuerdo con su área de formación: 
                    <strong> Promoción de la Salud y Prevención de la Enfermedad, Ensamblaje, Mantenimiento y Operación de 
                    Maquinaria y Equipos, y Ensamblaje, Mantenimiento e Instalación de Hardware y Software.</strong>
                    <br>
                    <br>
                    fuente: "www.icfes.gov.co/evaluaciones-icfes/examen-saber-tyt/"
                    </p>
                

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="about-image-wrap ">
                    <img src="images/study.jpg" class="about-image about-image-border-radius img-fluid" alt="">
                </div>
                <div class="about-image-wrap mt-5 mb-5">
                    <img src="images/study1.jpg" class="about-image about-image-border-radius img-fluid" alt="">
                </div>
            </div>
            

        </div>
    </div>
</section>


<section class="about-section mt-5 mb-5 bg-dark-subtle">
    <div class="container">
        <div class="row pb-5 justify-content-center align-items-center">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 p-4">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-5 mt-5">Módulos Genéricos</h2>
                </div>
                <div class="col">
                    <div class="">
                        <div class="text-center">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-window"></i>
                            
                                <h4 class="services-block-title">Lectura Crítica</h4>
                            </div>

                            <div class="services-block-body">
                                <p>Tooplate provides a variety of free Bootstrap 5 website templates for your commercial or business websites.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <div class="text-center">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-twitch"></i>
                            
                                <h4 class="services-block-title">Comunicación Escrita</h4>
                            </div>

                            <div class="services-block-body">
                                <p>You can download any free template for your website. Please tell your friends about Tooplate.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <div class="text-center">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-play-circle-fill"></i>
                            
                                <h4 class="services-block-title">Razonamiento Cuantitativo</h4>
                            </div>

                            <div class="services-block-body">
                                <p>You are not allowed to redistribute the template ZIP file on any other template collection website.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <div class="text-center">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-play-circle-fill"></i>
                            
                                <h4 class="services-block-title">Competencias Ciudadanas</h4>
                            </div>

                            <div class="services-block-body">
                                <p>You are not allowed to redistribute the template ZIP file on any other template collection website.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <div class="text-center">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-play-circle-fill"></i>
                            
                                <h4 class="services-block-title">Inglés</h4>
                            </div>

                            <div class="services-block-body">
                                <p>You are not allowed to redistribute the template ZIP file on any other template collection website.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-section mt-5 mb-5 bg-secondary">
    <div class="container text-center">
        <div class="row pb-5">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-5 mt-5">Módulos específicos:</h2>
            </div>
            <div class="col">
                <div class="">
                    <div class="text-center">
                        <div class="services-block-title-wrap">
                            <i class="services-block-icon bi-window"></i>
                        
                            <h4 class="services-block-title">Promoción de la Salud y Prevención de la Enfermedad</h4>
                        </div>

                        <div class="services-block-body ">
                            <p>Tooplate provides a variety of free Bootstrap 5 website templates for your commercial or business websites.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="">
                    <div class="text-center">
                        <div class="services-block-title-wrap">
                            <i class="services-block-icon bi-twitch"></i>
                        
                            <h4 class="services-block-title">Ensamblaje, Mantenimiento y
                            Operación de Maquinaria y Equipos</h4>
                        </div>

                        <div class="services-block-body">
                            <p>You can download any free template for your website. Please tell your friends about Tooplate.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="">
                    <div class="text-center">
                        <div class="services-block-title-wrap">
                            <i class="services-block-icon bi-play-circle-fill"></i>
                        
                            <h4 class="services-block-title">Mantenimiento e Instalación de Hardware y Software</h4>
                        </div>

                        <div class="services-block-body">
                            <p>You are not allowed to redistribute the template ZIP file on any other template collection website.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section mt-5 ">
    <div class="section-overlay"></div>

    <div class="container text-white">
        <div class="row">
            <div class="container text-center text-white">
                <div class="row">            
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5 mt-5">Módulos específicos:</h2>
                            </div>
                                <div class="col p-4 bg-dark bg-opacity-50  text-white">
                                    <div class="">
                                        <div class="text-center">
                                            <div class="services-block-title-wrap">
                                
                                            <h3 class="services-block-title text-white">Duración de la prueba</h3>
                                            </div>
                                            <div class="services-block-body text-white ">
                                                La duración del examen varía en función de los módulos que se vayan a presentar:
                                        
                                                <div class="mt-4">
                                                    <ul>
                                                        <li>Quienes tienen inscritos solo módulos genéricos, contarán con 4 horas y 20 minutos.</li>
                                                        <li>Quienes además tienen inscrito un módulo especíﬁco dispondrán de un tiempo adicional de 
                                                        1 hora y 15 minutos.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                            
                                    </div>
                                </div>
                    <div class="col p-4 bg-dark bg-opacity-50">
                        <div class="">
                            <div class="text-center">
                                <div class="services-block-title-wrap">
                                
                                    <h3 class="services-block-title text-white">¿Cuantas preguntas son?</h3>
                                </div>

                                <div class="services-block-body text-white">
                                La prueba está compuesta por 5 módulos genéricos los cuales tienen el siguiente número de preguntas:
                                <div class="mt-4">
                                    <ul>
                                        <li><strong> Lectura Crítica:</strong> 35 preguntas</li>
                                        <li><strong>Razonamiento Cuantitativo:</strong> 35 preguntas</li>
                                        <li><strong>Competencias Ciudadanas:</strong> 35 preguntas</li>
                                        <li><strong>Ingles:</strong> 55 preguntas</li>
                                        <li><strong>Comunicación Escrita:</strong> Los evaluados tendrán que desarrollar un texto escrito</li>
                                    </ul>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
</main>

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
<?php
include "templates/footer.php"; 
?>