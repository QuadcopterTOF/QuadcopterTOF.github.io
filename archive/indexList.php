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
  height: 70px;
  cursor: pointer;
  }
</style>
  </head>
  <body>
    <div class="wrap red">
    <?php

       function listDir($dir) {
           $dir = urldecode($dir);
           $result = array();
           $handler = opendir($dir);

           while( $file = readdir($handler) ) {
               if( !ereg("(^\.|~$)", $file) ){
                   $result[] = $file;
               }
           }
           closedir($handler);
           return $result;
       }   
         
       $regex = "^((.*)\.(.*)|(.*))$";
       $var = $_SERVER['REQUEST_URI'];
       echo "<table>\n";
       echo "\t\t<tr onclick=\"location = this.getElementsByTagName('a')[0]\">\n\t\t\t";
       echo "<td class=\"icon\"><a href=\"..\"><img src=\"/icon/pardir.png\"></img></a></td><td>Parent Dir</td>";
       echo "<td>Directory</td>";
       echo "\n\t\t</tr>\n";

       foreach(listDir("C:/Users/thbaa002/Ullern VGS/2STA/TekForsk/nettside/Quadcopter/QuadcopterRemade".$var) as $line) {
           if($line !== "indexList.php") {
           Preg_match_all("/$regex/siU", $line, $matches, PREG_SET_ORDER);
           echo "\t\t<tr onclick=\"location = this.getElementsByTagName('a')[0]\">\n\t\t\t";
           if($matches[0][3] != "") {
               echo "<td class=\"icon\"><a href=\"".$matches[0][0]."\"><img src=\"/icon/".$matches[0][3].".png\"></img></a></td><td>".$matches[0][0]."</td>";
               echo "<td>".strtoupper($matches[0][3])."</td>";
           }else{
               echo "<td class=\"icon\"><a href=\"".$matches[0][0]."\"><img src=\"/icon/dir.png\"></img></a></td><td>".$matches[0][0]."</td>";
               echo "<td>Directory</td>";
           }
           echo "\n\t\t</tr>\n";
           }
       }
       echo "</table>";
       ?>
    </div>
  </body>
</html>
