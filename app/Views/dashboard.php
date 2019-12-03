<?php include VIEWS.'/partials/header.php' ?>
<?//php include VIEWS.'/partials/navbar.php' ?>
    <?php if (is_null($login)) : ?>
        <div class="container-fluid banner">
            <div class="row">
                <!-- Buttons -->
                <div class="col-md-8 offset-md-2 info">
                    <h1 class="text-center">AvanSoftware</h1>
                    <p class="text-center">Cuestionarios de personalidad</p>
                    <div class="buttons">
                        <a class="btn btn-outline-success my-2 my-sm-0" href="/authenticate/index.php?action=login">Iniciar Sesión</a>
                        <a class="btn btn-outline-primary my-2 my-sm-0" href="/users/index.php?action=register">Registrarse</a>
                    </div>
                </div>      
            </div>
        </div>
    <?php else : ?>
        <?php include VIEWS.'/partials/navbar.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h2>Hola <?= $login['fullname'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
  <?php include VIEWS.'/partials/footer.php' ?>
