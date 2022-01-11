<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
            <div class="sb-sidenav-menu-heading">Historial de pagos</div>
                <a class="nav-link" href="hysto.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Agregar historial
                </a>
                <a class="nav-link" href="genHisto.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Generar historial
                </a>

                <div class="sb-sidenav-menu-heading">Constancias</div>
                <a class="nav-link" href="home.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Generar constancias
                </a>

                <div class="sb-sidenav-menu-heading">Alumno</div>
                <a class="nav-link" href="addAlumnos.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Agregar alumno
                </a>
                <a class="nav-link" href="verAlumno.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Alumnos
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Hola:</div>
                <?php echo  $_SESSION["usuario"]; ?>
        </div>
    </nav>
</div>