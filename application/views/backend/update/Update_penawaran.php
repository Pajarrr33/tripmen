<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h4 class="mt-3">UPDATE DATA PENAWARAN TABLE</h4>
                            <?php foreach($Penawaran as $p) : ?>
                            <form class="mt-3" action="<?= base_url('admin/Penawaran/update_data/') . $p->id_penawaran ?>" method="post">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Icon</label>
                                    <i class="<?= $p->icon ?>"></i>
                                    <input type="text" name="icon" value="<?= $p->icon ?>" class="form-control" id="formGroupExampleInput" placeholder="Masukan Icon disini">
                                    <?= form_error('icon', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Main Text</label>
                                    <input type="text" name="main_text" value="<?= $p->main_text ?>" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Main Text disini">
                                    <?= form_error('main_text', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Sub Text</label>
                                    <input type="text" name="sub_text" value="<?= $p->sub_text ?>" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Sub Text disini">
                                    <?= form_error('sub_text', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Promo Text</label>
                                    <input type="text" name="promo_text" value="<?= $p->promo_text ?>" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Promo Text disini">
                                    <?= form_error('promo_text', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Nomor WhatsApp</label>
                                    <input type="number" name="wa_link" value="<?= $p->wa_link ?>" class="form-control" id="formGroupExampleInput2" placeholder="Contoh : 628888888888">
                                    <?= form_error('wa_link', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <a href="https://fontawesome.com/search?o=r&m=free&new=yes" class="mt-3">Refrensi icon bisa dilihat disini</a>
                                <div class="modal-footer mt-3 mb-3">
                                    <a href="<?= base_url('admin/Penawaran/') ?>" class="btn btn-secondary">Kembali ke halaman sebelumnya</a>
                                    <button type="Sumbit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            <?php endforeach ?>
                        </div>
                    </main>