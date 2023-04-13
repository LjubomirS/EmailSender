<?php
require_once __DIR__ . '/../header.php';
?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">List of All Emails</h1>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php foreach($emails as $email): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow" style="background-color: #a0eff8;">
                            <div class="card-body">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted">Id: <?=$email->emailId()?></h6>
                                        <h6 class="card-subtitle mb-2 text-muted">Sent by user: id <?=$email->userId()?></h6>
                                        <h6 class="card-subtitle mb-2 text-muted">Recipient Name: <?=$email->recipientName()?></h6>
                                        <h6 class="card-subtitle mb-2 text-muted">Recipient Email: <?=$email->recipientEmail()?></h6>
                                        <h6 class="card-subtitle mb-2 text-muted">Title: <?=$email->title()?></h6>
                                        <h6 class="card-subtitle mb-2 text-muted">Text: <?=$email->text()?></h6>
                                        <a href="/index.php?action=delete-email&emailId=<?=$email->emailId()?>" class="btn btn-md btn-danger">Delete Email</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>


<?php
require_once __DIR__ . '/../footer.php';
?>