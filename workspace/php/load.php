<?php
$verified = true;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $file = fopen("data/data.txt", "r");
    $text = "";
    $lnnum = 0;
    while(!feof($file)){

        $line = fgets($file);
        $x = explode('#', $line);
        
        if($x[0] == $ip){
            $verified = true;
            $lnnum = $lnnum + 1;
            $text = $text."<br><br><strong>".$lnnum.". </strong>".$x[1];
        }
    }

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
          <center>
        <a href = "../index.html">home</a>
        <div class = "container">

        <table>
            <form action = "push.php" method = "POST">
                <div class = "container">
                <tr><td>
      <div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="text"  name = "txt" style = "color:white">
    <label class="mdl-textfield__label" for="sample1" style = "color:white">paste text or url here (include http:// for urls)</label>
  </div>                
                <br><br><tr><td>
                    
                          <div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="text"  style = "color:white" name = "ipcl">
    <label class="mdl-textfield__label" for="sample1" style = "color:white">rID of receiver</label></div>                
</td></tr>
           <tr><td><span style = "color: white">Is this a Link? </span></td><td><input name = "link" value = "y" type = "checkbox"></td></tr>
            <br><br><tr><Td><input type = "submit" value = "Push" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"></Td></tr>
            <br><br></div>
            </form>
            </table>
            
            
            <br>
           
    </body>
</html>