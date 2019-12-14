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
          <h1 class="text-center">Crear Pregunta</h1>
          <hr>
          <!-- Inicia el formulario de create -->
          <form action="/questions/index.php?action=store" method="post">
          <div class="form-group">
            <input  id="questionnaire_id" name="questionnaire_id" type="hidden" value="<?=$_GET['id']?>">
              <label for="question_text">Pregunta:</label>
              <input
                type="text" class="form-control"
                id="question_text" name="question_text"
                placeholder="" value="<?= isset($question_text) ? $question_text : ""; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-secondary" href="/questions/index.php?action=index&id=<?=$_GET['id']?>">Cancelar</a>
          </form>
        </div>
    </div>
  </div>
  <?php include VIEWS.'/partials/footer.php' ?>