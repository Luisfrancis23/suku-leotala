<?= view('layouts/header') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Lista Religiaun</span>
        <a href="<?= base_url('/religiaun/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i> Aumenta Religiaun</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-datatable">
                <thead>
                    <tr><th>No</th><th>Naran</th><th>Status</th><th>Aksaun</th></tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($religiaun as $r): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $r->naran ?></td>
                            <td><span class="badge bg-<?= $r->status == 'ativo' ? 'success' : 'secondary' ?>"><?= $r->status ?></span></td>
                            <td>
                                <a href="<?= base_url('/religiaun/edit/' . $r->id) ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                <a href="<?= base_url('/religiaun/delete/' . $r->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ita boot certe atu hamos religiaun <?= $r->naran ?>?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($religiaun)): ?>
                        <tr><td colspan="4" class="text-center text-muted">Seidauk iha religiaun</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>
