<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h4 class="mt-3">DETAIL DATA PENAWARAN TABLE</h4>
                            <?php foreach($Penawaran as $p) : ?>
                            <div class="mt-3">
                                 <p>Icon :  <i class="<?= $p->icon ?>"></i> / <?= $p->icon ?></p>
                            </div>
                            <div class="mt-3">
                                 <p>Main Text : <?= $p->main_text ?></p>
                            </div>
                            <div class="mt-3">
                                 <p>Sub Text :  <?= $p->sub_text ?></p>
                            </div>
                            <div class="mt-3">
                                 <p>Promo Text : <?= $p->promo_text ?></p>
                            </div>
                            <div class="mt-3">
                                 <p>Nomor WhatsApp : <?= $p->wa_link ?></p>
                            </div>
                            <?php endforeach ; ?>
                            <a href="<?= base_url('admin/Penawaran/') ?>" class="btn btn-secondary">Kembali ke halaman sebelumnya</a>
                        </div>
                    </main>