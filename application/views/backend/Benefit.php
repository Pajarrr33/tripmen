    <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">CRUD BENEFIT TABLE</h4>
                        <?= $this->session->flashdata('pesan'); ?>
                        <button type="button" class="btn btn-outline-primary mb-3" data-target="#exampleModal" data-toggle="modal" ><i class="fa-solid fa-plus"></i></button>
                        <table id="myTable" class="table mt-3"> 
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1 ;
                                foreach($Benefit as $b) :
                                 ?>
                                <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $b->judul_benefit ?></td>
                                <td><?= $b->deskripsi ?></td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning" data-target="#Update<?= $b->id_benefit ?>" data-toggle="modal"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <a href="<?= base_url('admin/Benefit/delete/') . $b->id_benefit ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash-can"></i></a> 
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Benefit Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/Benefit/tambah_data') ?>" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Judul</label>
                <input type="text" name="judul" class="form-control" id="formGroupExampleInput" placeholder="Masukan Judul disini">
                <?= form_error('judul', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Deskripsi disini">
                <?= form_error('deskripsi', '<div class="text-small text-danger">','<?div>'); ?> 
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

<?php foreach($Benefit as $b) : ?>
<!-- Modal Update -->
<div class="modal fade" id="Update<?= $b->id_benefit ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update data benefit table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/Benefit/update_data/') . $b->id_benefit ?>" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Judul</label>
                <input type="text" name="judul" value="<?= $b->judul_benefit ?>" class="form-control" id="formGroupExampleInput" placeholder="Masukan Judul disini">
                <?= form_error('judul', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Deskripsi</label>
                <input type="text" name="deskripsi" value="<?= $b->deskripsi ?>" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Deskripsi disini">
                <?= form_error('deskripsi', '<div class="text-small text-danger">','<?div>'); ?>
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