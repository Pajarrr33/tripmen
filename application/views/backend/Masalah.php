<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">CRUD MASALAH TABLE</h4>
                        <?= $this->session->flashdata('pesan'); ?>
                        <button type="button mt-3" class="btn btn-outline-primary mb-3" data-target="#exampleModal" data-toggle="modal" ><i class="fa-solid fa-plus"></i></button>
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
                                foreach($Masalah as $m) :
                                 ?>
                                <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><i class="<?= $m->icon ?>"></i></td>
                                <td><?= $m->text ?></td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning" data-target="#Update<?= $m->id_section ?>" data-toggle="modal"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <a href="<?= base_url('admin/Masalah/delete/') . $m->id_section ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash-can"></i></a> 
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
        <form action="<?= base_url('admin/Masalah/tambah_data') ?>" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Icon</label>
                <input type="text" name="icon" class="form-control" id="formGroupExampleInput" placeholder="Masukan Icon disini">
                <?= form_error('icon', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Deskripsi disini">
                <?= form_error('deskripsi', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <a href="https://fontawesome.com/search?o=r&m=free&new=yes" class="ml-0">Refrensi icon bisa dilihat disini</a>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Sumbit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php foreach($Masalah as $m) : ?>
<!-- Modal Update -->
<div class="modal fade" id="Update<?= $m->id_section ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update data benefit table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/Masalah/update_data/') . $m->id_section ?>" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Icon </label>
                <i class="<?= $m->icon ?>"></i>
                <input type="text" name="icon" value="<?= $m->icon ?>" class="form-control" id="formGroupExampleInput" placeholder="Masukan Icon disini">
                <?= form_error('icon', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Deskripsi</label>
                <input type="text" name="deskripsi" value="<?= $m->text ?>" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Deskripsi disini">
                <?= form_error('deskripsi', '<div class="text-small text-danger">','<?div>'); ?>
            </div>
            <a href="https://fontawesome.com/search?o=r&m=free&new=yes" class="ml-0">Refrensi icon bisa dilihat disini</a>
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
                