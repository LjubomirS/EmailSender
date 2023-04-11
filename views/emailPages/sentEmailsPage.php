<?php
require_once __DIR__ . '/../header.php';
?>

<?php $emails ?>

    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">List of Sent Emails</h1>
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
                                            <h3 class="card-title">Id: <?=$email->emailId()?></h3>
                                            <h6 class="card-subtitle mb-2 text-muted">Sent by user: id <?=$email->userId()?></h6>
                                            <h6 class="card-subtitle mb-2 text-muted">Title: <?=$email->title()?></h6>
                                            <h6 class="card-subtitle mb-2 text-muted">Title: <?=$email->text()?></h6>
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