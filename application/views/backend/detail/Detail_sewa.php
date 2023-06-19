<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">DETAIL SEWA TABLE</h4>
                            <?php foreach($Sewa as $s) : ?>
                            <div class="card mt-3 mb-3">
                                <img class="card-img-top" src="<?= base_url('upload/sewa/') . $s->img ?>" alt="Card image cap" style="object-fit: contain ;" >
                                <div class="card-body">
                                    <h5 class="card-title">Jenis Kendaraan :</h5>
                                    <p class="card-text"><?= $s->jenis_penyewaan ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Brand dan spesifik :</li>
                                    <li class="list-group-item"><?= $s->brand ?></li>
                                    <li class="list-group-item"><?= $s->spesifik ?></li>
                                </ul>
                                <div class="card-body">
                                    <p class="card-title">Harga Sewa :</p>
                                    <p class="card-text"><?= $s->harga_sewa ?></p>
                                </div>
                                <div class="card-body">
                                    <p class="card-title">Nomor WhatsApp :</p>
                                    <p class="card-text"><?= $s->wa_link ?></p>
                                </div>
                            </div>
                            <?php endforeach ; ?>
                            <a href="<?= base_url('admin/Sewa/') ?>" class="btn btn-secondary mt-3 mb-3">Kembali ke halaman sebelumnya</a>
                        </div>
                    </main>