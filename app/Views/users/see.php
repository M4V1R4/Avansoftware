<?php

  $fullname = isset($fullname) ? $fullname : $user['fullname'];
  $username = isset($username) ? $username : $user['username'];
  $role = isset($role) ? $role : $user['role'];
  $blocked = isset($blocked) ? $blocked : $user['blocked'];
  $id = isset($id) ? $id : $user['id'];
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
          <h1 class="text-center">Ver Usuario</h1>
          <hr>
          <!-- Inicia el formulario de create -->
          
            <div class="form-group">
              <label for="fullname">Nombre completo:</label>
              <input
                type="text" class="form-control"
                id="fullname" name="fullname"
                aria-describedby="Introduzca el nombre completo del usuario"
                placeholder="" value="<?= isset($fullname) ? $fullname : ""; ?>"  disabled>
            </div>
            <div class="form-group">
              <label for="username">Nombre de usuario:</label>
              <input
                type="text" class="form-control"
                id="username" name="username"
                aria-describedby="Introduzca el nombre de usuario"
                placeholder="" value="<?= isset($username) ? $username : ""; ?>"  disabled>
            </div>
            <div class="form-group">
              <label for="role">Rol:</label>
              <select class="form-control" id="role" name="role"  disabled>
                <option value="R" <?= isset($role) && ($role == "R") ? "selected" : ""; ?>>Regular</option>
                <option value="S" <?= isset($role) && ($role == "S") ? "selected" : ""; ?>>Superusuario</option>
              </select>
            </div>
            <div class="form-group">
              <label for="role">Estado:</label>
              <select class="form-control" id="blocked" name="blocked"  disabled>
                <option value="Y" <?= isset($blocked) && ($blocked == "Y") ? "selected" : ""; ?>>Bloqueado</option>
                <option value="N" <?= isset($blocked) && ($blocked == "N") ? "selected" : ""; ?>>Desbloqueado</option>
              </select>
            </div>

          <a type="button" class="btn btn-primary">Ver Reporte</a>
          <a href="/users/index.php?action=edit&id=<?= $id ?>" type="button" class="btn btn-primary">Editar</a>
          <a href="/users/index.php" type="button" class="btn btn-primary">Regresar a la lista</a>
        </div>
    </div>
  </div>
  <?php include VIEWS.'/partials/footer.php' ?>