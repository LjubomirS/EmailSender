<?php
require_once __DIR__ . '/../header.php';
//$user = $_SESSION['user'];
//echo $user;

?>

<main class="flex-shrink-0">
    <div class="container">
        <h3 class="mt-5">Email Form: </h3>
        <div style="height:20px"></div>
        <div class="row align-items-start">
            <div class="col">
                <?php $isAuthenticated = isset($_SESSION['logged_in']) &&  $_SESSION['logged_in'] === true; ?>
                <?php if($isAuthenticated): ?>
                    <p>Hello, <?php echo $_SESSION['logged_user']; ?></p>
                <?php endif; ?>
                <form class="row g-3" method="post" action="/index.php?action=send-store-email" style="flex-direction: column;">

                    <div class="col-3">
                        <label for="name">Recipient Name: </label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Recipient Name" required>
                    </div>
                    <div class="col-3">
                        <label for="recipientEmail">Recipient Email: </label>
                        <input type="email" name="recipientEmail" class="form-control" id="recipientEmail" placeholder="Enter Recipient Email" required>
                    </div>
                    <div class="col-3">
                        <label for="title">Title: </label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required>
                    </div>
                    <div class="col-3">
                        <label for="text">Text: </label>
                        <textarea name="text" class="form-control" id="text" rows="5" cols="40" placeholder="Enter Text" required></textarea>
                    </div>
                    <div class="col-auto" style="padding-top:23px">
                        <button type="submit" class="btn btn-success mb-3">Send Email</button>
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


