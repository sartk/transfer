<?php
error_reporting(E_ERROR | E_PARSE);
$rid = $_POST["rid"];
$ridtest = false;
$file = fopen("data/data.txt", "r");
$ridtest = true;
    while(!feof($file)){

        $line = fgets($file);
        $x = explode('#', $line);
        if($x[0] == $rid){
            $ridtest = true;
        }
    }

    fclose($file);
if($ridtest == true){

    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if (file_exists($target_file)) {
         echo "Sorry, file cannot upload (File might already exist, try renaming your file).";
         $uploadOk = 0;
    } 
    $mb = 1000000;
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > (10*$mb)) {
        echo "Sorry, your file is too large.";
     $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    mkdir("/home/ubuntu/workspace/php/uploads/".$rid."/", 0700);
    
    /***
     FAILED ATTEMPT AT USING HTACCESS TO VALIDATE USER and disallow rid typing into the url
     
    $htac = fopen("uploads/".$rid."/.htaccess", "w");
    $txt = "AuthUserFile " . "/home/ubuntu/workspace/php/uploads/". $rid . "/.htpasswd\nAuthName \"Login with your rID and password\"\nAuthType Basic\nrequire user ".$rid."\n";
    fwrite($htac, $txt);
    fclose($htac);
    $rpwd = "error";
    $users = fopen("data/users.txt", "r");
    while(!feof($users)){

        $line = fgets($users);
        $x = explode('#', $line);
        
        if($x[0] == $rid){
            $rpwd = $x[1];
            
        }
    }
    fclose($users);
    $htpa = fopen("uploads/".$rid."/.htpasswd", "w");
    $txt = $rid . ":" . crypt($rpwd, base64_encode($rpwd));

    fwrite($htpa, $txt);
    fclose($htpa);
        unlink("uploads/.htaccess");
    unlink("uploads/.htpasswd");

    ***/

    $target_dir = "uploads/".$rid."/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $tv = "blank";
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $myfile = fopen("data/uploadlist.txt", "a+");
        $txt = "" . $rid . "#<a href = \"" . $target_file . "\">".basename( $_FILES["fileToUpload"]["name"]) . "</a>";
        
        if($txt !== "#"){
            fwrite($myfile, $txt."\n");
        } 
        fclose($myfile);
        $tv = "full";
     } else {
         $tv = "full";
        echo "Your file is yet to be uploaded!";
     }
    }
}


?>
<html>
      <head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </head>

<body>
    <center>
        <style>
.demo-layout-transparent {
  background: url('../css/light-wp.png') center / cover;
}
.demo-layout-transparent .mdl-layout__header,
.demo-layout-transparent .mdl-layout__drawer-button {
  /* This background is dark, so we set text to white. Use 87% black instead if
     your background is light. */
  color: white;
}
</style>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">File Transfer Tool </span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="">built with html, css, javascript, jquery, php, and mdl</a>
      <a class="mdl-navigation__link" href="">Sarthak Kamat</a>
      </nav>
    </div>
  </header>
<center>
                <a href = "../index.html">home</a>
<br><br><br><br>
        <form action="upload.php" method="post" enctype="multipart/form-data">

            <input type="file" name="fileToUpload" id="fileToUpload" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">


                          <div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="text"  style = "color:white" name = "rid">
    <label class="mdl-textfield__label" for="sample1" style = "color:white">rID of receiver</label></div> 
    
            <input type="submit" value="Upload Files" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
        </form>
    </center></body>
</html>