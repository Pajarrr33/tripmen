<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h4 class="mt-3">TAMBAH DATA SOLUSI TABLE</h4>
                            <form class="mt-3" action="<?= base_url('admin/Solusi/tambah_data') ?>" method="post">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Icon</label>
                                    <input type="text" name="icon" class="form-control" id="formGroupExampleInput" placeholder="Masukan Icon disini">
                                    <?= form_error('icon', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Main Text</label>
                                    <input type="text" name="main_text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Main Text disini">
                                    <?= form_error('main_text', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Sub Text</label>
                                    <textarea name="sub_text" class="form-control" id="sub_text" placeholder="Masukan Sub Text Disini" rows="10" cols="80"></textarea>
                                    <?= form_error('sub_text', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <a href="https://fontawesome.com/search?o=r&m=free&new=yes" class="mt-3">Refrensi icon bisa dilihat disini</a>
                                <div class="modal-footer mt-3 mb-3">
                                    <a href="<?= base_url('admin/Solusi/') ?>" class="btn btn-secondary">Kembali ke halaman sebelumnya</a>
                                    <button type="Sumbit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </main>
                    <script>
                        CKEDITOR.replace('sub_text');
                    </script>