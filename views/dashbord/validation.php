<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <div class="jumbotron card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" id="form-update-profile">
                        <div class="d-flex justify-content-between">
                            <div>
                                <label class="col-md-12" for="about">Saisissez le code envoy&eacute; pour participer au parrainage
                                    <span class="alert-success" id="msg_retour_ok"></span>
                                    <span class="alert-danger" id="msg_retour_bad"></span>
                                    <small
                                        class="small not-required"></small></label>
                            </div>
                            <div>
                                <i class="fas fa-keyboard cursor-pointer" id="emojiKeyboard"></i>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <textarea rows="5" name="valid_code" id="content_vld"
                                          class="form-control form-control-line"></textarea>
                        </div>
                </div>
                <div class="form-group w-100">
                    <button class="btn btn-success text-white" id="btn_valider" type="submit" style="width: 10rem">Valider
                        le Code
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
