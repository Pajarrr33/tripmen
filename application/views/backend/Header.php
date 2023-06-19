<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                        <h4 class="mt-3">CRUD HEADER TABLE</h4>
                        <?= $this->session->flashdata('pesan'); ?>
                        <button type="button" data-target="#exampleModal" data-toggle="modal"  type="button mt-3" class="btn btn-outline-primary mb-3"><i class="fa-solid fa-plus"></i></button>
                        <table id="myTable" class="table mt-3"> 
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Text</th>
                                <th scope="col">Wa Link</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php $no= 1 ;
                                foreach($Header as $h) :
                                 ?>
                                <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><img src="<?= base_url('upload/section_1/') . $h->logo ?>" alt="" width="100px" height="25px" style="object-fit:contain;" ></td>
                                <td><?= $h->name ?></td>
                                <td><?= $h->text ?></td>
                                <td><?= $h->wa_link ?></td>
                                <td>
                                    <button type="button" data-target="#Update<?= $h->id_header ?>" data-toggle="modal" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <a href="<?= base_url('admin/Header/delete/') . $h->id_header ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash-can"></i></a> 
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Header Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/Header/tambah_data') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="formGroupExampleInput">Logo</label>
                <input type="file" name="logo" class="form-control" id="formGroupExampleInput" placeholder="Masukan Logo disini">
                <div class="text-danger"><?php if(isset($error)) {echo $error;} ?></div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Brand Name</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Masukan Brand Name disini">
                <?= form_error('name', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Text</label>
                <input type="text" name="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Text disini">
                <?= form_error('text', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">WA Link</label>
                <input type="text" name="wa" class="form-control" id="formGroupExampleInput" placeholder="Masukan Wa Link disini">
                <?= form_error('wa', '<div class="text-small text-danger">','<?div>'); ?> 
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

<?php foreach($Header as $h) : ?>
<!-- Modal Update -->
<div class="modal fade" id="Update<?= $h->id_header ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data Sistem table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/Header/update_data/') . $h->id_header ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="formGroupExampleInput">Logo :</label>
                <img src="<?= base_url('upload/section_1/') . $h->logo ?>" alt="" width="100px" height="25px" style="object-fit:contain;" >
                <input type="hidden" name="old_img" value="<?= $h->logo ?>">
                <input type="file" name="logo" class="form-control" id="formGroupExampleInput" placeholder="Masukan Logo disini">
                <div class="text-danger"><?php if(isset($error)) {echo $error;} ?></div> 
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Brand Name</label>
                <input type="text" name="name" value="<?= $h->name ?>" class="form-control" id="formGroupExampleInput" placeholder="Masukan Brand Name disini">
                <?= form_error('name', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Text</label>
                <input type="text" name="text" value="<?= $h->text ?>" class="form-control" id="formGroupExampleInput" placeholder="Masukan Text disini">
                <?= form_error('text', '<div class="text-small text-danger">','<?div>'); ?> 
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">WA Link</label>
                <input type="text" name="wa" value="<?= $h->wa_link ?>" class="form-control" id="formGroupExampleInput" placeholder="Masukan Wa Link disini">
                <?= form_error('wa', '<div class="text-small text-danger">','<?div>'); ?> 
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
                