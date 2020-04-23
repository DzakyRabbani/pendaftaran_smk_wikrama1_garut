<div class="main-content">
  <div class="section-body">  
<!-- 	<?php if($this->session->flashdata('success')){ ?>  
     <div class="alert alert-success" id="flashdata-alert">  
       <a href="#" class="close" data-dismiss="alert">&times;</a>  
       <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>  
     </div>  
   <?php } else if($this->session->flashdata('error')){ ?>  
     <div class="alert alert-danger">  
       <a href="#" class="close" data-dismiss="alert">&times;</a>  
       <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>  
     </div>  
	 <?php }?> -->
    <?php echo form_open_multipart('Room/update'); ?>
    <div class="card">
      <div class="card-header">
          <h2>Edit Form</h2>
      </div>
      <div class="card-body">
      <?php foreach ($room as $row) { ?>
         <input type="hidden" name="room_id" value="<?= $row->room_id ?>">
        <div class="form-group">
           <label>Alamat Rumah</label>
           <input type="text" name="alamat_rumah" class="form-control" value="<?= $row->alamat_rumah ?>">
        </div>
        <div class="form-group">
           <label>Kelurahan</label>
           <input type="text" name="kelurahan" class="form-control" value="<?= $row->kelurahan ?>">
        </div>
        <div class="form-group">
           <label>Kecamatan</label>
           <input type="text" name="kecamatan" class="form-control" value="<?= $row->kecamatan ?>">
        </div>
        <div class="form-group">
           <label>Kota / Kabupaten</label>
           <input type="text" name="kota_kabupaten" class="form-control" value="<?= $row->kota_kabupaten ?>">
        </div>
        <div class="form-group">
           <label>Propinsi</label>
           <input type="text" name="propinsi" class="form-control" value="<?= $row->propinsi ?>">
        </div>
        <div class="form-group">
           <label>Kode Pos</label>
           <input type="number" name="kode_pos" class="form-control" value="<?= $row->kode_pos ?>">
        </div>
        <div class="form-group">
           <label>No. Telepon Rumah</label>
           <input type="number" name="no_telepon_rumah" class="form-control" value="<?= $row->no_telepon_rumah ?>">
        </div>
        <div class="form-group">
           <label>Email</label>
           <input type="text" name="email" class="form-control" value="<?= $row->email ?>">
        </div>
        <div class="form-grpup">
          <label>Tinggal Dengan</label>
          <select name="tinggal_dengan" class="form-control" value="">  
              <?php 

                $status = [ ['Keluarga','1'] , ['Tidak Keluarga','0'] ];

                for ($i=0; $i < count($status) ; $i++) {  ?>

                <?php if ($row->status == $status[$i][1]): ?>
                  <option selected value="<?php echo $status[$i][1] ?>"><?php echo $status[$i][0] ?></option>
                <?php else: ?>
                  <option value="<?php echo $status[$i][1] ?>"><?php echo $status[$i][0] ?></option>
                <?php endif ?>

                

                <?php } ?>
          </select>
        </div>
        <div class="modal-footer">
            <a  class="btn btn-danger" href="<?= base_url('Room/index') ?>">Back</a>   
            <button type="submit" class="btn btn-success">Update</button>
        </div>
      <?php  } ?>
    </div>
  </div>     
  <?php form_close();  ?>
  </div>
</div>