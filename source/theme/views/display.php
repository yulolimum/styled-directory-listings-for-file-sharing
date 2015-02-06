<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/theme/stylesheets/style.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <? include("../layouts/header.html"); ?>

      <div class="content-container <?= $_GET['type'] == "image" ? 'img' : '' ?>">
        <? if ($_GET['type'] == "image") : ?>

          <a class="img-full" href="<?=$_GET['src']?>?+" target="_blank">
            <img src="<?=$_GET['src']?>?+" />
          </a>

        <? elseif ($_GET['type'] == "video") : ?>

          <script type="text/javascript" src="//cdn.sublimevideo.net/js/ibvjcopp.js"></script>
          <video id="<?=$_GET["src"]?>?+" class="sublime" width="100%" height="90%" data-uid="<?=$_GET["src"]?>?+" data-autoplay="true" data-autoresize="fit">
            <source src="<?=$_GET["src"]?>?+" />
          </video>

        <? else : ?>

          <div class="file-name">File: <span><?=$_GET["src"]?></span></div>
          <img src="/theme/images/no-preview.png" />

        <? endif ; ?>
      </div>

      <div class="download">
        <form action="/theme/views/download.php?+" method="post">
          <input type="hidden" name="src" value="http://<?=$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']?>?+"/>
          <button>Download</button>
        </form>
      </div>

    <? include("../layouts/footer.html"); ?>
  </body>
</html>