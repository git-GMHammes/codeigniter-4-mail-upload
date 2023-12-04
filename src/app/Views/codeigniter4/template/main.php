<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Template</title>
</head>

<body>
    <?php if ($loadView !== array()) : ?>
        <?php foreach ($loadView as $getView) : ?>
            <?php
            echo view($getView);
            ?>
        <?php endforeach ?>
    <?php else : ?>
        <?php
        $responses = 'Variável $loadView não foi passada';
        ?>
        <div class="container">
            &nbsp;
        </div>
    <?php endif; ?>
    <script>
        document.getElementById('uploadForm').onsubmit = function(e) {
            var fileInput = document.getElementById('myFile');
            var file = fileInput.files[0];
            if (file && file.size > 8388608) { // 8MB em bytes
                // Limpar o campo de arquivo
                fileInput.value = '';
                // Informar ao usuário
                alert('O arquivo é muito grande! O tamanho máximo permitido é 8MB.');
                e.preventDefault();
            }
        };
    </script>
</body>

</html>