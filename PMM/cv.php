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
        <h4 class="scrisheading pb-1"><i class="fas fa-briefcase pr-1 "></i> Experiențe profesionale</h4>
      </a>
      <table class="table">
        <tr>
          <th>Anul inceperii</th>
          <th>Anul incheierii</th>
          <th>Firma</th>
          <th>Oras</th>
          <th>Pozitia ocupata</th>
          <th></th>
          <th></th>
        </tr>


        <?php
        if (@$_POST["salveaza_info"] == "Trimite") {

          $anulInceperii = $_POST['anul_inceperii'];
          $anul_incheierii = $_POST['anul_incheierii'];
          $firma = $_POST['firma'];
          $orasul = $_POST['oras'];
          $pozitia = $_POST['pozitia'];

          //mysqli_query face rularea interogarii pe baza de date
          $result = mysqli_query($conn, "SELECT anul_inceperii, anul_incheierii, firma, oras, pozitia FROM experienta_profesionala where anul_inceperii = '$anulInceperii' and firma = '$firma' and pozitia='$pozitia'");
          $total = mysqli_num_rows($result);

          // insert unique data
          if($total==0)
          {
            if (empty($anul_incheierii)) {
              $sqlInsert = "INSERT INTO experienta_profesionala (anul_inceperii, anul_incheierii, firma, oras, pozitia)
              VALUES ('$anulInceperii', NULL, '$firma', '$orasul', '$pozitia');";
            }
            else{
              $sqlInsert = "INSERT INTO experienta_profesionala (anul_inceperii, anul_incheierii, firma, oras, pozitia)
              VALUES ('$anulInceperii', '$anul_incheierii', '$firma', '$orasul', '$pozitia');";
            }
            // inserare in bd si daca s a inserat sau nu
            if(!mysqli_query($conn, $sqlInsert)) {
              echo "<br>Nu a functionat"; echo mysqli_error ( $conn );
            }
            // empty fields after submit
            echo '<script language="javascript">window.location.href="cv.php"</script>';
          }
          else{
            echo("Please insert again. Data already exists in database");
          }
        }

        $editId = @$_GET['editId'];
        if ($editId) {
          $sqlEdit = "SELECT * FROM experienta_profesionala WHERE id = $editId";
          $result = mysqli_query($conn, $sqlEdit) or die(mysql_error());
          $row = mysqli_fetch_assoc($result);

          $id = $row["id"];
          $anulInceperii = $row["anul_inceperii"];
          $anul_incheierii = $row["anul_incheierii"];
          $firma = $row["firma"];
          $orasul = $row["oras"];
          $pozitia = $row["pozitia"];
        }

        if (@$_POST['actualizeaza_info'] == 'Actualizeaza') {
          $id = $_POST['id'];
          $anulInceperii = $_POST['anul_inceperii'];
          $anul_incheierii = $_POST['anul_incheierii'];
          $firma = $_POST['firma'];
          $orasul = $_POST['oras'];
          $pozitia = $_POST['pozitia'];

          $sqlUpdate = "UPDATE experienta_profesionala SET
          anul_inceperii = '$anulInceperii',
          anul_incheierii = '$anul_incheierii',
          firma = '$firma',
          oras = '$orasul',
          pozitia = '$pozitia'
          WHERE id='$id'";
          $result = mysqli_query($conn, $sqlUpdate) or die(mysql_error());
          echo '<script language="javascript">window.location.href="cv.php"</script>';

        }

        // preiau id-ul si sterg in tabela educatie inregistrarea cu id-ul preluat
        $deleteId = @$_GET['deleteId'];
        // echo $deleteId;
        if (!empty($deleteId)) {
          $sqlDelete = "DELETE FROM experienta_profesionala WHERE id='$deleteId'";
          $result = mysqli_query($conn, $sqlDelete) or die(mysql_error());
        }

        $sql = "SELECT * FROM experienta_profesionala";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$row['anul_inceperii']."</td>";
          echo "<td>".$row['anul_incheierii']."</td>";
          echo "<td>".$row['firma']."</td>";
          echo "<td>".$row['oras']."</td>";
          echo "<td>".$row['pozitia']."</td>";
          if (isset($_SESSION["utilizator_logat"]) && ($_SESSION["utilizator_logat"] == 'administrator')) {
            echo "<td><a style= color:#081c15; href='cv.php?deleteId=".$row["id"]."'><i class='fa fa-trash'></i></a></td>";
            echo "<td><a style= color:#081c15; href='cv.php?editId=".$row["id"]."'><i class='fa fa-edit'></i></a></td>";
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
                  <label for="anul_inceperii" class="form-label">Anul inceperii *</label>
                  <input type="year" class="form-control" id="anul_inceperii"  name="anul_inceperii" value="<?php echo @$anulInceperii; ?>" required>
                </div>

                <div class="mb-3 mt-3">
                  <label for="anul_incheierii" class="form-label">Anul incheierii </label>
                  <input type="year" class="form-control" id="anul_incheierii"  name="anul_incheierii" value="<?php echo @$anul_incheierii; ?>">
                </div>

                <div class="mb-3 mt-3">
                  <label for="firma" class="form-label">Firma *</label>
                  <input type="text" class="form-control" id="firma"  name="firma" value="<?php echo @$firma; ?>" required>
                </div>

                <div class="mb-3 mt-3">
                  <label for="oras" class="form-label">Orasul </label>
                  <input type="text" class="form-control" id="oras"  name="oras" value="<?php echo @$orasul; ?>">
                </div>

                <div class="mb-3 mt-3">
                  <label for="pozitia" class="form-label">Pozitia ocupata *</label>
                  <input type="text" class="form-control" id="pozitia"  name="pozitia" value="<?php echo @$pozitia; ?>"required>
                </div>
            <input type="submit" name="salveaza_info" class="btn btn-default" value="Trimite">
          </form>

          <?php }} else { ?>
            <form name="colectare_date" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <input type="hidden" name="id" value="<?php echo @$id;  ?>">
              <div class="mb-3 mt-3">
                <label for="anul_inceperii" class="form-label">Anul inceperii *</label>
                <input type="year" class="form-control" id="anul_inceperii"  name="anul_inceperii" value="<?php echo @$anulInceperii; ?>" required>
              </div>

              <div class="mb-3 mt-3">
                <label for="anul_incheierii" class="form-label">Anul incheierii </label>
                <input type="year" class="form-control" id="anul_incheierii"  name="anul_incheierii" value="<?php echo @$anul_incheierii; ?>">
              </div>

              <div class="mb-3 mt-3">
                <label for="firma" class="form-label">Firma *</label>
                <input type="text" class="form-control" id="firma"  name="firma" value="<?php echo @$firma; ?>" required>
              </div>

              <div class="mb-3 mt-3">
                <label for="oras" class="form-label">Orasul </label>
                <input type="text" class="form-control" id="oras"  name="oras" value="<?php echo @$orasul; ?>">
              </div>

              <div class="mb-3 mt-3">
                <label for="pozitia" class="form-label">Pozitia ocupata *</label>
                <input type="text" class="form-control" id="pozitia"  name="pozitia" value="<?php echo @$pozitia; ?>"required>
              </div>
            <input type="submit" name="actualizeaza_info" class="btn btn-default" value="Actualizeaza">
            <form>
          <?php } ?>
        <br><br>
      </table>



      <a  class="edu">
        <h4 class="scrisheading pb-1"><i class="fas fa-briefcase pr-1 "></i> Experiențe profesionale- NOKIA</h4>
      </a>
      <h4 class="scrisheading" >AC LABS - Web Interfaces, Services & Components Designed for Dedicated Databas</h4>
      <h5 class="font-weight-normal scriscontent">Am realizat o aplicație pentru utilizatori, cu pagină de meniu, pagina cu datele și grafice aferente
        analizei acelor date. Datele au fost preluate folosind SQL Server Manager, apoi sortate în funcție de tipul aplicației urmând ca mai
        apoi să fie stocate pe un server.
      </h5>

      <!-- lista pt laborator -->
      <ul class="list-unstyled text-justify scriscontent">
        <li> Competențe dobândite
          <ul>
            <li>PHP</li>
            <li>CSS</li>
            <li>HTML5</li>
            <li>SQL Server Manager</li>
          </ul>
        </li>
      </ul>

      <div class="row scriscontent">
        <div class="col text-md-left ml-3 mt-3">
          <p class="progress-title">HTML</p>
          <div class="progress">
            <div id="unu" class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80</div>
          </div>

          <p class="progress-title">PHP</p>
          <div class="progress">
            <div id="doi"  class="progress-bar " role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70</div>
          </div>

          <p class="progress-title">CSS</p>
          <div class="progress">
            <div id="trei" class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90</div>
          </div>

        </div>
      </div>

      <br>
      <h4 class="scrisheading  pb-1"> Practica de vară-SW Development using Agile/Scrum, Git, Jira, PowerBI and RobotFramework</h4>
      <ul class="list-unstyled text-justify scriscontent">
        <!-- lista pt practica de vara-->
        <li> Desfășurare : iulie 2020 – august 2020
          <ul>
            <li>Introducere în metodologia Agile/<a href="https://www.cprime.com/resources/what-is-agile-what-is-scrum/" target="_blank" style="color:#74c69d;">SCRUM</li></a>
            <li>Introducere în <a href="https://powerbi.microsoft.com/en-us/what-is-power-bi/" target="_blank" style="color:#74c69d;">PowerBI</li></a>
            <li>Asigurarea calității utilizând teste automate în dezvoltarea software-ului folosind <a href="https://robotframework.org/" target="_blank" style="color:#74c69d;">RobotFramework </li></a>
            <li>Manipularea datelor din excel într-o aplicație Java utilizând libraria <a href="https://www.tutorialspoint.com/apache_poi/index.htm" target="_blank" style="color:#74c69d;">Apache POI</a>/ Scurtă prezentare Git</li>
          </ul>
        </li><br>
      </ul>

    </div>
  </div>



  <!-- sectiunea de facultate si link site etc -->
  <a id="poli"></a>
  <div class="row">
    <div class="col text-md-left ml-3 mt-3">
      <a  class="green-text edu" href="https://www.etc.upt.ro/" style="color:#74c69d;" target="_blank">
        <h6 class=" scrisheading"><i class="fas fa-desktop pr-1 "></i> Facultate </h6>
      </a>
      <a class="edu" href="https://goo.gl/maps/3YgBSn2yroVJqit68" target="_blank">
        <h4 class=" pb-1 scrisheading" >Facultatea de Electronică, Telecomunicații și Tehnologii Informaționale,
          Specializare: Tehnologii și Sisteme de Telecomunicații, Multimedia, Universitatea
          Politehnica Timișoara, 2017-prezent
        </h4>
      </a>


      <!-- lista facultate-->
      <ul class="list-unstyled text-justify scriscontent">
        <li> Competențe dobândite
          <ul>
            <li>Am învățat să lucrez în Matlab, ulterior Octave și Simulink</li>
            <li>Am invățat să folosesc PADS, LtSpice, ISE Design Suite - Xilinx, să proiectez un amplificator și am fost la un training de
              lipire de componente la Flex</li>
              <li>C, OOP, Java și Python ( <a href="https://www.youtube.com/channel/UCVJZsdei_i2G3ZimBzqcmeg" target="_blank" style="color:#74c69d;"> recomand </a>)</li>
              <li>Baze de date, MySQL</li>
              <li>Principii de grafică și design unde am și realizat un proiect în echipă</li>
              <li>Adobe Premiere, <a href="https://pin.it/2fKxZ2D" target="_blank" style="color:#74c69d;"> Photoshop</a> , Audacity</li>
              <li>HTML5, CSS, Bootstrap</li>
            </ul>
          </li><br>
          </ul>
        </div>
      </div>
    </div>


        <script>
        var delay = 500;
        $(".progress-bar").each(function(i){
          $(this).delay( delay*i ).animate( { width: $(this).attr('aria-valuenow') + '%' }, delay );

          $(this).prop('Counter',0).animate({
            Counter: $(this).text()
          }, {
            duration: delay,
            easing: 'swing',
            step: function (now) {
              $(this).text(Math.ceil(now)+'%');
            }
          });
        });


        $(function() {
          $("#unu").addClass("progress-bar-green");
          $("#doi").addClass("progress-bar-green");
          $("#trei").addClass("progress-bar-green");
        });

        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }

        </script>

        <?php include 'footer.php';?>
