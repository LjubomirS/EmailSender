<?php
require_once __DIR__ . '/../header.php';
?>

<main class="flex-shrink-0">
    <div class="container">
        <h3 class="mt-5">Enter Login Details: </h3>
        <div style="height:20px"></div>
        <div class="row align-items-start">
            <div class="col">
                <form class="row g-3" method="post" action="/index?action=login-user">
                    <div class="col-auto">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="col-auto">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password" required>
                    </div>
                    <div class="col-auto" style="padding-top:23px">
                        <button type="submit" class="btn btn-success mb-3">Login</button>
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