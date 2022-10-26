<?php
// Initialize the session
include 'config.php';
include 'header.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  echo '<script language="javascript">window.location.href="login.php"</script>';
  exit;
}

$user = $_SESSION["username"];
$_SESSION["utilizator_logat"] = 'null';
$sql = "select tip from users WHERE username LIKE  '$user'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  foreach ($row as $key) {
      if ($key == 'administrator') {
        $_SESSION["utilizator_logat"] = 'administrator';
        break;
      }
      if ($key == 'normal') {
        $_SESSION["utilizator_logat"] = 'normal';
        break;
      }
    }
}
}
else {
$_SESSION["utilizator_logat"] = 'guest';}

?>

<!-- inceput Jumbotron -->

<div class="jumbotron p-0 rounded-0 mydiv" style="background:#40916c;" >
  <!-- inceput Card content -->

  <div class="card-body text-center"> <br><br><br><br>
    <!-- Titlu -->

    <b class="card-title my-4 font_meie_script" style="color:#b7e4c7;" > Mihaela Monica Filip </b> <br>
    <!-- Button catre pagina despre-->

    <a href="despre.php" class="btn btn-default btn-lg active" role="button" style="color:#52B788;"
    aria-disabled="true" aria-pressed="false" autocomplete="off">Citește mai multe</a>
    <br><br><br><br><br><br><br><br>
  </div>
</div>
<!-- sfarsit Jumbotron -->

<?php include 'footer.php';?>
