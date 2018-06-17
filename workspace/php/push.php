<?php
$iprec = $_POST["ipcl"];
$textval = $_POST["txt"];
$link = $_POST["link"];


    if (strpos($textval, '#') == false && $textval!=="") {
        $myfile = fopen("data/data.txt", "a+");
        if($link == "y"){
             $txt = "".$iprec."#<a href = \"".$textval."\">".$textval."</a>";
        }
        else{
        $txt = "".$iprec."#".$textval."\n";
        }
        fwrite($myfile, $txt."\n");
    }

    fclose($myfile);
    echo "<script>
    alert(\"Text pushed successfully\");
    window.location = \"load.php\";</script>"
?>
<html>
    
</html>