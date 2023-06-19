<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">CRUD PROMO TABLE</h4>
                            <?= $this->session->flashdata('pesan'); ?>
                            <button type="button mt-3" class="btn btn-outline-primary mb-3" data-target="#exampleModal" data-toggle="modal" ><i class="fa-solid fa-plus"></i></button>
                            <table id="myTable" class="table mt-3"> 
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Promo</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no= 1 ;
                                    foreach($Promo as $p) :
                                    ?>
                                    <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $p->promo ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-target="#Update<?= $p->id_promo ?>" data-toggle="modal"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <a href="<?= base_url('admin/Promo/delete/') . $p->id_promo ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash-can"></i></a> 
                                    </td>
                                    </tr>
                                    <?php endforeach ; ?>
                                </tbody>
                            </table>
                        </div>
                    </main>
                
<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Promo Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/Promo/tambah_data') ?>" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Promo</label>
                <input type="text" name="promo" class="form-control" id="formGroupExampleInput" placeholder="Masukan Promo disini">
                <?= form_error('promo', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Sumbit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php foreach($Promo as $p) : ?>
<!-- Modal Update -->
<div class="modal fade" id="Update<?= $p->id_promo ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data Promo table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/Promo/update_data/') . $p->id_promo ?>" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Promo</label>
                <input type="text" name="promo" value="<?= $p->promo ?>" class="form-control" id="formGroupExampleInput" placeholder="Masukan Promo disini">
                <?= form_error('promo', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Sumbit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ; ?>           