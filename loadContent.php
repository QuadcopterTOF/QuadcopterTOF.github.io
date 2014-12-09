<?php
//NavBox
if(isset($_GET["page"])) {
    $input = file_get_contents($_GET["page"]);
}else{
    $input = file_get_contents("about.html");
}
$regexp = "<a name=\"([^\"]*)\">(.*)<\/a>";
if(preg_match_all("/$regexp/iU", $input, $matches, PREG_SET_ORDER)) {
    echo '<div class="karsteBox">
<ul>';
        foreach($matches as $match){
            echo "<a href=\"#$match[1]\"><li>$match[2]</li></a>";
        }
        echo '</ul>
</div>';
}

if( isset($_GET["page"]) ) {
    include $_GET["page"];
} else {
    include 'about.html';
}
?>