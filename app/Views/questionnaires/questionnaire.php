<?php include VIEWS.'/partials/header.php' ?>
<?php include VIEWS.'/partials/navbar.php' ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <br>
            <h1 class="text-center">Cuestionario: <?= $questionnaire['description'] ?></h1>
            <hr>
            <div class="error_box" id="error_box">
                <p>Se produjo un error al cargar la pregunta</p>
            </div>
            <div id="question"class="question" style="background-color:blue;">
            </div>
            <div id="answer" class="answer" style="background-color:lightblue;">
            </div>
            <div class="buttons clearfix">
                <button type="button" class="btn btn-secondary float-left" style="display: none;">Anterior</button>
                <button type="button" class="btn btn-secondary float-right">Siguiente</button>
            </div>
        </div>
    </div>
    </div>
    </div>
    <footer>
        <script src="/assets/js/jquery-3.3.1.min.js" charset="utf-8"></script>
        <script src="/assets/js/bootstrap.bundle.min.js" charset="utf-8"></script>
        <script src="/assets/js/ajax.js" charset="utf-8"></script>
    </footer>
</body>