<div class="form-container p-5 mb-5">
    <form class="text-center p-5 form-box box" action='' method="post">
        <div class="position-relative">
            <p class="text-center mb-4">
                <span class="text-uppercase"
                      style="font-weight: 700;">Finalisation de la creation du compte utilisateur</span>
            </p>
            <div class="underline"></div>
        </div>
        <div class="mt-5">
            <?php if ($request->hasError('mot_pass')): ?>
                <small class="small"><?= $request->error('mot_pass') ?></small>
            <?php endif; ?>
            <div class="position-relative">
                <span class="password-eye first eye-hide"><i class="fas fa-eye-slash"></i></i></span>
                <input type="password" id="password" class="form-control mb-4 fm-p" name="mot_pass"
                       placeholder="Mot de passe" autocomplete="new-password">
            </div>
            <div class="position-relative">
                <span class="password-eye second eye-hide"><i class="fas fa-eye-slash"></i></i></span>
                <input type="password" id="password_verify" class="form-control mb-4 fm-p" name="password_verify"
                       placeholder="Retappez le mot de passe" autocomplete="new-password">
            </div>
        </div>
        <button class="btn btn-info btn-block fm-btn" type="submit">Suivant</button>
    </form>
</div>