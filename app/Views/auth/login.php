<!DOCTYPE html>
<html lang="tet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Login - Suku Leotala' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #343a40 0%, #212529 100%);
            min-height: 100vh; display: flex; align-items: center; justify-content: center;
        }
        .login-card { max-width: 400px; width: 100%; padding: 30px; border-radius: 12px; }
    </style>
</head>
<body>
    <div class="login-card card">
        <div class="card-body">
            <h3 class="text-center mb-4">Suku Leotala</h3>
            <p class="text-center text-muted mb-4">Sistema Informasaun Suku</p>

            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('/login') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="username" class="form-control <?= isset($validation) && $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Username" required>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('username')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('username') ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password" required>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <div class="invalid-feedback d-block"><?= $validation->getError('password') ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-dark w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
