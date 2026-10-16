<?= view('layouts/header') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Lista Familia</span>
        <a href="<?= base_url('/familia/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i> Aumenta Familia</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-datatable">
                <thead>
                    <tr><th>No</th><th>No KK</th><th>Naran Xefe Familia</th><th>Aldeia</th><th>Status</th><th>Aksaun</th></tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($familias as $f): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $f->no_kk ?></td>
                            <td><?= $f->nome_chefe ?></td>
                            <td><?= $f->aldeia_nome ?? '-' ?></td>
                            <td><span class="badge bg-<?= $f->status == 'ativo' ? 'success' : 'secondary' ?>"><?= $f->status ?></span></td>
                            <td>
                                <a href="<?= base_url('/familia/edit/' . $f->id) ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                <a href="<?= base_url('/familia/delete/' . $f->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ita boot certe atu hamos familia <?= $f->no_kk ?>?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($familias)): ?>
                        <tr><td colspan="6" class="text-center text-muted">Seidauk iha familia</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>
