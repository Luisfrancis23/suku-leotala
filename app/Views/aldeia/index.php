<?= view('layouts/header') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Lista Aldeia</span>
        <a href="<?= base_url('/aldeia/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i> Aumenta Aldeia</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-datatable">
                <thead>
                    <tr><th>No</th><th>Naran</th><th>Xefe</th><th>Telefone</th><th>Status</th><th>Aksaun</th></tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($aldeias as $a): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $a->nome ?></td>
                            <td><?= $a->chefe ?? '-' ?></td>
                            <td><?= $a->telefone ?? '-' ?></td>
                            <td><span class="badge bg-<?= $a->status == 'ativo' ? 'success' : 'secondary' ?>"><?= $a->status ?></span></td>
                            <td>
                                <a href="<?= base_url('/aldeia/edit/' . $a->id) ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                <a href="<?= base_url('/aldeia/delete/' . $a->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ita boot certe atu hamos aldeia $a->nome?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($aldeias)): ?>
                        <tr><td colspan="6" class="text-center text-muted">Seidauk iha aldeia</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>
