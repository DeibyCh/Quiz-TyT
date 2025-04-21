<?php
session_start();
require 'config.php';
include "templates/header.php"; 
include "templates/nav.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();

$quiz_duration = 3600; // 1 hora

$modules = ["Lectura Crítica", "Razonamiento Cuantitativo", "Competencias Ciudadanas", "Inglés"];
$questions_by_module = [];

foreach ($modules as $module) {
    $stmt = $conn->prepare("SELECT * FROM questions WHERE module = ?");
    $stmt->bind_param("s", $module);
    $stmt->execute();
    $result = $stmt->get_result();
    $questions_by_module[$module] = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cuestionario</title>
    <link rel="stylesheet" href="style.css">
    <script>
        let timeLeft = <?php echo $quiz_duration; ?>;
        function formatTime(seconds) {
            let minutes = Math.floor(seconds / 60);
            let secs = seconds % 60;
            return minutes + ":" + (secs < 10 ? "0" : "") + secs;
        }
        function startTimer() {
            let timer = setInterval(() => {
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    document.getElementById("quizForm").submit();
                }
                document.getElementById("timer").innerText = formatTime(timeLeft);
                timeLeft--;
            }, 1000);
        }
        window.onload = startTimer;
    </script>
</head>
<body>
    <div class="about-page">
        <main>
            <header class="site-header">
                <div class="section-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center">
                            <h1 class="text-white">Buena suerte, <?php echo htmlspecialchars($username); ?>!</h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="reviews-section section-padding">
                <div class="container text-white">
                    <div class="row">
                        <div class="col">
                            
                            <!-- Contenedor cronómetro -->
                            <div class="position-fixed">         
                                <div class="card position-sticky mt-5 text-center" style="max-width: 6rem;">
                                    <div class="card-header">Tiempo restante:</div>
                                    <div class="card-body p-1">
                                        <h2 class="fs-6 fw-light"><span id="timer"></span></h2>
                                    </div>
                                </div>
                            </div>

                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-3 p-3 mb-2"></div>
                                    <div class="col align-self-center">
                                        <form id="quizForm" method="post" action="result.php">

                                            <?php foreach ($questions_by_module as $module => $questions): ?>

                                                <!-- Card de módulo -->
                                                <div class="card bg-primary-subtle mb-3">
                                                    <div class="card-body">
                                                        <h4 class="mt-1"><?php echo htmlspecialchars($module); ?></h4>
                                                    </div>
                                                  </div>

                                                <!-- Card de preguntas-->
                                                <?php foreach ($questions as $q): ?>
                                                    <div class="card mt-4 mb-4">
                                                        
                                                        <!-- Consulta de la imagen en la base de datos -->
                                                        <?php if (!empty($q['image_path'])): ?>
                                                                <img 
                                                                    class="card-img-top img-clickable" 
                                                                    src="<?php echo htmlspecialchars($q['image_path']); ?>" 
                                                                    alt="Imagen de la pregunta"
                                                                    style="cursor: pointer;" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#imageModal" 
                                                                    data-image="<?php echo htmlspecialchars($q['image_path']); ?>"
                                                                >
                                                            <?php endif; ?>

                                                        <div class="card-body">
                                                            <h6 class="card-title">
                                                                <?php
                                                                echo nl2br(htmlspecialchars(str_replace('\n', "\n", $q['question'])));
                                                                ?>
                                                            </h6>
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">
                                                                    <input type="radio" name="answer[<?php echo $q['id']; ?>]" value="A"> <?php echo nl2br(str_replace('\n', "\n", $q['option_a'])); ?>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="radio" name="answer[<?php echo $q['id']; ?>]" value="A"> <?php echo nl2br(str_replace('\n', "\n", $q['option_b'])); ?>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="radio" name="answer[<?php echo $q['id']; ?>]" value="A"> <?php echo nl2br(str_replace('\n', "\n", $q['option_c'])); ?>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="radio" name="answer[<?php echo $q['id']; ?>]" value="A"> <?php echo nl2br(str_replace('\n', "\n", $q['option_d'])); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>

                                            <!-- Botón de envío -->
                                            <div class="container text-center">
                                                <div class="row">
                                                    <div class="col-md-6 offset-md-3">
                                                        <button type="button" class="form-control" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Enviar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal de confirmación -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Aviso</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Estás seguro de enviar tus respuestas y conocer los resultados?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                                <button type="submit" class="btn btn-outline-success">Enviar</button>
                                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto"></div>
                    </div>
                </div>
            </section>
        </main>
    </div>

<!-- FOOTER -->
<?php
include "templates/footer.php"; 
?>

<!-- Modal para mostrar imagen ampliada -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl container-fluid"> <!-- Centrado y tamaño grande -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Imagen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" src="" class="img-fluid" alt="Imagen ampliada">
      </div>
    </div>
  </div>
</div>
        
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/script.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const modalImage = document.getElementById("modalImage");

                document.querySelectorAll(".img-clickable").forEach(img => {
                img.addEventListener("click", function () {
                    const imagePath = this.getAttribute("data-image");
                    modalImage.src = imagePath;
                });
                });
            });
        </script>
                                                 
</body>
</html>
