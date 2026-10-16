<?= view('layouts/header') ?>

<div class="card">
    <div class="card-header">Aumenta Religiaun</div>
    <div class="card-body">
        <form action="<?= base_url('/religiaun/create') ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Naran Religiaun <span class="text-danger">*</span></label>
                <input type="text" name="naran" class="form-control <?= isset($validation) && $validation->hasError('naran') ? 'is-invalid' : '' ?>" maxlength="100" required>
                <?php if (isset($validation) && $validation->hasError('naran')): ?>
                    <div class="invalid-feedback"><?= $validation->getError('naran') ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="<?= base_url('/religiaun') ?>" class="btn btn-secondary">Kansela</a>
        </form>
    </div>
</div>

<?= view('layouts/footer') ?>
