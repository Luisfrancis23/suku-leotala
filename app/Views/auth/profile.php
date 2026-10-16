<?= view('layouts/header') ?>

<div class="card">
    <div class="card-header">Profile</div>
    <div class="card-body">
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul class="mb-0"><?php foreach (session()->getFlashdata('errors') as $e): ?><li><?= $e ?></li><?php endforeach; ?></ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/profile/update') ?>" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" value="<?= $user->username ?>" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipo</label>
                    <input type="text" class="form-control" value="<?= $user->tipo ?>" disabled>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Naran Kompleto</label>
                <input type="text" name="nome_completo" class="form-control" value="<?= $user->nome_completo ?>" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $user->email ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="<?= $user->telefone ?>">
                </div>
            </div>
            <hr>
            <h6>Troka Password (opsional)</h6>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password Foun</label>
                    <input type="password" name="password" class="form-control" minlength="6">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Konfirma Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
</div>

<?= view('layouts/footer') ?>
