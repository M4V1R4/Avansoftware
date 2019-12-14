<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
  
    <div class="row justify-content-center">
        <div class="col-md-10">
            <br>
            <h1 class="text-center">Reporte por empleado</h1>
            <hr>
            <div class="form-group">
              <label for="fullname">Empleado:</label>
              <input
                type="text" class="form-control"
                id="fullname" name="fullname"
                aria-describedby="Introduzca el nombre completo del usuario"
                placeholder="" value="<?= isset($fullname) ? $fullname : ""; ?>">
                
            </div>
            <a class="btn btn-primary" href="/users/index.php">Buscar</a>
            <br>
            <hr>
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Cuestionario</th>
                <th scope="col">Puntos</th>
                <th scope="col">Resultado</th>
                <th scope="col">Borrar intento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collection as $record) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $record["id"] ?></th>
                    <td><?= $record["description"] ?></td>
                    <td class="text-center">
                        <a href="/reports/index.php?action=see&id=<?= $record["id"] ?>" style="color:#2f3030;">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="/reports/index.php?action=destroy&id=<?= $record["id"] ?>" style="color:#2f3030;">
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