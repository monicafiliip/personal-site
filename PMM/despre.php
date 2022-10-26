<?php include 'header.php';?>



<!-- container pt informatii -->
<div class="container"  style="background-color:#40916C;">

  <!-- imagine coperta-->
  <div class="view overlay rounded-top" >
    <img src="./poze/cover1.jpeg" class="img-fluid" style="padding: 10px 10px;"alt="Sample image" >
  </div>



  <!-- citat -->
  <p class="card-text py-2">
    <blockquote class="blockquote shadow rounded">
      <div class="blockquote-custom-icon bg-secondary"><i class="fa fa-quote-left text-white"></i></div>
      <p class="mb-0 text-center textquote">"You must make a choice to
        take a chance or your life will never change" </p>
        <div class="blockquote-footer text-center"> Zig Ziglar </div>
      </blockquote>
    </p><br><br>


    <!-- Container informatii href si id-->
    <div class="container">
      <div class="row text-center">
        <div class="col-sm center">
          <p><a href="#cinesunteu" class="mh" style="  Font-Family: 'Dosis', Serif;"><h3>Cine sunt eu?</h3></a></p>
        </div>
        <div class="col-sm center">
          <p><a href="#cumsunteu" class="mh" style="  Font-Family: 'Dosis', Serif;"><h3>Cum sunt eu?</h3></a></p>
        </div>
        <div class="col-sm center">
          <p><a href="#ceimiplace" class="mh" style="  Font-Family: 'Dosis', Serif;"><h3>Ce îmi place?</h3></a></p>
        </div>
      </div>
    </div><br> <br>




    <!-- Container pentru poze 3 X 3-->
    <div class="container">
      <div class="row gallery" >
        <div class="col-12 col-sm-6 col-lg-4">
          <a href="poze/fotografie.jpg" data-lightbox="mygallery"> <img class="w-100 imgformat cursordiv" data-lightbox="mygallery" src="./poze/fotografie.jpg"> </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <a href="poze/como.jpg" data-lightbox="mygallery"> <img class="w-100 imgformat cursordiv" data-lightbox="mygallery" src="./poze/como.jpg" > </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <a href="poze/soare.jpg" data-lightbox="mygallery"> <img class="w-100 imgformat cursordiv" data-lightbox="mygallery" src="./poze/soare.jpg" > </a>
        </div>
      </div>


      <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style=" background: #40916c;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">

            </div> </div>
          </div>
        </div><br><br>
      </div>




      <a id="cinesunteu"></a><br>
      <!-- Container informatii si poze-->
      <div class="card-body  mb-3" style="background:#40916C;">
        <div class = "media" >
          <a class = "pull-left imgdespre">
            <img class = "media-object img-fluid" src="./poze/como.jpg" alt = "Media Object">
          </a>

          <div class = "media-body">
            <h4 class = "media-heading" style="  Font-Family: 'Dosis', Serif;">Cine sunt eu?</h4>
            <h5 class="textinfo ">  Numele meu este Filip Mihaela Monica, am 23 de ani și sunt studentă în anul I la Master Tehnologii Multimedia la Facultatea
              de Electronică, Telecomunicații și Tehnologii Informaționale, în cadrul Universității <a href="cv.php#poli" style="color:#081c15;" >
                Politehnica</a> Timișoara.
                <a href="cv.php" style="color:#081c15;" >Click pentru mai multe detalii</a>
                <div>Acum locuiesc în Timișoara dar de loc sunt din comuna Crișcior, Hunedoara. M-am născut în Hunedoara.
                </h5>
              </div>
            </div>
            <a id="cumsunteu"></a><br><br>

            <div class = "media">
              <a class = "pull-left  imgdespre">
                <img class = "media-object img-fluid " src="./poze/fotografie.jpg" alt = "Media Object">
              </a>

              <div class = "media-body">
                <h4 class = "media-heading" style="  Font-Family: 'Dosis', Serif;">Cum sunt eu?</h4>
                <h5 class="textinfo textdespre">Sunt născuta pe 8 noiembrie 1998, sunt zodia scorpion.
                  Mă consider o persoană timidă uneori, amuzanta și perspicace în marea majoritatea timpului.
                  <div>Sunt o fire destul de liniștită, empatică, sufletistă, care preferă să gandească mai multe decât ceea ce spune.
                    <div>De cele mai multe ori mă ambiționez singură să caut sau să aflu singură lucruri, consider că așa mă dezvolt.
                      <div>Din categoria puncte forte pot spune că sunt o persoană organizată și muncitoare, iar ca puncte slabe
                        aș spune că uneori sunt cam nesigură pe mine.
                      </h5>
                    </div>
                  </div>
                  <a id="ceimiplace"></a><br><br>

                  <div class = "media" >
                    <a class = "pull-left imgdespre">
                      <img class = "media-object img-fluid" src="./poze/euduom.jpg" alt = "Media Object">
                    </a>

                    <div class = "media-body">
                      <h4 class ="media-heading" style="  Font-Family: 'Dosis', Serif;" >Ce îmi place?</h4>
                      <h5 class="textinfo" style="text-decoration : none">Îmi place să aflu lucruri noi, să caut și să descopăr ceva diferit
                        în fiecare zi, să citesc un număr oarecare de pagini pe zi dacă e posibil, să realizez fotografii și să <a href="hobby.php#calatorii" style="color:#081c15;" >călătoresc</a>.
                        <div> În timpul liber ascult muzică, mai mult muzica anilor 70'-80' sau cea <a href="amintiri.php#muzica"style="color:#081c15;" >latino </a>, cel mai mult ascult radio MagicFm.
                          <div> Mă potrivesc tiparului "fetelor le plac pisicile si ceaiul", ba chiar am și realizat împreuna cu o colegă
                            un proiect la grafică computerizată bazat pe această temă la <a href="cv.php#gc" style="color:#081c15;" >facultate</a>
                          </h5>
                        </div>
                      </div>
                    </div>
                  </div>


                  <?php include 'footer.php';?>
