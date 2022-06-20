<?php
  if(isset($_POST['button'])){
    $imgUrl = $_POST['imgurl'];
    $ch = curl_init($imgUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $downloadImg = curl_exec($ch);
    curl_close($ch);
    header('Content-type: image/jpg');
    header('Content-Disposition: attachment;filename="thumbnail.jpg"');
    echo $downloadImg;
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <script src="assets/js/script.js"></script>

    <title>Thumbnail URL-PHP</title>

</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <header>Download de Thumbnail</header>
        <div class="url-input">
          <span class="title">Cole a url do vídeo:</span>
          <div class="field">
            <input type="text" placeholder="https://www.youtube.com/watch?v=R3n3-e_xmUY" required>
            <input class="hidden-input" type="hidden" name="imgurl">
            <span class="bottom-line"></span>
          </div>
        </div>
        <div class="preview-area">
          <img class="thumbnail" src="" alt="">
          <i class="icon fas fa-cloud-download-alt"></i>
          <span>Cole a url do vídeo e veja um preview</span>
        </div>
        <button class="download-btn" type="submit" name="button">Baixar Thumbnail</button>
      </form>
</body>
</html>