<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/style.css" />
    <meta charset="ISO-8859-1">
<style>
  body{
  padding: 0;
}

  tr{
  cursor: pointer;
  }
td{
  height: 70px;
}
td img{
  height: 100%;
}
</style>
  </head>
  <body>
    <div class="wrap red">
      <table>
    <?php
    $listFile = "list.txt";
$docRoot = $_SERVER['DOCUMENT_ROOT'];

function listDir($dir, $listFile) {
    $dir = urldecode($dir);
    $result = array(array());

    $lines = file($dir.$listFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    for($i = 0; $i < count($lines); $i+=3) {
        $result[$i] = [$lines[$i],$lines[$i+1],$lines[$i+2]];
    }

    return $result;
}   
         
$regex = "^((.*)\.(.*)|(.*))$";
$var = $_SERVER['REQUEST_URI'];

if( file_exists( $docRoot.$var.$listFile ) ){
        echo "<tr><td><img src=\"/icon/pardir.png\"></img></td><td><a href=\"..\">Parent dir</a></td><td>Parent dir</td></tr>";
    foreach(listDir("C:/Users/thbaa002/Ullern VGS/2STA/TekForsk/nettside/Quadcopter/QuadcopterRemade".$var, $listFile) as $file) {
        Preg_match_all("/$regex/siU", $file[0], $matches, PREG_SET_ORDER);
        echo "<tr><td><img src=\"/icon/".$matches[0][3].".png\"></img></td><td><a href=\"$file[0]\">".$file[0]."</a></td><td>".$file[2]."</td></tr>";
    }
} else {
    echo "Directory not open for editing. If you think this is an error, please contact system admin<br />\n";
    echo "<a href=\"..\">Parent dir</a>";
}
       ?>
       </table>
    </div>
  </body>
</html>
