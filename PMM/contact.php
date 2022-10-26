<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";
include "header.php";

?>


<div class="container"  style="background-color:#40916C;">
  <br><br>
  <div class="row">
    <div class="col text-md-left ml-3 mt-3">
      <a  class="edu">
        <h4 class="scrisheading pb-1"><i class="fas fa-phone "></i> Pagină de contact</h4>
      </a>
    </div>
  </div><br>
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-body">
            <div class="form-header blue accent-1 scrisheading">
              <h3><i class="fas fa-envelope "></i> Scrie-mi</h3>
            </div>
            <p>Pentru păreri, gânduri sau sugestii, scrieți-mi:</p>
            <br>

            <table class="table">
              <tr>
                <th>Nume</th>
                <th>Comentarii</th>
                <th></th>
                <th></th>
              </tr>

              <?php

              // verificam daca s a dat click pe submit
              if (@$_POST["salveaza_info"] == "Trimite") {
                //
                $nume = $_POST['nume'];
                $email = $_POST['email'];
                $comentariu = $_POST['comentariu'];
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  //mysqli_query face rularea interogarii pe baza de date
                  $result = mysqli_query($conn, "SELECT nume, email, comentariu FROM comments where nume = '$nume' or email = '$email' or comentariu='$comentariu'");
                  $total = mysqli_num_rows($result);

                  // insert unique data
                  if($total==0)
                  {
                    $sqlInsert = "INSERT IGNORE INTO comments (nume, email, comentariu)
                    VALUES ('$nume', '$email', '$comentariu');";
                    // inserare in bd si daca s a inserat sau nu
                    if(!mysqli_query($conn, $sqlInsert)) {
                      echo "<br>Nu a functionat"; echo mysqli_error ( $conn );
                    }
                    // empty fields after submit
                    echo '<script language="javascript">window.location.href="contact.php"</script>';
                  }

                }
                else{
                  echo("$email is not a valid email address");
                }
              }


              $editId = @$_GET['editId'];
              if ($editId) {
                $sqlEdit = "SELECT * FROM comments WHERE id = $editId";
                $result = mysqli_query($conn, $sqlEdit) or die(mysql_error());
                //mysqli_fetch_assoc preia inreg din bd si salveaza in variabila row
                $row = mysqli_fetch_assoc($result);
                // preia inreg din baza dd si salv in var row
                $id = $row["id"];
                $nume = $row["nume"];
                $email = $row["email"];
                $comentariu = $row["comentariu"];
              }


              if (@$_POST['actualizeaza_info'] == 'Actualizeaza') {
                // preiau datele din post pentru actualizare
                $id = $_POST['id'];
                $nume = $_POST['nume'];
                $email = $_POST['email'];
                $comentariu = $_POST['comentariu'];

                $sqlUpdate = "UPDATE comments SET
                nume = '$nume',
                email = '$email',
                comentariu = '$comentariu'
                WHERE id='$id'";
                $result = mysqli_query($conn, $sqlUpdate) or die(mysql_error());
                echo '<script language="javascript">window.location.href="contact.php"</script>';

              }

              // preiau id-ul si sterg in tabela educatie inregistrarea cu id-ul preluat
              $deleteId = @$_GET['deleteId'];
              // echo $deleteId;
              if (!empty($deleteId)) {
                $sqlDelete = "DELETE FROM comments WHERE id='$deleteId'";
                $result = mysqli_query($conn, $sqlDelete) or die(mysql_error());
              }

              $sql = "SELECT * FROM comments";
              $result = mysqli_query($conn, $sql);
              //mysqli_fetch_assoc preia inreg din bd si salveaza in variabila row

              while($row = mysqli_fetch_assoc($result)) {
                //rand nou
                echo "<tr>";
                //concatenare cu .
                echo "<td>".$row['nume']."</td>";
                echo "<td>".$row['comentariu']."</td>";
                if (isset($_SESSION["utilizator_logat"]) && ($_SESSION["utilizator_logat"] == 'administrator')) {
                  echo "<td><a style= color:#081c15; href='contact.php?deleteId=".$row["id"]."'><i class='fa fa-trash'></i></a></td>";
                  echo "<td><a style= color:#081c15; href='contact.php?editId=".$row["id"]."'><i class='fa fa-edit'></i></a></td>";
                }
                else{
                  echo "<td></td><td></td>";
                }
                echo "</tr>";
              }
              ?>

              <!-- datele se salveaza in $_POST dupa submit -->
              <!-- get pt minim de caractere -->


              <?php if(!$editId) { if (isset($_SESSION["utilizator_logat"]) && ($_SESSION["utilizator_logat"] == 'administrator')) {?>
                <form  name="date_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <input type="hidden" name="id" value="<?php echo @$id;  ?>">
                  <div class="mb-3 mt-3">
                    <label for="nume" class="form-label">Nume *</label>
                    <input type="text" class="form-control" id="nume"  name="nume" value="<?php echo @$nume; ?>" required>
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="text" class="form-control" id="email"  name="email" value="<?php echo @$email; ?>" required>
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="comentariu" class="form-label">Comentariu *</label>
                    <input type="text" class="form-control" id="comentariu"  name="comentariu" value="<?php echo @$comentariu; ?>" required>
                  </div>
                  <input type="submit"  value="Trimite" class="btn btn-default" name="salveaza_info" id="abc">
                </form>
                <!-- id="btn-submit" -->
              <?php }} else { ?>
                <!-- onclick="this.disabled = true"  -->
                <form  name="date_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <input type="hidden" name="id" value="<?php echo @$id;  ?>">
                  <div class="mb-3 mt-3">
                    <label for="nume" class="form-label">Nume *</label>
                    <input type="text" class="form-control" id="nume"  name="nume" value="<?php echo @$nume; ?>" required>
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="text" class="form-control" id="email"  name="email" value="<?php echo @$email; ?>" required>
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="comentariu" class="form-label">Comentariu *</label>
                    <input type="text" class="form-control" id="comentariu"  name="comentariu" value="<?php echo @$comentariu; ?>" required>
                  </div>
                  <input type="submit" name="actualizeaza_info" class="btn btn-default" value="Actualizeaza">
                </form>
              <?php } ?>
              <br><br>
            </table>

          </div>
        </div>
      </div>

      <div class="col-sm-4 contactme">
        <h3>Contacți-mă</h3>
        <div class="scriscontact">
          <i class="fas fa-volume-up" style="color:#000"></i> Completați formularul pentru a ne cunoaște mai bine<br>
          <a href="galerie.php#poze" style="color:#74c69d; text-align:center;" > Click pentru mai multe poze </a>
          <img class = "imgformat justify-content-center center" src="./poze/fotografie.jpg" alt = "Media Object">
        </div>
      </div>

    </div>
  </div>

  <br><br><br>
  <div class="container ">
    <div class="row ">
      <div class="col-sm-8 ">
        <iframe src="https://www.google.com/maps/embed/v1/place?q=place_id:EiRTdHJhZGEgQXJnZciZIDQsIFRpbWnImW9hcmEsIFJvbWFuaWEiMBIuChQKEgmtmMYGkF1FRxGr7Dxdrq1ZbRAEKhQKEgk7l0z9j11FRxFCaeH7IeR5JQ&key=AIzaSyA3jRRr_i4a1h4l4PZ65FeTslprQe7gpp8"
        width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

      <div class="col-sm-4 contactme">
        <h3>Date de contact</h3>
        <div class="scriscontact">
          <i class="fas fa-map" style="color:#000"></i> Timișoara, România<br>
          <i class="fas fa-phone" style="color:#000"></i> 0732000000<br>
          <i class="fa fa-envelope "><a href="mailto:mihaela.filip@student.upt.ro" style="color:#000; text-decoration:none;">
            <span style="line-height: 21px;" class="txt-color"></i>
              mihaela.filip@student.upt.ro
            </span></a><br>
            <a href="https://www.facebook.com/monica.fillip/" style="color:#081c15;" role="button" target="_blank" class="btn-floating  btn-ins mx-1">
              <i class="fab fa-facebook-f"> Monica Filip </i>
            </a><br>
            <a href="https://twitter.com/monicafiliip" style="color:#081c15;" target="_blank" class="btn-floating  btn-ins mx-1">
              <i class="fab fa-twitter"> Filip Monica</i>
            </a><br>
            <a href="https://www.instagram.com/monicafillip/?hl=ro" style="color:#081c15;" role="button" target="_blank" class="btn-floating  btn-ins mx-1">
              <i class="fab fa-instagram"> Monica </i>
            </a><br>
            <a href="https://www.linkedin.com/in/mihaelamonicafilip/"style="color:#081c15;"role="button" target="_blank" class="btn-floating btn-li mx-1">
              <i class="fab fa-linkedin-in"> Filip Mihaela Monica </i>
            </a>
            <br>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
  </div>
</div>


<script >

//refresh and reload page
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>
<?php include 'footer.php';?>
