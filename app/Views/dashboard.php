<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
  <div class="container">
      <br>
      <div class="jumbotron">
          <h1>ISW613</h1>
          <p>Programación Web I</p>
          <?php if (is_null($login)) : ?>
            <p><a class="btn btn-primary btn-lg"
              href="/authenticate/index.php?action=login" role="button">Iniciar sesión</a></p>
          <?php else : ?>
            <h2>Hola <?= $login['fullname'] ?></h2>
          <?php endif; ?>
      </div>
  </div>
  <?php include VIEWS.'/partials/footer.php' ?>
