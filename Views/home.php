<?= setHeader($data) ?>
<?= setNav($data) ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-house"></i>
                        <?= $data['page_title'] ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <?= $data['page_title'] ?>
                </h3>
            </div>
            <div class="card-body">
                <?= dep($_SESSION['userData']) ?>
            </div>
            <div class="card-footer">
                Card footer
            </div>
        </div>
    </section>
</div>

<?= setFooter($data) ?>