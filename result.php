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

$correct = 0;
$incorrect = 0;
$user_answers = $_POST['answer'] ?? [];

foreach ($user_answers as $question_id => $answer) {
    $stmt = $conn->prepare("SELECT question, correct_option, option_a, option_b, option_c, option_d FROM questions WHERE id = ?");
    $stmt->bind_param("i", $question_id);
    $stmt->execute();
    $stmt->bind_result($question, $correct_option, $option_a, $option_b, $option_c, $option_d);
    $stmt->fetch();
    $stmt->close();
    
    if ($answer === $correct_option) {
        $correct++;
    } else {
        $incorrect++;
    }
    
    $questions_result[] = [
        'id' => $question_id, // <- Aquí añadimos el ID
        'question' => $question,
        'correct_option' => $correct_option,
        'selected_option' => $answer,
        'options' => [$option_a, $option_b, $option_c, $option_d]
    ];
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            max-width: 400px;
            max-height: 400px;
        }
    </style>
</head>
<body>
    <div class="about-page mt-2">
        <main>
            <header class="site-header">
                <div class="section-overlay"></div>
                    <div class="container">
                        <div class="row">                   
                            <div class="col-lg-12 col-12 text-center">
                                <h1 class="text-white">Resultados del cuestionario</h1>
                            </div>
                        </div>
                    </div>
            </header>

            <section class="reviews-section bg-dark">
            <div class="container text-white">
                <div class="row">
                    <div class="col p-0">
                        <div class="container text-center p-0">

                                <!--columna central-->
                                <div id="box" class="col align-self-center bg-dark d-flex justify-content-center align-items-center flex-column ">
                                    
                                    <!--Diagrama-->
                                    <canvas class="mt-5 p-3" id="resultChart"></canvas>

                                    <h3 class="text-white mt-5 mb-5">Respuestas</h3>
                                    <div class="container text-center">
                                        <div class="row">
                                          <div class="col-md-6 offset-md-3">
                                              <table class="table table-dark table-bordered mb-5 fs-6 fw-light ">
                                                  <thead class="table-dark">
                                                      <tr>
                                                          <th>Pregunta</th>
                                                          <th>Tu Respuesta</th>
                                                          <th>Respuesta Correcta</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php foreach ($questions_result as $q): ?>
                                                        <tr>
                                                            <td><?php echo htmlspecialchars($q['id']); ?></td>
                                                            <td>
                                                                <?php
                                                                    $selected_index = isset($q['selected_option']) ? ord($q['selected_option']) - 65 : null;
                                                                    echo htmlspecialchars($q['options'][$selected_index] ?? 'No respondida');
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    $correct_index = isset($q['correct_option']) ? ord($q['correct_option']) - 65 : null;
                                                                    echo htmlspecialchars($q['options'][$correct_index] ?? 'No disponible');
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                  </tbody>
                                                </table>
                                                <div class="container text-center mb-5">
                                                    <div class="row">
                                                        <div class="col-md-6 offset-md-3">
                                                            <a href="quiz.php" class="form-control mt-3 text-center">Reintentar</a>
                                                            <a href="index.php" class="form-control mt-3 text-center">Salir</a>
                                                        </div>
                                                    </div>
                                                </div>
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

        <footer class="site-footer p-0">
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
        <script>
            new Chart(document.getElementById("resultChart"), {
                type: 'pie',
                data: {
                    labels: ["Correctas", "Incorrectas"],
                    datasets: [{
                        data: [<?php echo $correct; ?>, <?php echo $incorrect; ?>],
                        backgroundColor: ["#2980B9", "#7a2c2c"]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        </script>
</body>
</html>