<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">CRUD PENAWARAN TABLE</h4>
                        <?= $this->session->flashdata('pesan'); ?>
                        <a href="<?= base_url('admin/Penawaran/tambah' ) ?>" type="button mt-3" class="btn btn-outline-primary mb-3"><i class="fa-solid fa-plus"></i></a>
                        <table id="myTable" class="table mt-3"> 
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1 ;
                                foreach($Penawaran as $p) :
                                 ?>
                                <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><i class="<?= $p->icon ?>"></i></td>
                                <td><?= $p->main_text ?></td>
                                <td>
                                    <a href="<?= base_url('admin/Penawaran/detail/' . $p->id_penawaran ) ?>" type="button" class="btn btn-outline-success"><i class="fa-solid fa-magnifying-glass"></i></a>
                                    <a href="<?= base_url('admin/Penawaran/update/' . $p->id_penawaran ) ?>" type="button" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="<?= base_url('admin/Penawaran/delete/') . $p->id_penawaran ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash-can"></i></a> 
                                </td>
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                        </div>
                    </main>
                