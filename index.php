<?php
include("Filme.php");
include("Sessao3d.php");

session_start();

if (!isset($_SESSION["cards"])) {
    $_SESSION["cards"] = [];
}

if (isset($_GET["limpar"])) {
    $_SESSION["cards"] = [];
    header("Location: index.php");
    exit;
}


if (isset($_POST["tipo"]) && $_POST["tipo"] === "filme") {
    $filme = new Filme(
        htmlspecialchars($_POST["titulo"]),
        htmlspecialchars($_POST["classificacao"])
    );
    $filme->setValor((float) $_POST["valor"]);

    $_SESSION["cards"][] = $filme;
    header("Location: index.php");
    exit;
}

if (isset($_POST["tipo"]) && $_POST["tipo"] === "sessao3d") {
    $sessao = new Sessao3D(
        htmlspecialchars($_POST["titulo"]),
        htmlspecialchars($_POST["classificacao"]),
        (float) $_POST["taxa3d"]
    );
    $sessao->valorAdicional((float) $_POST["taxa3d"]);
    $sessao->aplicarValorAdicional((float) $_POST["valor"]);

    $_SESSION["cards"][] = $sessao;
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinema</title>
    <link rel="stylesheet" href="style-cinema.css">
</head>

<body>

    <div class="topo">

        <div>
            <h2>Cadastrar Filme</h2>
            <form method="POST">
                <input type="hidden" name="tipo" value="filme">

                Título do filme:
                <input type="text" name="titulo" required>
                <br><br>

                Classificação:
                <input type="text" name="classificacao" required>
                <br><br>

                Valor do ingresso:
                <input type="number" name="valor" step="0.01" required>
                <br><br>

                <button type="submit">Cadastrar Filme</button>
            </form>
        </div>

        <div>
            <h2>Cadastrar Sessão 3D</h2>
            <form method="POST">
                <input type="hidden" name="tipo" value="sessao3d">

                Título do filme:
                <input type="text" name="titulo" required>
                <br><br>

                Classificação:
                <input type="text" name="classificacao" required>
                <br><br>

                Valor do ingresso:
                <input type="number" name="valor" step="0.01" required>
                <br><br>

                Taxa 3D:
                <input type="number" name="taxa3d" step="0.01" required>
                <br><br>

                <button type="submit" class="tres-d">Cadastrar Sessão 3D</button>
            </form>
        </div>

    </div>

    <div class="baixo">

        <?php if (!empty($_SESSION["cards"])) { ?>
            <a class="limpar" href="index.php?limpar=1">Limpar cards</a>
        <?php } ?>

        <div class="cards">
            <?php foreach ($_SESSION["cards"] as $item) { 
                
                ?>

                <?php if ($item instanceof Sessao3D) { 
                    
                    ?>

                    <div class="banner sessao3d">
                        <?php Filme::cinema(); ?>
                        <span class="selo">3D</span>

                        <p><?php echo "Filme: " . $item->titulo; ?></p>

                        <?php $item->informacao(); ?>

                        <p>Classificação: <?php echo $item->classificacao; ?></p>
                        <p>Taxa 3D: R$ <?php echo number_format($item->taxa3d, 2, ',', '.'); ?></p>

                        <p class="preco">
                            Ingresso: R$ <?php echo number_format($item->getValor(), 2, ',', '.'); ?>
                        </p>
                    </div>

                <?php } else { ?>

                    <div class="banner">
                        <?php Filme::cinema(); ?>
                        <span class="selo">Filme</span>
                        <p><?php echo "Filme: ". $item->titulo; ?></p>

                        <?php $item->informacao(); ?>

                        <p>Classificação: <?php echo $item->classificacao; ?></p>

                        <p class="preco">
                            Ingresso: R$ <?php echo number_format($item->getValor(), 2, ',', '.'); ?>
                        </p>
                    </div>

                <?php } ?>

            <?php } ?>
        </div>

    </div>

</body>
</html>