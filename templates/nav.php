
<nav class="navbar navbar-expand-lg ">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.html">

                    <div class="d-flex flex-column">
                        <strong class="logo-text text-white">Preguntas saber TyT</strong>
                        <small class="logo-slogan">Icfes</small>
                    </div>
                </a>

                <button class="navbar-toggler ms-lg-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-center ms-lg-5">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="about.php">Acerca de</a>
                        </li>

                        <li class=" ">
                            <a class="nav-link">
                            <?php echo htmlspecialchars($_SESSION["username"]); ?>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link custom-btn btn" href="logout.php">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        