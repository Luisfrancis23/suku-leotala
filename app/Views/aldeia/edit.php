<?= view('layouts/header') ?>

<div class="card">
    <div class="card-header">Edita Aldeia</div>
    <div class="card-body">
        <form action="<?= base_url('/aldeia/edit/' . $aldeia->id) ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Naran Aldeia <span class="text-danger">*</span></label>
                <input type="text" name="nome" class="form-control <?= isset($validation) && $validation->hasError('nome') ? 'is-invalid' : '' ?>" value="<?= $aldeia->nome ?>" maxlength="100" required>
                <?php if (isset($validation) && $validation->hasError('nome')): ?>
                    <div class="invalid-feedback"><?= $validation->getError('nome') ?></div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Xefe Aldeia</label>
                    <input type="text" name="chefe" class="form-control <?= isset($validation) && $validation->hasError('chefe') ? 'is-invalid' : '' ?>" value="<?= $aldeia->chefe ?>" maxlength="100">
                    <?php if (isset($validation) && $validation->hasError('chefe')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('chefe') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control <?= isset($validation) && $validation->hasError('telefone') ? 'is-invalid' : '' ?>" value="<?= $aldeia->telefone ?>" maxlength="20">
                    <?php if (isset($validation) && $validation->hasError('telefone')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('telefone') ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Observasaun</label>
                <textarea name="observacao" class="form-control" rows="3"><?= $aldeia->observacao ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="ativo" <?= $aldeia->status == 'ativo' ? 'selected' : '' ?>>Ativo</option>
                    <option value="inativo" <?= $aldeia->status == 'inativo' ? 'selected' : '' ?>>Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="<?= base_url('/aldeia') ?>" class="btn btn-secondary">Kansela</a>
        </form>
    </div>
</div>

<?= view('layouts/footer') ?>
