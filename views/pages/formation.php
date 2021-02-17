
<!--Begin content-->
    <div class="container mb-5 mt-5">
          <div class="row mb-md-5">
              <?php foreach ($formations as $formation){?>
              <div class="col-md-4">
                  <!-- Card -->
                  <div class="card card-image"
                       style="background-image: url('../public/images/backcard.jpeg') ;width: 22rem;background-repeat: no-repeat;background-size: cover;height: 100%">

                      <!-- Content -->

                  <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                          <div>
                              <h5 class="pink-text"><i class="fas fa-chart-pie"></i><?=$formation->cour_forma;?></h5>
                              <h3 class="card-title pt-2"><strong><?=$formation->titre_forma;?></strong></h3>
                              <p><?=substr($formation->extrait,0,150)."..."
                                  ;?></p>
                              <span>Date d'ajout: </span><span><?=$formation->date_ajout;?></span>
                              <span>Date de modification: </span><span><?=$formation->date_modif;?></span>
                              <span>Auteur: </span><span><?=$formation->auteur_forma;?></span>
                              <a class="btn btn-pink" href="videos_formation?id=<?=$formation->id_forma;?>"><i class="fas fa-clone left"></i> View project</a>
                          </div>
                      </div>

                  </div>

                  <!-- Card -->
            </div>
              <?php } ?>



        <!--End of  content-->
	<!-- Footer -->
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>