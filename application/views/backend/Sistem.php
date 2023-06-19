<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">CRUD SISTEM TABLE</h4>
                            <?= $this->session->flashdata('pesan'); ?>
                            <button type="button mt-3" class="mb-3 btn btn-outline-primary" data-target="#exampleModal" data-toggle="modal" ><i class="fa-solid fa-plus"></i></button>
                            <table id="myTable" class="table mt-3"> 
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Sistem</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no= 1 ;
                                    foreach($Sistem as $s) :
                                    ?>
                                    <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $s->sistem_sewa ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-target="#Update<?= $s->id_sistem ?>" data-toggle="modal"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <a href="<?= base_url('admin/Sistem/delete/') . $s->id_sistem ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash-can"></i></a> 
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sistem Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/Sistem/tambah_data') ?>" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Sistem</label>
                <input type="text" name="sistem" class="form-control" id="formGroupExampleInput" placeholder="Masukan Sistem disini">
                <?= form_error('sistem', '<div class="text-small text-danger">','<?div>'); ?> 
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

<?php foreach($Sistem as $s) : ?>
<!-- Modal Update -->
<div class="modal fade" id="Update<?= $s->id_sistem ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data Sistem table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/Sistem/update_data/') . $s->id_sistem ?>" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Sistem</label>
                <input type="text" name="sistem" value="<?= $s->sistem_sewa ?>" class="form-control" id="formGroupExampleInput" placeholder="Masukan Sistem disini">
                <?= form_error('sistem', '<div class="text-small text-danger">','<?div>'); ?> 
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
                