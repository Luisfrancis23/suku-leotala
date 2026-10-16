<!DOCTYPE html>
<html lang="tet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Suku Leotala' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .wrapper { display: flex; }
        .sidebar {
            width: 250px; min-height: 100vh; background: #343a40;
            transition: margin-left 0.3s;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.75); padding: 12px 20px;
            border-bottom: 1px solid rgba(255,255,255,.05);
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff; background: rgba(255,255,255,.1);
        }
        .sidebar .nav-link i { margin-right: 10px; }
        .sidebar .brand {
            padding: 18px 20px; font-size: 1.2rem; font-weight: 700;
            color: #fff; background: rgba(0,0,0,.2); border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .content { flex: 1; padding: 20px; }
        .navbar-custom {
            background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,.1);
            padding: 12px 20px; margin-bottom: 20px; border-radius: 8px;
        }
        .card { border: none; box-shadow: 0 1px 3px rgba(0,0,0,.1); border-radius: 10px; }
        .card-header { background: #fff; border-bottom: 1px solid #eee; font-weight: 600; }
        .stat-card { transition: transform .2s; }
        .stat-card:hover { transform: translateY(-3px); }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <div class="brand">Suku Leotala</div>
        <nav>
            <a href="<?= base_url('/dashboard') ?>" class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="<?= base_url('/populasaun') ?>" class="nav-link <?= strpos(uri_string(), 'populasaun') === 0 ? 'active' : '' ?>">
                <i class="bi bi-people"></i> Populasaun
            </a>
            <a href="<?= base_url('/familia') ?>" class="nav-link <?= strpos(uri_string(), 'familia') === 0 ? 'active' : '' ?>">
                <i class="bi bi-house-heart"></i> Familia
            </a>
            <a href="<?= base_url('/aldeia') ?>" class="nav-link <?= strpos(uri_string(), 'aldeia') === 0 ? 'active' : '' ?>">
                <i class="bi bi-house-door"></i> Aldeia
            </a>
            <a href="<?= base_url('/religiaun') ?>" class="nav-link <?= strpos(uri_string(), 'religiaun') === 0 ? 'active' : '' ?>">
                <i class="bi bi-book"></i> Religiaun
            </a>
            <a href="<?= base_url('/profile') ?>" class="nav-link <?= uri_string() == 'profile' ? 'active' : '' ?>">
                <i class="bi bi-person-circle"></i> Profile
            </a>
            <a href="<?= base_url('/logout') ?>" class="nav-link text-danger">
                <i class="bi bi-box-arrow-right"></i> Sair
            </a>
        </nav>
    </div>
    <div class="content">
        <div class="navbar-custom d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?? '' ?></h5>
            <span><i class="bi bi-person"></i> <?= session()->get('nome_completo') ?></span>
        </div>

        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success alert-dismissible fade show"><?= session()->getFlashdata('message') ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show"><?= session()->getFlashdata('error') ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        <?php endif; ?>
