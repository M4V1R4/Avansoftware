<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Usuarios</h1>
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre completo</th>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collection as $record) : ?>
                <tr>
                    <th scope="row"><?= $record["id"] ?></th>
                    <td><?= $record["fullname"] ?></td>
                    <td><?= $record["username"] ?></td>
                    <td><?= $record["role"] ?></td>
                    <td><?= $record["blocked"] ?></td>
                </tr>
                <?php endforeach; ?>
             </tbody>
            </table>
        </div>
    </div>
  </div>
  <?php include VIEWS.'/partials/footer.php' ?>