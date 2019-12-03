<?php include VIEWS.'/partials/header.php' ?>
<div class="banner">
<?php include VIEWS.'/partials/navbar.php' ?>
  
    <div class="row">
        <div class="col-md-12">
        <div class="wrapper">
          <form action="/authenticate/index.php?action=auth" class="form-signin" method="POST">
              <h2 class="form-signin-title text-center">Inicio de Sesión</h2>
              <input type="text" class="form-control" name="username" placeholder="Usuario" autofocus=""/>
              <input type="password" class="form-control" name="password" placeholder="Contraseña" />
              <button class="btn btn-lg btn-success btn-block" type="submit">Iniciar Sesión</button>
              <label for="">¿No tienes una cuenta?<a href="/users/index.php?action=register"> Registrate aquí.</a></label>
          </form>
        </div>
        </div>
    </div>
  
  <?php include VIEWS.'/partials/footer.php' ?>