<?php
require_once __DIR__ . '/../header.php';
?>

<main class="flex-shrink-0">
    <div class="container">
        <h3 class="mt-5">Enter Register Details: </h3>
        <div style="height:20px"></div>
        <div class="row align-items-start">
            <div class="col">
                <?php
                    $message = $_GET['message'] ?? '';

                    if ($message === 'email_exists') {
                        echo 'Email already exists';
                    }
                ?>
                <form class="row g-3" method="post" action="/index.php?action=register-user" style="flex-direction: column;">
                    <div class="col-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" required>
                    </div>
                    <div class="col-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="col-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password" required>
                    </div>
                    <div class="col-3">
                        <label for="repeat_password">Repeat Password</label>
                        <input type="password" name="repeat_password" class="form-control" id="repeat_password" placeholder="Repeat Your Password" required>
                    </div>
                    <div class="col-auto" style="padding-top:23px">
                        <button type="submit" class="btn btn-success mb-3">Register</button>
                    </div>
                </form>
                <hr />
            </div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/../footer.php';
?>