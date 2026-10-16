<?= view('layouts/header') ?>

<div class="card">
    <div class="card-header">Edita Populasaun</div>
    <div class="card-body">
        <form action="<?= base_url('/populasaun/edit/' . $morador->id) ?>" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik" class="form-control <?= isset($validation) && $validation->hasError('nik') ? 'is-invalid' : '' ?>" value="<?= $morador->nik ?>" maxlength="20" required>
                    <?php if (isset($validation) && $validation->hasError('nik')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('nik') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Naran Kompletu <span class="text-danger">*</span></label>
                    <input type="text" name="nome_completo" class="form-control <?= isset($validation) && $validation->hasError('nome_completo') ? 'is-invalid' : '' ?>" value="<?= $morador->nome_completo ?>" maxlength="150" required>
                    <?php if (isset($validation) && $validation->hasError('nome_completo')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('nome_completo') ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Sexo <span class="text-danger">*</span></label>
                    <select name="sexo" class="form-control <?= isset($validation) && $validation->hasError('sexo') ? 'is-invalid' : '' ?>" required>
                        <option value="">Hili</option>
                        <option value="Masculino" <?= $morador->sexo == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                        <option value="Feminino" <?= $morador->sexo == 'Feminino' ? 'selected' : '' ?>>Feminino</option>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('sexo')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('sexo') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Local Nascimento</label>
                    <input type="text" name="local_nascimento" class="form-control" value="<?= $morador->local_nascimento ?>" maxlength="100">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Data Nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control <?= isset($validation) && $validation->hasError('data_nascimento') ? 'is-invalid' : '' ?>" value="<?= $morador->data_nascimento ?>">
                    <?php if (isset($validation) && $validation->hasError('data_nascimento')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('data_nascimento') ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Idade</label>
                    <input type="number" name="idade" class="form-control" value="<?= $morador->idade ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Estado Civil</label>
                    <select name="estado_civil" class="form-control">
                        <option value="">Hili</option>
                        <option value="Solteiro" <?= $morador->estado_civil == 'Solteiro' ? 'selected' : '' ?>>Solteiro</option>
                        <option value="Casado" <?= $morador->estado_civil == 'Casado' ? 'selected' : '' ?>>Casado</option>
                        <option value="Divorciado" <?= $morador->estado_civil == 'Divorciado' ? 'selected' : '' ?>>Divorciado</option>
                        <option value="Viuvo" <?= $morador->estado_civil == 'Viuvo' ? 'selected' : '' ?>>Viuvo</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Religiaun</label>
                    <input type="text" name="religiao" class="form-control" value="<?= $morador->religiao ?>" maxlength="50">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Escolaridade</label>
                    <input type="text" name="escolaridade" class="form-control" value="<?= $morador->escolaridade ?>" maxlength="50">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Ocupasaun</label>
                    <input type="text" name="ocupacao" class="form-control" value="<?= $morador->ocupacao ?>" maxlength="100">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nacionalidade</label>
                    <input type="text" name="nacionalidade" class="form-control" value="<?= $morador->nacionalidade ?>" maxlength="50">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nome Pai</label>
                    <input type="text" name="nome_pai" class="form-control" value="<?= $morador->nome_pai ?>" maxlength="100">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nome Mae</label>
                    <input type="text" name="nome_mae" class="form-control" value="<?= $morador->nome_mae ?>" maxlength="100">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Aldeia</label>
                    <select name="aldeia_id" class="form-control">
                        <option value="">Hili Aldeia</option>
                        <?php foreach ($aldeias as $a): ?>
                            <option value="<?= $a->id ?>" <?= $morador->aldeia_id == $a->id ? 'selected' : '' ?>><?= $a->nome ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Familia</label>
                    <select name="familia_id" class="form-control">
                        <option value="">Hili Familia</option>
                        <?php foreach ($familias as $f): ?>
                            <option value="<?= $f->id ?>" <?= $morador->familia_id == $f->id ? 'selected' : '' ?>><?= $f->no_kk . ' - ' . $f->nome_chefe ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Endereco</label>
                <textarea name="endereco" class="form-control" rows="2"><?= $morador->endereco ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="<?= $morador->telefone ?>" maxlength="20">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $morador->email ?>" maxlength="100">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Status Morador</label>
                <select name="status_morador" class="form-control">
                    <option value="Hiduni" <?= $morador->status_morador == 'Hiduni' ? 'selected' : '' ?>>Hiduni</option>
                    <option value="Mate" <?= $morador->status_morador == 'Mate' ? 'selected' : '' ?>>Mate</option>
                    <option value="Muda" <?= $morador->status_morador == 'Muda' ? 'selected' : '' ?>>Muda</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="<?= base_url('/populasaun') ?>" class="btn btn-secondary">Kansela</a>
        </form>
    </div>
</div>

<?= view('layouts/footer') ?>
