<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #34495e;">
  <a class="navbar-brand" style="color:#bdc3c7;" href="/">AvanSoftware</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
      <?php if (isset($_SESSION['login']) && !is_null($_SESSION['login'])) : ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#bdc3c7;">
          Cuestionarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/questionnaires/index.php">Cuestionarios a responder</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/questionnaires/results.php">Ver mis resultados</a>
        </div>
      </li>
        <?php if ($_SESSION['login']['role'] == 'S') : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#bdc3c7;">
              Catálogos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/users/index.php">Mantenimiento de usuarios</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/questionnaires/index.php?action=maintenance">Mantenimiento de Cuestionarios</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#bdc3c7;">
              Reportes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/users/index.php">Reporte por empleado</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/users/index.php?action=create">Reporte por cuestionario</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/users/index.php?action=create">Gráfico Top 10</a>
            </div>
          </li>



        <?php endif; ?>
      
    </ul>
    <?php else : ?>
    </ul>
    <?php endif; ?>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <?php if (isset($_SESSION['login']) && !is_null($_SESSION['login'])) : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#bdc3c7;">
                <?= $_SESSION['login']['username'] ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/authenticate/index.php?action=logout.php">Cerrar sesión</a>
              </div>
            </li>
          <?php else : ?>
            <!-- <li class="nav-item">
              <a class="nav-link" href="/authenticate/index.php?action=login">Iniciar sesión</a>
            </li> -->
          <?php endif; ?>
      </li>
    </ul>

  </div>
</nav>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php include VIEWS.'/partials/message.php' ?>
      </div>
    </div>