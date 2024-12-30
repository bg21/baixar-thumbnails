<?php
if (isset($_GET['youtube_url'])) {
    $youtube_url = $_GET['youtube_url'];

    // Função para extrair o ID do vídeo
    function getYoutubeID($url) {
        preg_match('/(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $url, $matches);
        return $matches[4] ?? null;
    }

    $video_id = getYoutubeID($youtube_url);

    if ($video_id) {
        // Todas as resoluções disponíveis
        $thumbnails = [
            'Default (120x90)' => "https://img.youtube.com/vi/$video_id/default.jpg",
            'Medium (320x180)' => "https://img.youtube.com/vi/$video_id/mqdefault.jpg",
            'High (480x360)' => "https://img.youtube.com/vi/$video_id/hqdefault.jpg",
            'Standard (640x480)' => "https://img.youtube.com/vi/$video_id/sddefault.jpg",
            'High Quality (1280x720)' => "https://img.youtube.com/vi/$video_id/hq720.jpg",
            'Max Resolution Default (1920x1080)' => "https://img.youtube.com/vi/$video_id/maxresdefault.jpg"
        ];

        echo "<!DOCTYPE html>
              <html lang='en'>
              <head>
                  <meta charset='UTF-8'>
                  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                  <title>Thumbnails Disponíveis</title>
                  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet'>
                  <link rel='stylesheet' href='assets/css/styles.css'>
              </head>
              <body>";
              // Inclui o menu
        include 'menu.php';

        echo "<div class='container py-5' style='margin-top: 70px;'>
                      <h1 class='text-center mb-4'>Thumbnails do Vídeo</h1>
                      <div class='row g-4'>";
                      foreach ($thumbnails as $label => $url) {
                        // Identificar resoluções maiores
                        $columnClass = in_array($label, ['High Quality (1280x720)', 'Max Resolution Default (1920x1080)']) ? 'col-12 large-thumbnail' : 'col-md-4';
                    
                        echo "<div class='$columnClass'>
                                <div class='card shadow-sm thumbnail-card h-100'>
                                    <img src='$url' class='card-img-top thumbnail-img' alt='$label'>
                                    <div class='card-body text-center'>
                                        <h5 class='card-title'>$label</h5>
                                        <a href='$url' class='btn btn-primary mt-2' download>Baixar Imagem</a>
                                    </div>
                                </div>
                              </div>";
                    }
                    
        echo "      </div>
                      <div class='text-center mt-4'>
                          <a href='index.php' class='btn btn-secondary'>Voltar</a>
                      </div>
                  </div>
                  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>
              </body>
              </html>";
    } else {
        header('Location: index.php?error=invalid_url');
        exit();
    }
}
