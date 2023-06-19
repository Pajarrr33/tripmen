<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h4 class="mt-3">TAMBAH DATA TESTIMONI TABLE</h4>
                            <form class="mt-3" action="<?= base_url('admin/Testimoni/tambah_data') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Gambar Profil</label>
                                    <input type="file" name="img" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Image disini">
                                    <div class="text-danger"><?php if(isset($error)) {echo $error;} ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Nama disini">
                                    <?= form_error('nama', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Asal</label>
                                    <input type="text" name="asal" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Asal disini">
                                    <?= form_error('asal', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Text</label>
                                    <textarea type="text" name="text" class="form-control" rows="8" id="text" placeholder="Masukan Text disini"></textarea>
                                    <?= form_error('text', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="modal-footer mt-3 mb-3">
                                    <a href="<?= base_url('admin/Testimoni/') ?>" class="btn btn-secondary">Kembali ke halaman sebelumnya</a>
                                    <button type="Sumbit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </main>
                    <script>
                        CKEDITOR.replace('text');
                    </script>