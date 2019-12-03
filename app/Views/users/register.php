<?php include VIEWS.'/partials/header.php' ?>
  <div class="banner">
  <?php include VIEWS.'/partials/navbar.php' ?>
    <div class="row">
      <div class="col-md-12">
        <?php include VIEWS.'/partials/message.php' ?>
      </div>
    </div>
    <div class="wrapper">
        <form action="/users/index.php?action=register"class="form-signin" method="POST">
            <h2 class="form-signin-title text-center">Registro usuari</h2>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo" value="<?= isset($fullname) ? $fullname : ""; ?>" autofocus="" />
            <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" required="" value="<?= isset($username) ? $username : ""; ?>"/>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required="" value="<?= isset($password) ? $password : ""; ?>"/>
            <input type="password" class="form-control"  id="confirm_password" name="confirm_password" placeholder="Repetir contraseña" required="" value="<?= isset($confirm_password) ? $confirm_password : ""; ?>"/>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Registrarse</button>
            <label for="">¿Ya tienes una cuenta?<a href="/authenticate/index.php?action=login"> Inicia sesión aquí.</a></label>
        </form>
    </div>
  </div>
  <?php include VIEWS.'/partials/footer.php' ?>