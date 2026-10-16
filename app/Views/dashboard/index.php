<?= view('layouts/header') ?>

<div class="row g-3">
    <div class="col-md-2">
        <div class="card stat-card text-bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div><h6 class="card-title">Aldeia</h6><h2><?= $total_aldeias ?></h2></div>
                    <i class="bi bi-house-door fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-card text-bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div><h6 class="card-title">Familia</h6><h2><?= $total_familias ?></h2></div>
                    <i class="bi bi-house-heart fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-card text-bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div><h6 class="card-title">Populasaun</h6><h2><?= $total_moradores ?></h2></div>
                    <i class="bi bi-people fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-card text-bg-info">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div><h6 class="card-title">Religiaun</h6><h2><?= $total_religiaun ?></h2></div>
                    <i class="bi bi-book fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-card text-bg-secondary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div><h6 class="card-title">Carta</h6><h2><?= $total_cartas ?></h2></div>
                    <i class="bi bi-envelope fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mt-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Morador Tuir Sexo</div>
            <div class="card-body">
                <div class="d-flex justify-content-around text-center">
                    <div><h3><?= $total_masculino ?></h3><span class="text-muted">Mane</span></div>
                    <div><h3><?= $total_feminino ?></h3><span class="text-muted">Feto</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Morador Tuir Status</div>
            <div class="card-body">
                <div class="d-flex justify-content-around text-center">
                    <div><h3 class="text-success"><?= $total_hiduni ?></h3><span class="text-muted">Hiduni</span></div>
                    <div><h3 class="text-secondary"><?= $total_mate ?></h3><span class="text-muted">Mate</span></div>
                    <div><h3 class="text-warning"><?= $total_muda ?></h3><span class="text-muted">Muda</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">Aktividade Resente</div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light"><tr><th>Uzuariu</th><th>Asaun</th><th>Deskrisaun</th><th>Data</th></tr></thead>
                <tbody>
                    <?php if (empty($logs)): ?>
                        <tr><td colspan="4" class="text-center text-muted">Seidauk iha atividade</td></tr>
                    <?php else: ?>
                        <?php foreach ($logs as $log): ?>
                            <tr>
                                <td><?= $log->user_nome ?? $log->username ?? '-' ?></td>
                                <td><?= $log->acao ?></td>
                                <td><?= $log->descricao ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($log->created_at)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>
