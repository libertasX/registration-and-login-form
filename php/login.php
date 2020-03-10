
<?php include("server.php");  ?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8" lang="de"/>
  <link rel="stylesheet" href=" ../css/main.css">
  <title>Anmelden</title>

</head>

<body>
  <div class="login">
    <form action="login.php"  method="POST" id="form_login">
      <?php include("errors.php");  ?>

      <input type="text" id="username" name="username" placeholder="Benutzername" autocomplete="off" maxlength="25"/>
      <br />
      <input type="password" id="password" name="password" placeholder="Passwort">
      <br />
      <input type="submit" name="login" value="Anmelden">
      <br />
      <p class="hinweis">Noch kein Mitglied ?<a href="registrieren.php"> Jetzt Registrieren</a> </p>

    </form>

  </div>

</body>

</html>
