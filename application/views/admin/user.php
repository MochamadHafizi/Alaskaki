<div class="container-fluid">
    <h3 class="text-center" style="font-family: times new roman;">User</h3>
    <td>
     <button class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">Tambah</button>
    </td>
    <?php 
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>
    <table class="table table-bordered table-hover table-striped">
    <tr>
        <th>No</th>
        <th>Nama User</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th colspan="3">Aksi</th>
    </tr>
    <?php $no=1; 
     foreach($user as $key => $value ){

     ?>
    <tr>    
    <td><?= $no++; ?></td>
    <td><?=  $value->nama?></td>
    <td><?=  $value->username?></td>
    <td><?=  $value->password?></td>
    <td><?php if($value->level == 1){
        echo '<h5><span class="badge rounded-pill bg-primary text-white">Admin</span></h5>';
    }else{
        echo '<h5><span class="badge rounded-pill bg-success text-white">User</span></h5>';
    } ?></td>
    <td>
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $value->id?>">Edit</button>
    </td>
    <td>
   <?php echo anchor('admin/user/delete/'.$value->id, '<div class="btn btn-danger btn-sm">Hapus</div>') ?>
    </td>
    </tr>
    <?php } ?>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('admin/user/add'); ?>

        <div class="form-group">
        <label for="">Nama User</label>
        <input type="text" class="form-control" name="nama"> 
        </div>

        <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username"> 
        </div>

        <div class="form-group">
        <label for="">Password</label>
        <input type="text" class="form-control" name="password"> 
        </div>

        <div class="form-group">
        <label for="">Level User</label>
       <select name="level" id="" class="form-control">
       <option value="1">Admin</option>
       <option value="2">User</option>
       </select>
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<?php  
     foreach($user as $key => $value ){

     ?>
<div class="modal fade" id="edit<?= $value->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('admin/user/edit/'.$value->id); ?>

        <div class="form-group">
        <label for="">Nama User</label>
        <input type="text" class="form-control" name="nama" value="<?= $value->nama?>"> 
        </div>

        <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" value="<?= $value->username?>"> 
        </div>

        <div class="form-group">
        <label for="">Password</label>
        <input type="text" class="form-control" name="password" value="<?= $value->password?>"> 
        </div>

        <div class="form-group">
        <label for="">Level User</label>
       <select name="level" id="" class="form-control">
       <option value="1" <?php if ($value->level == 1) {
           echo 'selected';
       } ?>>Admin</option>
       <option value="2" <?php if ($value->level == 2) {
           echo 'selected';
       } ?>>>User</option>
       </select>
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>