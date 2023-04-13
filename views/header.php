<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="mania">
    <title>Email Handler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                    use EmailHandler\Controller\SessionController;

                    $isAuthenticated = isset($_SESSION['logged_in']) &&  $_SESSION['logged_in'] === true;
                    $isAdmin = SessionController::get('is_admin');
                ?>
                <?php if($isAuthenticated): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="/index.php?action=see-email-send-page"><span style="color:#703900; padding:0 4px 2px 4px; background-color:#D1F5FF; border-radius:5px;"><span style="color:#703900; padding:0 4px 2px 4px; background-color:#D1F5FF; border-radius:5px;">Send New Email</span></a>
                    </li>
                    <?php if($isAdmin): ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/index.php?action=see-admin-panel-page"><span style="color:#703900; padding:0 4px 2px 4px; background-color:#D1F5FF; border-radius:5px;">Admin Panel</span></a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/index.php?action=see-users-emails-page"><span style="color:#703900; padding:0 4px 2px 4px; background-color:#D1F5FF; border-radius:5px;">Sent Emails</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/index.php?action=logout-user"><span style="color:#703900; padding:0 4px 2px 4px; background-color:#D1F5FF; border-radius:5px;">Logout</span></a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/index.php"><span style="color:#703900; padding:0 4px 2px 4px; background-color:#D1F5FF; border-radius:5px;">Login</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/index.php?action=see-register-page"><span style="color:#703900; padding:0 4px 2px 4px; background-color:#D1F5FF; border-radius:5px;">Register</span></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>