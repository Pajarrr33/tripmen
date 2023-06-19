<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h4 class="mt-3">UPDATE DATA SEWA TABLE</h4>
                            <?php foreach($Sewa as $s) : ?>
                                <form class="mt-3" action="<?= base_url('admin/Sewa/update_data/') . $s->id_sewa ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Jenis Kendraaan</label>
                                    <select name="kendaraaan" class="form-control form_input" id="formGroupExampleInput">
                                        <?php if($s->jenis_penyewaan == "Mobil") : ?>
                                        <option value="Mobil">Mobil</option> 
                                        <option value="Motor">Motor</option>
                                        <?php endif ; ?>
                                        <?php if($s->jenis_penyewaan == "Motor") : ?>
                                        <option value="Motor">Motor</option>
                                        <option value="Mobil">Mobil</option>
                                        <?php endif ; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Image </label> <br>
                                    <img src="<?= base_url('upload/sewa/') . $s->img ?>" alt="" width="200px" height="100px" style="object-fit:contain;" >
                                    <input type="hidden" name="old_img" value="<?= $s->img ?>">
                                    <input type="file" name="img" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Image disini">                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Brand</label>
                                    <input type="text" name="brand" value="<?= $s->brand ?>" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Brand disini">
                                    <?= form_error('brand', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Spesifik</label>
                                    <input type="text" name="spesifik" value="<?= $s->spesifik ?>" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Spesifik disini">
                                    <?= form_error('spesifik', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Harga Sewa</label>
                                    <input type="number" name="sewa" value="<?= $s->harga_sewa ?>" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Harga Sewa disini">
                                    <?= form_error('sewa', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Nomor WhatsApp</label>
                                    <input type="number" name="wa_link" value="<?= $s->wa_link ?>" class="form-control" id="formGroupExampleInput2" placeholder="Contoh : 628888888888">
                                    <?= form_error('wa_link', '<div class="text-small text-danger">','<?div>'); ?> 
                                </div>
                                <div class="modal-footer mt-3 mb-3">
                                    <a href="<?= base_url('admin/Sewa/') ?>" class="btn btn-secondary">Kembali ke halaman sebelumnya</a>
                                    <button type="Sumbit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            <?php endforeach ?>
                        </div>
                    </main>