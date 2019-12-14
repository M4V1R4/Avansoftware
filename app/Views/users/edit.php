<?php
  $id = isset($id) ? $id : $user['id'];
  $fullname = isset($fullname) ? $fullname : $user['fullname'];
  $username = isset($username) ? $username : $user['username'];
  $password = isset($password) ? $password : "";
  $role = isset($role) ? $role : $user['role'];
  $blocked = isset($blocked) ? $blocked : $user['blocked'];
?>
<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php include VIEWS.'/partials/message.php' ?>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <br>
          <h1 class="text-center">Editar usuario</h1>
          <hr>
          <!-- Inicia el formulario de create -->
          <form action="/users/index.php?action=update" method="post">
            <div class="form-group">
              <input  id="id" name="id" type="hidden" value="<?=$id?>">
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
              <input type="text" class="form-control"
                id="password" name="password"
                placeholder="" value="<?= isset($password) ? $password : ""; ?>">
            </div>
            <div class="form-group">
              <label for="role">Rol:</label>
              <select class="form-control" id="role" name="role">
                <option value="R" <?= isset($role) && ($role == "R") ? "selected" : ""; ?>>Regular</option>
                <option value="S" <?= isset($role) && ($role == "S") ? "selected" : ""; ?>>Superusuario</option>
              </select>
            </div>
            <div class="form-group">
              <label for="blocked">Estado:</label>
              <select class="form-control" id="blocked" name="blocked">
                <option value="N" <?= isset($blocked) && ($blocked == "N") ? "selected" : ""; ?>>Desbloqueado</option>
                <option value="Y" <?= isset($blocked) && ($blocked == "Y") ? "selected" : ""; ?>>Bloqueado</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-secondary" href="/users/index.php">Cancelar</a>
          </form>
        </div>
    </div>
  </div>
  <?php include VIEWS.'/partials/footer.php' ?>