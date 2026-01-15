<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- <form action="./form.php" method="post">
    <p>
        Nome: <input type="text" name="nome">
    </p>
    <p>
        Email: <input type="text" name="email">
    </p>
    <br>
    <input type="submit"> -->
    <div class="container">
        <div class="bloco1">
            <h1>Formulário</h1>
            <div class="blocoFormulario">
                <form action="./form.php" method="post">
                    <div class="blocoTexto">
                        <input type="text" name="name" id="nome" placeholder="Nome">
                    </div>
                    <div class="blocoTexto">
                        <input type="text" name="mail" id="email" placeholder="Email">
                    </div>
                    <div class="blocoTexto">
                        <input type="textarea" name="textarea" id="textarea" placeholder="Descricao">
                    </div>
                    <div class="button">
                        <input type="submit" value="Enviar" class="buttonEnviar">
                    </div>
                </form>
            </div>
        </div>
        <div class="bloco2">
            <h1>Dados do Formulário</h1>
            <div class="blocoFormulario">
                <form action="./form.php" method="post">
                    <div class="blocoTexto">
                        <input type="text" name="name" id="nome" placeholder="Nome">
                    </div>
                    <div class="blocoTexto">
                        <input type="text" name="mail" id="email" placeholder="Email">
                    </div>
                    <div class="blocoTexto">
                        <input type="textarea" name="textarea" id="textarea" placeholder="Descricao">
                    </div>
                    <div class="button">
                        <input type="submit" value="Enviar" class="buttonEnviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
</body>
</html>