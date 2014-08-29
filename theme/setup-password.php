<?
  if (file_exists(__DIR__."/..".strtok($_SERVER["REQUEST_URI"],'?').".htpasswd")) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'good', 'result' => 'password already set up']);
    die();
  } else {
    if ($_POST['password'] != "" && $_POST['username'] != ""){

      // write htpasswd
      $my_file = __DIR__."/..".strtok($_SERVER["REQUEST_URI"],'?').'.htpasswd';
      $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
      $data = $_POST['username'] . ":" . crypt($_POST['password'], base64_encode($_POST['password']));;
      fwrite($handle, $data);

      // write htaccess
      $htaccess = "\nAuthType Basic\nAuthName \"Admin\"\nAuthUserFile " . __DIR__."/..".strtok($_SERVER["REQUEST_URI"],'?').".htpasswd\nRequire valid-user\n\n<Files ?*>\nOrder allow,deny\nAllow from all\nSatisfy any\n</Files>\n";
      file_put_contents(__DIR__."/..".strtok($_SERVER["REQUEST_URI"],'?').'.htaccess',$htaccess ,FILE_APPEND);
      header('Location: ./');

    } else { ?>




      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
          <link rel="stylesheet" href="/theme/style.css" type="text/css" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
        <body>
          <div class="header">
            <div class="logo">
              <a href="http://clearsightstudio.com"><img src="/theme/logo.png" /></a>
            </div>
          </div>

          <div class="wrapper">

            <div class="content-container">
              <form id="signup" method="post" action="?setup-password">
                <p >Create a user/password for your directory.</p>
                <input name="referrer" type="hidden" value="<?=$_SERVER['HTTP_REFERRER']?>"/>
                <input name="username" type="text" placeholder="Username"/>
                <input name="password" type="password" placeholder="Password" />
                <button>Submit</button>
              </form>
            </div>
          </div>
          <!--/.wrapper-->
          <div class="footer">
            <a href="https://clearsightstudio.com"/>ClearSight Studio</a> file sharing.
          </div>
        </body>
      </html>


    <? }
  }
?>