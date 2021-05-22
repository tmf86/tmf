<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <div class="jumbotron card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" id="form-suggestion">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <label class="col-md-12" for="about">Proposer une Suggestion en vue d'ameliorer le site
                                        <span class="alert-success" id="msg_retour_ok" ></span>
                                        <span class="alert-danger" id="msg_retour_bad"></span>
                                        <small
                                            class="small not-required"></small></label>
                                </div>
                                <div>
                                    <i class="fas fa-keyboard cursor-pointer" id="emojiKeyboard"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea rows="5" name="suggestion" id="content_suggestion"
                                          class="form-control form-control-line "></textarea>
                            </div>
                        </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="hidden"
                               class="form-control form-control-line" name="id_mbre"
                               id="id_membre" value="<?= $user->mat_membre;?>">
                    </div>
                </div>
                        <div class="form-group w-100">
                            <button class="btn btn-success text-white" id="btn_suggerer" type="submit" style="width: 10rem">Envoyer la
                                Suggestion
                            </button>
                        </div>
                    </form>


            </div>
            </div>
        </div>
</div>

