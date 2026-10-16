<?= view('layouts/header') ?>

<div class="card">
    <div class="card-header">Aumenta Populasaun</div>
    <div class="card-body">
        <form action="<?= base_url('/populasaun/create') ?>" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik" class="form-control <?= isset($validation) && $validation->hasError('nik') ? 'is-invalid' : '' ?>" maxlength="20" required>
                    <?php if (isset($validation) && $validation->hasError('nik')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('nik') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Naran Kompletu <span class="text-danger">*</span></label>
                    <input type="text" name="nome_completo" class="form-control <?= isset($validation) && $validation->hasError('nome_completo') ? 'is-invalid' : '' ?>" maxlength="150" required>
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
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('sexo')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('sexo') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Local Nascimento</label>
                    <input type="text" name="local_nascimento" class="form-control" maxlength="100">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Data Nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control <?= isset($validation) && $validation->hasError('data_nascimento') ? 'is-invalid' : '' ?>">
                    <?php if (isset($validation) && $validation->hasError('data_nascimento')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('data_nascimento') ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Idade</label>
                    <input type="number" name="idade" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Estado Civil</label>
                    <select name="estado_civil" class="form-control">
                        <option value="">Hili</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Casado">Casado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viuvo">Viuvo</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Religiaun</label>
                    <input type="text" name="religiao" class="form-control" maxlength="50">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Escolaridade</label>
                    <input type="text" name="escolaridade" class="form-control" maxlength="50">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Ocupasaun</label>
                    <input type="text" name="ocupacao" class="form-control" maxlength="100">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nacionalidade</label>
                    <input type="text" name="nacionalidade" class="form-control" maxlength="50" value="Timorense">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nome Pai</label>
                    <input type="text" name="nome_pai" class="form-control" maxlength="100">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nome Mae</label>
                    <input type="text" name="nome_mae" class="form-control" maxlength="100">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Aldeia</label>
                    <select name="aldeia_id" class="form-control">
                        <option value="">Hili Aldeia</option>
                        <?php foreach ($aldeias as $a): ?>
                            <option value="<?= $a->id ?>"><?= $a->nome ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Familia</label>
                    <select name="familia_id" class="form-control">
                        <option value="">Hili Familia</option>
                        <?php foreach ($familias as $f): ?>
                            <option value="<?= $f->id ?>"><?= $f->no_kk . ' - ' . $f->nome_chefe ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Endereco</label>
                <textarea name="endereco" class="form-control" rows="2"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" maxlength="20">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" maxlength="100">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Status Morador</label>
                <select name="status_morador" class="form-control">
                    <option value="Hiduni">Hiduni</option>
                    <option value="Mate">Mate</option>
                    <option value="Muda">Muda</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="<?= base_url('/populasaun') ?>" class="btn btn-secondary">Kansela</a>
        </form>
    </div>
</div>

<?= view('layouts/footer') ?>
