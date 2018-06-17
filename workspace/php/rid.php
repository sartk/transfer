<?php
    $file = fopen("data/users.txt", "a+");
    $text = "";
    $lnnum = 0;
    $pwid = rand(0, 100000);
    $rid = rand(0, 100000);
    while(!feof($file)){
        $rid = rand(0, 100000);
        $line = fgets($file);
        $x = explode('#', $line);
        if($x[0] == $rid){
            $rid = rand(0,100000);
        }
        if($x[0] == $pwid){
            $pwid = rand(0, 100000);
        }

    }
    fwrite($file, ("\n".$rid."#".$pwid."\n"));
    fclose($file);
?>
<!DOCTYPE html>
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
  

            <a href = "../index.html">home</a>
     <span class="mdl-chip">
    <span class="mdl-chip__text">
Your temporary rID is <?php echo $rid;?>. When you upload a file or push text, use this key. And on the receiver device, use this key to download/pull it.</span></span>
</body>
</html>