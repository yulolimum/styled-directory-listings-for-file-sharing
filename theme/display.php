<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <link rel="stylesheet" href="/theme/style.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5335e5ef61f1ce81"></script>
    <script>var addthis_config = {"data_track_addressbar":false, data_track_clickback: false }</script>
  </head>
  <body>
    <div class="header">
      <div class="logo">
        <a href="http://clearsightstudio.com"><img src="/theme/logo.png" /></a>
      </div>
      <div class="social">
        <div class="share-button-container addthis_toolbox addthis_default_style addthis_32x32_style" addthis:title="ClearSight Studio file sharing link.">
          <a href="#" class="addthis_button_email share-button"><img src="/theme/social-email.png" /></a>
          <a href="#" class="addthis_button_facebook share-button"><img src="/theme/social-facebook.png" /></a>
          <a href="#" class="addthis_button_twitter share-button"><img src="/theme/social-twitter.png" /></a>
          <a href="#" class="addthis_button_google_plusone_share share-button"><img src="/theme/social-google.png" /></a>
        </div>
      </div>
    </div>

    <div class="wrapper">

      <div class="content-container">
        <? if ($_GET['type'] == "image") :?>
          <a class="img-full" href="<?=$_GET['src']?>?+" target="_blank">
            <img src="<?=$_GET['src']?>?+" />
          </a>

        <? elseif ($_GET['type'] == "video") : ?>
          <script type="text/javascript" src="//cdn.sublimevideo.net/js/dtddv4tp.js"></script>
          <video id="<?=$_GET["src"]?>?+" class="sublime" width="100%" height="90%" data-uid="<?=$_GET["src"]?>?+" data-autoplay="true" data-autoresize="fit">
            <source src="<?=$_GET["src"]?>?+" />
          </video>

        <? else : ?>
          <div class="file-name">File: <span><?=$_GET["src"]?></span></div>
          <img src="/theme/no-preview.png" />
        <? endif ; ?>
      </div>

      <div class="download">
        <form action="/theme/download.php?+" method="post">
          <input type="hidden" name="src" value="http://<?=$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']?>?+"/>
          <button>Download</button>
        </form>
      </div>
    </div>
    <!--/.wrapper-->
    <div class="footer">
      <a href="https://clearsightstudio.com"/>ClearSight Studio</a> file sharing.
    </div>
    <!--/.footer-->
    <script>
      // grab the 2nd child and add the parent class. tr:nth-child(2)
      document.getElementsByTagName('tr')[1].className = 'parent';
    </script>
  </body>
</html>