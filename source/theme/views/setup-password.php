<?
  if (file_exists(__DIR__."/../..".strtok($_SERVER["REQUEST_URI"],'?').".htpasswd")) :
    header('Content-Type: application/json');
    echo json_encode(['status' => 'good', 'result' => 'password already set up']);
    die();
  else :

    if (isset($_POST['password']) && isset($_POST['username'])) :

      // write htpasswd
      $my_file = __DIR__."/../..".strtok($_SERVER["REQUEST_URI"],'?').'.htpasswd';
      $handle  = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
      $data    = $_POST['username'] . ":" . crypt($_POST['password'], base64_encode($_POST['password']));;
      fwrite($handle, $data);

      // write htaccess
      $htaccess = "\nAuthType Basic\nAuthName \"Admin\"\nAuthUserFile " . __DIR__."/../..".strtok($_SERVER["REQUEST_URI"],'?').".htpasswd\nRequire valid-user\n\n<Files ?*>\nOrder allow,deny\nAllow from all\nSatisfy any\n</Files>\n";
      file_put_contents(__DIR__."/../..".strtok($_SERVER["REQUEST_URI"],'?').'.htaccess',$htaccess ,FILE_APPEND);
      header('Location: ./');

    else : ?>

      <!DOCTYPE html>
      <html>
        <head>
          <link rel="stylesheet" href="/theme/stylesheets/style.css" type="text/css" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>

        <body>
          <? include("../layouts/header.html"); ?>

            <div class="content-container">
              <form id="signup" method="post" action="?setup-password">
                <p >Create a user/password for your directory.</p>
                <input name="referrer" type="hidden" value="<?=$_SERVER['HTTP_REFERRER']?>"/>
                <input name="username" type="text" placeholder="Username"/>
                <input name="password" type="password" placeholder="Password" />
                <button>Submit</button>
              </form>
            </div>

          <? include("../layouts/footer.html"); ?>
        </body>
      </html>

    <? endif; ?>
  <? endif;
?>