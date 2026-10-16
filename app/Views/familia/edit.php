<?= view('layouts/header') ?>

<div class="card">
    <div class="card-header">Edita Familia</div>
    <div class="card-body">
        <form action="<?= base_url('/familia/edit/' . $familia->id) ?>" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">No KK <span class="text-danger">*</span></label>
                    <input type="text" name="no_kk" class="form-control <?= isset($validation) && $validation->hasError('no_kk') ? 'is-invalid' : '' ?>" value="<?= $familia->no_kk ?>" maxlength="30" required>
                    <?php if (isset($validation) && $validation->hasError('no_kk')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('no_kk') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Naran Xefe Familia <span class="text-danger">*</span></label>
                    <input type="text" name="nome_chefe" class="form-control <?= isset($validation) && $validation->hasError('nome_chefe') ? 'is-invalid' : '' ?>" value="<?= $familia->nome_chefe ?>" maxlength="100" required>
                    <?php if (isset($validation) && $validation->hasError('nome_chefe')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('nome_chefe') ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Aldeia</label>
                <select name="aldeia_id" class="form-control">
                    <option value="">Hili Aldeia</option>
                    <?php foreach ($aldeias as $a): ?>
                        <option value="<?= $a->id ?>" <?= $familia->aldeia_id == $a->id ? 'selected' : '' ?>><?= $a->nome ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Endereco</label>
                <textarea name="endereco" class="form-control" rows="2"><?= $familia->endereco ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="ativo" <?= $familia->status == 'ativo' ? 'selected' : '' ?>>Ativo</option>
                    <option value="inativo" <?= $familia->status == 'inativo' ? 'selected' : '' ?>>Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="<?= base_url('/familia') ?>" class="btn btn-secondary">Kansela</a>
        </form>
    </div>
</div>

<?= view('layouts/footer') ?>
