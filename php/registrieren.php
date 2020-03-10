<?php include("server.php");  ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" lang="de">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/main.js"></script>
    <title>Registrieren</title>

</head>

<body>

<div class ="header"></div>
  <div class = "mainpage">
     <p class="main_text">Auf der rechten Seite kannst du dich Registrieren.<br><br> Klar was ich meine !?
     </p>
    <div class="registrieren">

       <form action="registrieren.php" method="post" id="form_registrieren">
         <?php include("errors.php");  ?>


         <input type="text" id="username" name="username"  placeholder="Benutzername" autocomplete="off" maxlength="25" onkeyup="UserName()">
         <br>

         <input type="text" id="email"name="email" placeholder="E-Mail" autocomplete="off" onkeyup="UserEmail()">
         <br>

         <input type="password" id="password" name="password" placeholder="Passwort" onkeyup="UserPassword()">
         <br>

         <p class="password_info">Bitte sorge dafür, dass dein Passwort aus mindestens <strong>8</strong>
                   Zeichen besteht. Es muss mindestens eine <strong>Zahl</strong>
                   enthalten sein.</p>

         <p class="hinweis">Mit Klick auf "Registrieren" stimmst du unseren <a href="../txt/agb.txt" target="_blank">AGB's</a> zu.
                 In unseren <a href="../txt/datenschutz.txt" target="_blank">Datenschutzrichtlinien</a> kannst du erfahren, wie wir deine
                 Daten erfassen, verwenden und teilen. </p>

         <input type="submit" name="registrieren" value="Registrieren">
         <p class="member">Schon Mitglied ? <a href="login.php">Jetzt Anmelden</a></p>

       </form>

    </div>
  </div>

    <div class="footer"></div>

</body>

</html>
