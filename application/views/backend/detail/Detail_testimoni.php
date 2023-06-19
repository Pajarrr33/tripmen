<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">DETAIL TESTIMONI TABLE</h4>
                        <?php foreach($Testimoni as $t) : ?>
                            <div class="card mb-3">
                                <img class="card-img-top" src="<?= base_url('upload/testimoni/') . $t->profil_img ?>" alt="Card image cap">
                                <div class="card-body ">
                                    <h5 class="card-title">Data Diri</h5>
                                    <p class="card-text">Nama : <?= $t->nama ?></p>
                                    <p class="card-text">Asal : <?= $t->asal ?></p>
                                    <p class="card-text">Tetsimoni : <?= $t->text ?></p>
                                </div>
                            </div>
                        <?php endforeach ; ?>
                        <a href="<?= base_url('admin/Testimoni/') ?>" class="btn btn-secondary mb-4">Kembali ke halaman sebelumnya</a>
                        </div>
                    </main>