<?= view('layouts/header') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Lista Populasaun</span>
        <a href="<?= base_url('/populasaun/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i> Aumenta Populasaun</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-datatable">
                <thead>
                    <tr><th>No</th><th>NIK</th><th>Naran Kompletu</th><th>Sexo</th><th>Data Nasc</th><th>Status</th><th>Aksaun</th></tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($moradores as $m): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $m->nik ?></td>
                            <td><?= $m->nome_completo ?></td>
                            <td><?= $m->sexo ?></td>
                            <td><?= $m->data_nascimento ? date('d/m/Y', strtotime($m->data_nascimento)) : '-' ?></td>
                            <td><span class="badge bg-<?= $m->status_morador == 'Hiduni' ? 'success' : ($m->status_morador == 'Mate' ? 'secondary' : 'warning') ?>"><?= $m->status_morador ?></span></td>
                            <td>
                                <a href="<?= base_url('/populasaun/edit/' . $m->id) ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                <a href="<?= base_url('/populasaun/delete/' . $m->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ita boot certe atu hamos populasaun <?= $m->nome_completo ?>?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($moradores)): ?>
                        <tr><td colspan="7" class="text-center text-muted">Seidauk iha populasaun</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>
