<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
  
    <div class="row">
        <div class="col-md-12">
            <br>
            <h1 class="text-center">Mis Resultados</h1>
            <hr>
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Cuestionario</th>
                <th scope="col">Puntos</th>
                <th scope="col">Resultado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collection as $record) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $record["id"] ?></th>
                    <td><?= $record["description"] ?></td>
                    <td class="text-center">
                        <a type="button" class="btn btn-primary" href="/users/index.php?action=see&id=<?=$record["id"]?>" >Responder</a>
                    </td>                    
                </tr>
                <?php endforeach; ?>
             </tbody>
            </table>
        </div>
    </div>
    </div>
  <?php include VIEWS.'/partials/footer.php' ?>