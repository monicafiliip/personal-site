<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";
include "header.php";

?>

<!-- inceput container info si poze -->
<div class="container"  style="background-color:#40916C;">
  <div class="row">
    <div class="col text-md-left ml-3 mt-3">
      <br><br>
      <a class="edu">
        <h4 class="scrisheading pb-1"><i class="fas fa-desktop pr-1"></i> Proiecte universitate</h4>
      </a>
      <table class="table">
        <tr>
          <th>Titlu</th>
          <th>Descriere</th>
          <th></th>
          <th></th>
        </tr>


        <?php
        if (@$_POST["salveaza_info"] == "Trimite") {

          $titlu = $_POST['titlu'];
          $descriere = $_POST['descriere'];

          //mysqli_query face rularea interogarii pe baza de date
          $result = mysqli_query($conn, "SELECT titlu, descriere FROM proiecte_universitate where titlu = '$titlu' or descriere = '$descriere'");
          $total = mysqli_num_rows($result);

          // insert unique data
          if($total==0)
          {
            $sqlInsert = "INSERT IGNORE INTO proiecte_universitate (titlu, descriere)
            VALUES ('$titlu', '$descriere');";
            // inserare in bd si daca s a inserat sau nu
            if(!mysqli_query($conn, $sqlInsert)) {
              echo "<br>Nu a functionat"; echo mysqli_error ( $conn );
            }
            // empty fields after submit
            echo '<script language="javascript">window.location.href="proiecte.php"</script>';
          }
          else{
            echo("Please insert again. Data already exists in database");
          }
        }

        $editId = @$_GET['editId'];
        if ($editId) {
          $sqlEdit = "SELECT * FROM proiecte_universitate WHERE id = $editId";
          $result = mysqli_query($conn, $sqlEdit) or die(mysql_error());
          $row = mysqli_fetch_assoc($result);

          $id = $row["id"];
          $titlu = $row["titlu"];
          $descriere = $row["descriere"];
        }

        if (@$_POST['actualizeaza_info'] == 'Actualizeaza') {
          $id = $_POST['id'];
          $titlu = $_POST['titlu'];
          $descriere = $_POST['descriere'];

          $sqlUpdate = "UPDATE proiecte_universitate SET
          titlu = '$titlu',
          descriere = '$descriere'
          WHERE id='$id'";
          $result = mysqli_query($conn, $sqlUpdate) or die(mysql_error());
          echo '<script language="javascript">window.location.href="proiecte.php"</script>';

        }

        // preiau id-ul si sterg in tabela educatie inregistrarea cu id-ul preluat
        $deleteId = @$_GET['deleteId'];
        // echo $deleteId;
        if (!empty($deleteId)) {
          $sqlDelete = "DELETE FROM proiecte_universitate WHERE id='$deleteId'";
          $result = mysqli_query($conn, $sqlDelete) or die(mysql_error());
        }

        $sql = "SELECT * FROM proiecte_universitate";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$row['titlu']."</td>";
          echo "<td>".$row['descriere']."</td>";
          if (isset($_SESSION["utilizator_logat"]) && ($_SESSION["utilizator_logat"] == 'administrator')) {
            echo "<td><a style= color:#081c15; href='proiecte.php?deleteId=".$row["id"]."'><i class='fa fa-trash'></i></a></td>";
            echo "<td><a style= color:#081c15; href='proiecte.php?editId=".$row["id"]."'><i class='fa fa-edit'></i></a></td>";
          }
          else{
            echo "<td></td><td></td>";
          }
          echo "</tr>";
        }
        ?>


        <?php if(!$editId) {
          if (isset($_SESSION["utilizator_logat"]) && ($_SESSION["utilizator_logat"] == 'administrator')) {?>
            <!-- datele se salveaza in $_POST dupa submit -->
            <form name="colectare_date" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <input type="hidden" name="id" value="<?php echo @$id;  ?>">
              <div class="mb-3 mt-3">
                <label for="titlu" class="form-label">Titlu *</label>
                <input type="text" class="form-control" id="titlu"  name="titlu" value="<?php echo @$titlu; ?>" required>
              </div>

              <div class="mb-3 mt-3">
                <label for="descriere" class="form-label">Descriere * </label>
                <input type="text" class="form-control" id="descriere"  name="descriere" value="<?php echo @$descriere; ?>" required>
              </div>
              <input type="submit" name="salveaza_info" class="btn btn-default" value="Trimite">
            </form>

          <?php }} else { ?>
            <form name="colectare_date" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <input type="hidden" name="id" value="<?php echo @$id;  ?>">
              <div class="mb-3 mt-3">
                <label for="titlu" class="form-label">Titlu *</label>
                <input type="text" class="form-control" id="titlu"  name="titlu" value="<?php echo @$titlu; ?>" required>
              </div>

              <div class="mb-3 mt-3">
                <label for="descriere" class="form-label">Descriere * </label>
                <input type="text" class="form-control" id="descriere"  name="descriere" value="<?php echo @$descriere; ?>" required>
              </div>
              <input type="submit" name="actualizeaza_info" class="btn btn-default" value="Actualizeaza">
              <form>
              <?php } ?>
              <br><br>
            </table>
            </div>

            <!-- poze proiecte -->
            <div class="container scriscontent" style="text-align:center;">
              <div class="row">
                <div class="col-md-3">
                  <div class="thumbnail imgformat">
                    <img src="./poze/placuta.jpeg"  style="width:100%">
                    <h5><a>Placuta - Amplificatorul în Clasă A</a>  </h5>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="thumbnail imgformat">
                    <img src="./poze/gc.png" style="width:86%" >
                    <h5><a>Identitate vizuală - grafică computerizată</a>  </h5>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="thumbnail imgformat">
                    <img src="./poze/minecraft.jpeg" style="width:100%">
                    <h5><a>Proiectul Minecraft 2D folosind Python</a>  </h5>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="thumbnail imgformat">
                    <img src="./poze/sgd.png" style="width:100%">
                    <h5><a>Proiectul la baze de date - interfață folosind Python și date dintr-o bază de date</a>  </h5><br><br><br>
                  </div>
                </div>
              </div>
            </div><br><br><br>
          </div><br><br><br>
        </div>

        <script>

        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }

        </script>

        <?php include 'footer.php';?>
