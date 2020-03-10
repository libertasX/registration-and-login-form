<?php
  session_start();

  // Verbindung mit der Datenbank aufnehmen.
  $conn = mysqli_connect("localhost", "root", "", "login");
  $errors = array();

  // Wenn auf "Registrieren" geklickt wurde:
  if(isset($_POST["registrieren"]))
  {

      // Counter "i" zählt für jede falsche Eingabe um eins runter.
      $i = 0;

      $username = $_POST["username"];
      $username = strtolower($username);

      // Bedingungen für "user" werden geprüft.
      if (empty($username)) { // Falls leer:
        array_push($errors, "Benutzername darf nicht leer sein !");
        $i--;
      }

      if(strlen($username) < 4 || strrpos($username, "_") === 0 ||
      preg_match("/^[a-zA-Z0-9_]+$/", $username) == false) {
        $i--;
         //  echo "Fehler bei der User Eingabe.<br />";
      }

      $email = $_POST["email"];
      $email = strtolower($email);

      // Bedingungen für "email" werden geprüft.
      if(empty($email)){ // Wenn leer:
        array_push($errors, "E-Mail darf nicht leer sein !");
        $i--;
      }

      if(preg_match("/[@]/", $email) == false || preg_match("/[.]/", $email) == false)  {
        $i--;

      //  echo "Fehler bei der E-Mail Eingabe.<br />";
      }

      $password = $_POST["password"];

      // Bedingungen für "password" werden geprüft.
      if(empty($password)){ // Wenn leer:
        array_push($errors, "Passwort darf nicht leer sein !");
        $i--;
      }
      if(strlen($password) < 8 || preg_match("/[0-9]/", $password) == false ||
                                  preg_match("/[a-zA-Z]/", $password) == false) {
        //echo "Fehler bei der Passwort Eingabe.<br />";
        $i--;
      }

      $check_query = "SELECT * FROM login_daten WHERE username = '$username' OR email = '$email'";
      $result = mysqli_query($conn, $check_query);
      $check = mysqli_fetch_assoc($result);

      if ($check) { // if user exists
        if ($check['username'] === $username) {
          array_push($errors, "Benutzername vergeben !");
        }

        if ($check['email'] === $email) {
          array_push($errors, "E-Mail existiert bereits !");
        }
    }

      //waren alle Angaben richtig, werden sie in die Datenbank aufgenommen.
      if($i == 0){
        $password = hash('sha256', $password);
      //  echo "<br /> $user <br /> $email <br /> $password<br />";

          // Eingaben in Datenbank afnehmen
          $sql = "INSERT INTO login_daten (username, email, password)
                  VALUES ('$username', '$email', '$password')";

          if (mysqli_query($conn, $sql)) {
            $_SESSION['username'] = $username;
  	        $_SESSION['success'] = "You are now logged in";
  	        header('location: index.php');
              // echo "<br />Neuer Eintrag wurde vorgenommen";
            }

          else {
                // Fehler ausgeben.
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

         // Verbindung mit der Datenbank schließen.
         mysqli_close($conn);
      }


  }

// Wenn auf "Anmelden" geklickt wurde:
  if(isset($_POST["login"])){
    //$user = $_POST["user"];
    $username = $_POST["username"];
    $username = strtolower($username);
    $password = $_POST["password"];
    $password = hash('sha256', $password);

    // Aus der Datenbank auswählen
    $sql = "SELECT * FROM login_daten WHERE username='$username' AND password ='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1){
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');

    }

    else{
      array_push($errors, "Flasche E-Mail/Passwort Kombination!");
    }

  }

 ?>
