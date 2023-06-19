<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">CRUD Sewa TABLE</h4>
                        <?= $this->session->flashdata('pesan'); ?>
                        <a href="<?= base_url('admin/Sewa/tambah' ) ?>" type="button mt-3" class="mb-3 btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                        <table id="myTable" class="table mt-3"> 
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Kendaraan</th>
                                <th scope="col">Image</th>
                                <th scope="col">Spesifik</th>
                                <th scope="col">Harga Sewa </th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php $no= 1 ;
                                foreach($Sewa as $s) :
                                 ?>
                                <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $s->jenis_penyewaan ?></td>
                                <td><img src="<?= base_url('upload/sewa/') . $s->img ?>" alt="" width="100px" height="50px" style="object-fit:contain;" ></td>
                                <td><?= $s->spesifik ?></td>
                                <td><?= $s->harga_sewa ?></td>
                                <td>
                                    <a href="<?= base_url('admin/Sewa/detail/' . $s->id_sewa ) ?>" type="button" class="btn btn-outline-success"><i class="fa-solid fa-magnifying-glass"></i></a>
                                    <a href="<?= base_url('admin/Sewa/update/' . $s->id_sewa ) ?>" type="button" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="<?= base_url('admin/Sewa/delete/') . $s->id_sewa ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash-can"></i></a> 
                                </td>
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                        </div>
                    </main>
