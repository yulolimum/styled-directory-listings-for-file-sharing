<?
  if (isset($_POST['src'])) :
    $file_url = $_POST['src'];
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename(str_replace("?+", "", $file_url)) . "\"");
    readfile($file_url);
  else :
    die("Can't access this file directly");
  endif;
?>