<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">CRUD SOLUSI TABLE</h4>
                        <?= $this->session->flashdata('pesan'); ?>
                        <a href="<?= base_url('admin/Solusi/tambah') ?>"  type="button mt-3" class="mb-3 btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                        <table id="myTable" class="table mt-3"> 
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1 ;
                                foreach($Solusi as $s) :
                                 ?>
                                <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><i class="<?= $s->icon ?>"></i></td>
                                <td><?= $s->main_text ?></td>
                                <td><?= $s->sub_text ?></td>
                                <td>
                                    <a href="<?= base_url('admin/Solusi/update/' . $s->id_solusi ) ?>" type="button" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="<?= base_url('admin/Solusi/delete/') . $s->id_solusi ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash-can"></i></a> 
                                </td>
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                        </div>
                    </main>