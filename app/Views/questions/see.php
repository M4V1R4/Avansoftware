<?php
    $id = isset($id) ? $id : $question['id'];
    $description = isset($description) ? $description : $question['description'];
    $question_text = isset($question_text) ? $question_text : $question['question_text'];
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
          <h1 class="text-center">Ver Pregunta</h1>
          <hr>
          <!-- Inicia el formulario de ver -->
          
            <div class="form-group">
              <label for="description">Cuestionario:</label>
              <input
                type="text" class="form-control"
                id="description" name="description"
                placeholder="" value="<?= isset($description) ? $description : ""; ?>"  disabled>
            </div>
            <div class="form-group">
              <label for="question_text">Pregunta:</label>
              <input
                type="text" class="form-control"
                id="question_text" name="question_text"
                placeholder="" value="<?= isset($question_text) ? $question_text : ""; ?>"  disabled>
            </div>
            
          <a type="button" class="btn btn-primary">Ver Reporte</a>
          <a href="/questionnaires/index.php?action=edit&id=<?= $id ?>" type="button" class="btn btn-primary">Editar</a>
          <a href="/questionnaires/index.php?action=maintenance" type="button" class="btn btn-primary">Regresar a la lista</a>
        </div>
    </div>
  </div>
  <?php include VIEWS.'/partials/footer.php' ?>