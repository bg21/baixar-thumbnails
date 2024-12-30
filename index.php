<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baixar Thumbnails do YouTube</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<?php include 'menu.php'; ?>

    <div class="container py-5 mt-5">
        <!-- Header -->
        <h1 class="text-center mb-4">Baixar Thumbnails do YouTube</h1>

        <!-- Formulário -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="GET" action="process.php" class="card p-4 shadow-sm">
                    <div class="mb-3">
                        <label for="youtube_url" class="form-label">URL do Vídeo</label>
                        <input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="Cole a URL do vídeo aqui" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Obter Thumbnails</button>
                </form>
                <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_url'): ?>
                    <div class="alert alert-danger mt-3">URL inválida. Por favor, insira um link válido do YouTube.</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sobre a ferramenta -->
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-3">Sobre a Ferramenta</h2>
                        <p class="card-text text-justify">
                            Esta ferramenta foi criada para facilitar o download de miniaturas de vídeos do YouTube.
                            Basta inserir o link do vídeo, e você terá acesso às thumbnails em diferentes tamanhos, como
                            <strong>120x90</strong>, <strong>320x180</strong>, <strong>480x360</strong>, e até a resolução máxima
                            disponível. É uma solução prática para criadores de conteúdo, designers, ou qualquer pessoa que precise
                            dessas imagens de forma rápida e eficiente.
                        </p>
                        <p class="card-text text-justify">
                            A ferramenta é gratuita e pode ser usada diretamente no navegador, sem a necessidade de downloads ou
                            instalações. Aproveite!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>