<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <br>
            <h1 class="text-center">Cuestionario: <?= $questionnaire['description'] ?></h1>
            <hr>
            <div class="question" style="background-color:blue;">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tenetur cumque, dolores, reiciendis corporis at odio eum est consectetur quisquam nemo adipisci, quas exercitationem laudantium quam numquam deleniti rerum repellendus.</p>
            </div>
            <div class="answers" style="background-color:lightblue;">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla obcaecati excepturi officia quia soluta eveniet! Magni accusamus ea in, nostrum eius doloribus ducimus omnis porro obcaecati quia maxime repudiandae nam?</p>
            </div>
            <div class="buttons clearfix">
                <button type="button" class="btn btn-secondary float-left" style="display: none;">Anterior</button>
                <button type="button" class="btn btn-secondary float-right">Siguiente</button>
            </div>
        </div>
    </div>
    </div>
  <?php include VIEWS.'/partials/footer.php' ?>