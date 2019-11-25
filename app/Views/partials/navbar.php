<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">ISW613</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <!--li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li-->
      <?php if (isset($login) && !is_null($login)) : ?>
        <?php if ($login['role'] == 'S') : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Usuarios
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/users/index.php">Ver todos los usuarios</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/users/index.php?action=create">Agregar usuario</a>
            </div>
          </li>
        <?php endif; ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cuestionarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/questionnaires/index.php">Ver todos los cuestionarios</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/questionnaires/index.php?action=new">Agregar cuestionario</a>
        </div>
      </li>
    </ul>
    <?php else : ?>
    </ul>
    <?php endif; ?>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <?php if (isset($login) && !is_null($login)) : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $login['username'] ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/authenticate/index.php?action=logout.php">Cerrar sesión</a>
              </div>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="/authenticate/index.php?action=login">Iniciar sesión</a>
            </li>
          <?php endif; ?>
      </li>
    </ul>

  </div>
</nav>
<br>