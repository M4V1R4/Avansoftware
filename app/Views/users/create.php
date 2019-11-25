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
            <h1>Crear usuario</h1>
          <!-- Inicia el formulario de Login -->
          <form action="/users/index.php?action=store" method="post">
            <div class="form-group">
              <label for="fullname">Nombre completo:</label>
              <input
                type="text" class="form-control"
                id="fullname" name="fullname"
                aria-describedby="Introduzca el nombre completo del usuario"
                placeholder="" value="<?= isset($fullname) ? $fullname : ""; ?>">
            </div>
            <div class="form-group">
              <label for="username">Nombre de usuario:</label>
              <input
                type="text" class="form-control"
                id="username" name="username"
                aria-describedby="Introduzca el nombre de usuario"
                placeholder="" value="<?= isset($username) ? $username : ""; ?>">
            </div>
            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" class="form-control"
                id="password" name="password"
                placeholder="" value="<?= isset($password) ? $password : ""; ?>">
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirme contraseña:</label>
              <input type="password" class="form-control"
                id="confirm_password" name="confirm_password"
                placeholder="" value="<?= isset($confirm_password) ? $confirm_password : ""; ?>">
            </div>
            <div class="form-group">
              <label for="role">Rol:</label>
              <select class="form-control" id="role" name="role">
                <option value="R" <?= isset($role) && ($role == "R") ? "selected" : ""; ?>>Regular</option>
                <option value="S" <?= isset($role) && ($role == "S") ? "selected" : ""; ?>>Superusuario</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-secondary" href="/users/index.php">Cancelar</a>
          </form>
        </div>
    </div>
  </div>
  <?php include VIEWS.'/partials/footer.php' ?>