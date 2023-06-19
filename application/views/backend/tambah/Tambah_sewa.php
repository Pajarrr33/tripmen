<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h4 class="mt-3">TAMBAH DATA SEWA TABLE</h4>
                            <form class="mt-3" action="<?= base_url('admin/Sewa/tambah_data') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Jenis Kendraaan</label>
                                    <select name="kendaraaan" class="form-control" id="formGroupExampleInput" class="form_input" >
                                        <option value="Mobil">Mobil</option>
                                        <option value="Motor">Motor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Image</label>
                                    <input type="file" name="img" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Image disini">
                                    <div class="text-danger"><?php if(isset($error)) {echo $error;} ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Brand</label>
                                    <input type="text" name="brand" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Brand disini">
                                    <?= form_error('brand', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Spesifik</label>
                                    <input type="text" name="spesifik" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Spesifik disini">
                                    <?= form_error('spesifik', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Harga Sewa</label>
                                    <input type="number" name="sewa" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Harga Sewa disini">
                                    <?= form_error('sewa', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Nomor WhatsApp</label>
                                    <input type="number" name="wa_link" class="form-control" id="formGroupExampleInput2" placeholder="Contoh : 628888888888">
                                    <?= form_error('wa_link', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="modal-footer mt-3 mb-3">
                                    <a href="<?= base_url('admin/Sewa/') ?>" class="btn btn-secondary">Kembali ke halaman sebelumnya</a>
                                    <button type="Sumbit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </main>