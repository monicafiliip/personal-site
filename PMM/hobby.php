<?php include 'header.php';?>

<!--container mare cu toata informatia si pozele -->
<div class="container"  style="background-color:#40916C;">
  <div class="row">
    <div class="col text-md-left ml-3 mt-3">
      <a  class="green-text edu">
        <br><br>
        <h6 class="scrisheading pb-1"><i class="fas fa-heart pr-1 "></i> Despre preferințele mele</h6>
      </a>

      <!-- container cu elemente lista -->
      <div class="container">
        <div class="row" style="text-align:center;" >
          <div class="col-12 col-md-12 ">
            <!-- a se fol pt href cu id, clasa btn nu merge langa fas fa-paw-->
            <a style="color:#081C15;" href="#pisi"><li class="fas fa-paw"> Pisicile </li></a>
            <a style="color:#081C15;" href="#calatorii"><li class="fas fa-plane"> Să călătoresc </li></a>
            <a style="color:#081C15;" href="https://pin.it/6WLUvUU" target="_blank" ><li class="fas fa-home"> Să stau cu familia </li></a>
            <a style="color:#081C15;" href="amintiri.php#muzica"><li class="fas fa-music">  Să ascult muzică </li></a><br>
            <a style="color:#081C15;" href="#cafea"><li class="fas fa-coffee">  Cafeaua </li></a>
            <a style="color:#081C15;" href="galerie.php#poze"><li class="fas fa-photo"> Să fac poze </li></a>
            <a style="color:#081C15;" href="amintiri.php#meci"><li class="fas fa-futbol"> Să mă uit la fotbal</li></a><br>
          </div>
          <!-- imagine coperta-->
          <div class="view overlay rounded-top" >
            <img src="./poze/cc.png" class="img-fluid center_carousel " style="width:73%; "alt="Sample image" >
          </div>
        </div>
      </div>
    </div>

    <!-- container poze pisici galerie-->
  </div> <br><br>
  <div class="container-fluid" style="text-align:center;" >
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-4">
        <h3 class = "media-heading scrisheading" id="pisi">PISICILE</h3>
        <h5 class="font-weight-normal text-md-left scriscontent">Sunt o mare iubitoare de pisici și îmi place să le imortalizez . Îmi place să le
          fotografiez sau filmez dar mai ales să mă joc cu ele. Îmi placea foarte mult să merg la cafeneaua
          cu <a  href="https://www.facebook.com/lapisicitm" style="color:#74c69d;" target="_blank">Pisici</a> din Timișoara.
          De asemenea, am și eu un motan acasă pe nume Felix. Lui Felix nu îi place să stea la poze.</h5>
        </div>
        <a id="calatorii"></a>

        <div class="col-12 col-sm-6 col-lg-4">
          <h3 class = "media-heading scrisheading">SĂ CĂLĂTORESC</h3>
          <h5 class="font-weight-normal text-md-left scriscontent"> Îmi place foarte mult să călătoresc, să mă plimb, iar în 2020 am zburat
            prima oara cu avionul. Nu am vizitat foarte multe țări, doar <a href="calatorii.php#italia" style="color:#74c69d;" >Italia</a> , Cehia, Slovacia și Ungaria însă îmi doresc să
            pot călători în mai multe țări în viitor.
            Îmi place să călătoresc în <a href="romania.php#romania" style="color:#74c69d;">țară </a> mai ales la muzee sau castele, îmi place istoria ce ne-o arată.</h5>
          </div>

          <div class="col-12 col-sm-6 col-lg-4">
            <h3 class = "media-heading scrisheading" id="cafea">CAFEAUA</h3>
            <h5 class="font-weight-normal text-md-left scriscontent">O prietenă adevată, așa numesc eu cafeaua. Nu mă lasă niciodată la greu, este
              cea mai bună oriunde și oricând, și nu poți să te saturi de ea.
              Și până la urmă, cine nu are nevoie de un prieten la greu? În sesiune sau în zilele libere este cel mai de preț ajutor.
              Locurile mele preferate din Timisoara: <a href="https://www.facebook.com/TucanoCoffeeMexico" style="color:#74c69d;" target="_blank">Tucano</a> si
              <a href="https://www.facebook.com/StarbucksRomania/" style="color:#74c69d;" target="_blank">Starbucks</a>.</h5><br>
            </div>
          </div>
          <div class="row gallery" >
            <div class="col-12 col-sm-6 col-lg-4">
              <a href="poze/tomy.jpg" data-lightbox="mygallery"> <img class="w-100 imgformat cursordiv" data-lightbox="mygallery" src="./poze/tomy.jpg"> </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
              <a href="poze/milano.jpg" data-lightbox="mygallery"> <img class="w-100 imgformat cursordiv" data-lightbox="mygallery" src="./poze/milano.jpg" > </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
              <a href="poze/starbuks.jpg" data-lightbox="mygallery"> <img class="w-100 imgformat cursordiv" data-lightbox="mygallery" src="./poze/starbuks.jpg" > </a>
            </div>
          </div>
        </div><br><br>
      </div>



      <?php include 'footer.php';?>
