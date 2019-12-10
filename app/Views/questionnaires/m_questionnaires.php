<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
  
    <div class="row">
        <div class="col-md-12">
            <br>
            <h1 class="text-center">Matenimiento de Cuestionarios</h1>
            <hr>
            <div class="float-right">
                <a href="/questionnaires/index.php?action=create" type="button" class="btn btn-success">Agregar Cuestionarios</a>
                <hr>
            </div>            
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Cuestionario</th>
                <th scope="col">Preguntas</th>
                <th scope="col">Resultados</th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collection as $record) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $record["id"] ?></th>
                    <td><?= $record["description"] ?></td>
                    <td><a href="/questions/index.php?action=index&id=<?= $record["id"] ?>" class="btn btn-info">Preguntas</a></td>
                    <td><a href="" class="btn btn-info">Resultados</a></td>
                
                    <td class="text-center">
                        <a class="btn btn-info" href="/questionnaires/index.php?action=see&id=<?= $record["id"] ?>" style="color:#ffffff;">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-info" href="/questionnaires/index.php?action=edit&id=<?= $record["id"] ?>" style="color:#ffffff;">
                            <i class="fas fa-edit" ></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-info" href="/questionnaires/index.php?action=destroy&id=<?= $record["id"] ?>" style="color:#ffffff;">
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