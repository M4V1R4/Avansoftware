<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
  
    <div class="row">
        <div class="col-md-12">
            <br>
            <h1 class="text-center">Matenimiento de usuarios</h1>
            <hr>
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nombre completo</th>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                <th scope="col">
                    <a href="/users/index.php?action=create" type="button" class="btn btn-success"><i class="fas fa-user-plus"></i></a>
                </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collection as $record) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $record["id"] ?></th>
                    <td><?= $record["fullname"] ?></td>
                    <td><?= $record["username"] ?></td>
                    <td><?= ($record["role"] == "S") ? "Superusuario" : "Regular"; ?></td>
                    <td><?= ($record["blocked"] == "Y" ) ? "Bloqueado" : "Desbloqueado"; ?></td>
                    <td class="text-center">
                        <a href="/users/index.php?action=see&id=<?= $record["id"] ?>">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="/users/index.php?action=edit&id=<?= $record["id"] ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="/users/index.php?action=destroy&id=<?= $record["id"] ?>">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                    
                </tr>
                <?php endforeach; ?>
             </tbody>
            </table>
        </div>
    </div>
    </div>
  <?php include VIEWS.'/partials/footer.php' ?>