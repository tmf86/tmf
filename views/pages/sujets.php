<!--content body---->
<div class="mt-1">
    <ul class="nav nav-tabs justify-content-end special-color mb-4" id=myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active btn" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
               aria-selected="true"><i class="fa fa-graduation-cap fa-2x"></i>BTS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
               aria-controls="profile"
               aria-selected="false"><i class="fa fa-book-open fa-2x"></i> Devoirs/Examen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  spcial btn" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
               aria-controls="contact"
               aria-selected="false"><i class="fa fa-desktop fa-2x"></i> Projets</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <form class="form mt-2 mb-2" method="post" action="">
            <button class="btn btn-dark mr-0"
                    style="pointer-events :none;border-radius:6px;height: 2rem; padding-top: 0.3rem;" type="button">
                Rechercher
            </button>
            <label>
                <select class="browser-default custom-select" style="width: 400px;height: 2rem; margin-left: 0.01rem;">
                    <option selected>Selectioner Une Date</option>
                    <?php foreach ($all_date as $dt) {
                        $d = new DateTime($dt->date_ajout);
                        ?>
                        <option value="<?= $d->format('Y') ?>">
                            <?= $d->format('Y') ?>
                        </option>
                        <!--option value="2">2011</option>
                        <option value="3">2005</option-->
                    <?php } ?>
                </select>
            </label>
        </form>
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sujets</th>
                    <th scope="col">correction</th>
                    <th scope="col">Date d'Ajout</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0;
                foreach ($sujet_bts as $sj) { ?>
                    <tr>
                        <th scope="row"><? //= $i++ ?></th>
                        <td><a download="<? //= $sj->lien_sujet ?>"><? //= $sj->nom_sujet ?>(<? //= $sj->matiere_sujet ?>
                                )</a>
                        </td>
                        <td>
                            <?php
                            $correct = new \Model\Correction();
                            $correct = $correct->find_correction($sj->id_sujet);
                            if (!$correct) {
                                echo "<span>Aucune Correction</span>";
                            } else {
                                echo '<a download="' . $correct->lien_correct . '">' . $correct->nom_correct . '</a>';
                            }

                            ?></td>
                        <td><?= $sj->date_ajout ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sujets</th>
                    <th scope="col">correction</th>
                    <th scope="col">Date d'Ajout</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0;
                foreach ($sujet_autre as $sj) { ?>
                    <tr>
                        <th scope="row"><? //= $i++ ?></th>
                        <td><a download="<? //= $sj->lien_sujet ?>"><? //= $sj->nom_sujet ?>(<? //= $sj->matiere_sujet ?>
                                )</a>
                        </td>
                        <td><?php
                            $correct = new \Model\Correction();
                            $correct = $correct->find_correction($sj->id_sujet);
                            if (!$correct) {
                                echo "<span>Aucune Correction</span>";
                            } else {
                                echo '<a download="' . $correct->lien_correct . '">' . $correct->nom_correct . '</a>';
                            }
                            ?>
                        </td>
                        <td><? //= $sj->date_ajout ?></td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Projet</th>
                    <th scope="col">Solutions</th>
                    <th scope="col">Date d'Ajout</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0;
                foreach ($sujet_projet as $sj) { ?>
                    <tr>
                        <th scope="row"><? //= $i++ ?></th>
                        <td><a download="<? //= $sj->lien_sujet ?>"><? //= $sj->nom_sujet ?>(<? //= $sj->matiere_sujet ?>
                                )</a>
                        </td>
                        <td>
                            <?php
                            $correct = new \Model\Correction();
                            $correct = $correct->find_correction($sj->id_sujet);
                            if (!$correct) {
                                echo "<span>Aucune Correction</span>";
                            } else {
                                echo '<a download="' . $correct->lien_correct . '">' . $correct->nom_correct . '</a>';
                            }

                            ?>
                        </td>
                        <td><?= $sj->date_ajout ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br><br><br>

