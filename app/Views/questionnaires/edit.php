<?php
  $id = isset($id) ? $id : $questionnaire['id'];
  $description = isset($description) ? $description : $questionnaire['description'];
  $long_description = isset($long_description) ? $long_description : $questionnaire['long_description'];
?>
<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <?php include VIEWS.'/partials/message.php' ?>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <br>
          <h1 class="text-center">Editar Cuestionario</h1>
          <hr>
          <!-- Inicia el formulario de edit -->
          <form action="/users/index.php?action=update" method="post">
          <div class="form-group">
              <label for="description">Descripción:</label>
              <input
                type="text" class="form-control"
                id="description" name="description"
                placeholder="" value="<?= isset($description) ? $description : ""; ?>">
            </div>
            <div class="form-group">
              <label for="long_description">Descripción larga:</label>
              <textarea class="form-control"
                id="long_description" name="long_description" rows="5" cols="50" style="resize: none;"><?= isset($long_description) ? $long_description : ""; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-secondary" href="/questionnaires/index.php?action=maintenance">Cancelar</a>
          </form>
        </div>
    </div>
  </div>
  <?php include VIEWS.'/partials/footer.php' ?>