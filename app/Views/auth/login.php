<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php include VIEWS.'/partials/message.php' ?>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h1>Iniciar sesión</h1>
          <!-- Inicia el formulario de Login -->
          <form action="/authenticate/index.php?action=auth" method="post">
            <div class="form-group">
              <label for="username">Usuario:</label>
              <input
                type="text" class="form-control"
                id="username" name="username"
                aria-describedby="Introduzca su nombre de usuario"
                placeholder="">
            </div>
            <div class="form-group">
              <label for="password">contraseña:</label>
              <input type="password" class="form-control"
                id="password" name="password"
                placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
          </form>
        </div>
    </div>
  </div>
  <?php include VIEWS.'/partials/footer.php' ?>