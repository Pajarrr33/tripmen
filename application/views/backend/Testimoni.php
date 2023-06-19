<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">CRUD TESTIMONI TABLE</h4>
                        <?= $this->session->flashdata('pesan'); ?>
                        <a href="<?= base_url('admin/Testimoni/tambah' ) ?>" type="button mt-3" class="mb-3 btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                        <table id="myTable" class="table mt-3"> 
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Asal</th>
                                <th scope="col">Gambar Profil</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php $no= 1 ;
                                foreach($Testimoni as $t) :
                                 ?>
                                <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $t->nama ?></td>
                                <td><?= $t->asal ?></td>
                                <td><img src="<?= base_url('upload/testimoni/') . $t->profil_img ?>" alt="" width="100px" height="50px" style="object-fit:contain;" ></td>
                                <td>
                                    <a href="<?= base_url('admin/Testimoni/detail/' . $t->id_testimoni ) ?>" type="button" class="btn btn-outline-success"><i class="fa-solid fa-magnifying-glass"></i></a>
                                    <a href="<?= base_url('admin/Testimoni/update/' . $t->id_testimoni ) ?>" type="button" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="<?= base_url('admin/Testimoni/delete/') . $t->id_testimoni ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash-can"></i></a> 
                                </td>
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                        </div>
                    </main>
                