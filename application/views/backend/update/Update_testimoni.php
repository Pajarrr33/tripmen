<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h4 class="mt-3">UPDATE DATA SEWA TABLE</h4>
                            <?php foreach($Testimoni as $t) : ?>
                                <form class="mt-3" action="<?= base_url('admin/Testimoni/update_data/') . $t->id_testimoni ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Gambar Profil</label> <br>
                                    <img src="<?= base_url('upload/testimoni/') . $t->profil_img ?>" width="100px" height="75px" style="object-fit:contain;"  alt="Profile Image">
                                    <input type="hidden" name="old_img" value="<?= $t->profil_img ?>">
                                    <input type="file" name="img" class="form-control mt-3" id="formGroupExampleInput2" placeholder="Masukan Image disini">
                                    <div class="text-danger"><?php if(isset($error)) {echo $error;} ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Nama</label>
                                    <input type="text" name="nama" value="<?= $t->nama ?>" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Nama disini">
                                    <?= form_error('nama', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Asal</label>
                                    <input type="text" name="asal" value="<?= $t->asal ?>" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Asal disini">
                                    <?= form_error('asal', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Text</label>
                                    <textarea type="text" name="text" class="form-control" rows="8" id="text" placeholder="Masukan Text disini"><?= $t->text ?></textarea>
                                    <?= form_error('text', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="modal-footer mt-3 mb-3">
                                    <a href="<?= base_url('admin/Testimoni/') ?>" class="btn btn-secondary">Kembali ke halaman sebelumnya</a>
                                    <button type="Sumbit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            <?php endforeach ?>
                        </div>
                    </main>
                    <script>
                        CKEDITOR.replace('text');
                    </script>