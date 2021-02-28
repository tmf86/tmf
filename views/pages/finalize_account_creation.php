<div class="form-container p-5 mb-5">
    <form class="p-5 form-box box password-box" action='' method="post">
        <div class="position-relative">
            <p class="text-center mb-4">
                <span class="text-uppercase"
                      style="font-weight: 700;">Finalisation de la creation du compte utilisateur</span>
            </p>
            <div class="underline"></div>
        </div>
        <div class="mt-5">
            <?php if ($request->hasError('mot_pass')): ?>
                <div class="alert alert-danger alert-dismissible fade show fm-family" role="alert">
                    <strong><?= $request->error('mot_pass') ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if ($request->hasError('password_verify')): ?>
                <div class="alert alert-danger alert-dismissible fade show fm-family <?php if (empty($request->error('password_verify'))): ?>d-none <?php endif; ?>"
                     role="alert">
                    <strong><?= $request->error('password_verify') ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="position-relative">
                <span class="password-eye first eye-hide"><i class="fas fa-eye-slash"></i></i></span>
                <input type="password" id="password"
                       class="form-control mb-4 fm-p  <?php if ($request->hasError('mot_pass')): ?>error<?php endif; ?>"
                       name="mot_pass"
                       placeholder="Mot de passe" autocomplete="new-password">
            </div>
            <div class="position-relative">
                <span class="password-eye second eye-hide"><i class="fas fa-eye-slash"></i></i></span>
                <input type="password" id="password_verify"
                       class="form-control mb-4 fm-p <?php if ($request->hasError('password_verify')): ?>error <?php endif; ?>"
                       name="password_verify"
                       placeholder="Repeter le mot de passe" autocomplete="new-password">
            </div>
        </div>
        <button class="btn btn-info btn-block fm-btn" type="submit">Suivant</button>
    </form>
</div>