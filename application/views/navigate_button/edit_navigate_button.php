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
    <?php echo form_open_multipart('Navigate_button/update'); ?>
    <div class="card">
      <div class="card-header">
          <h2>Edit Form</h2>
      </div>
      <div class="card-body">
      <?php foreach ($navigate_button as $row) { ?>
         <input type="hidden" name="button_id" value="<?= $row->button_id ?>">
         <div class="form-grpup">
         <div class="form-grpup">
          <label>Room</label>
          <select name="room" class="form-control" value="">  
          <?php foreach ($room as $room_v): ?>
            <?php if ($room_v->room_id == $row->room_id): ?>
              <option selected value="<?= $room_v->room_id ;?>"><?= $room_v->alamat_rumah; ?></option>
            <?php else: ?>
              <option value="<?= $room_v->room_id ;?>"><?= $room_v->alamat_rumah; ?></option> 
            <?php endif ?>
          <?php endforeach ?>
          </select>
        </div>
          <label>Keterangan</label>
          <select name="keterangan" class="form-control" value="">  
              <?php 

                $keterangan = [ ['Sehat','1'] , ['Sakit','0'] ];

                for ($i=0; $i < count($keterangan) ; $i++) {  ?>

                <?php if ($row->status == $keterangan[$i][1]): ?>
                  <option selected value="<?php echo $keterangan[$i][1] ?>"><?php echo $keterangan[$i][0] ?></option>
                <?php else: ?>
                  <option value="<?php echo $keterangan[$i][1] ?>"><?php echo $keterangan[$i][0] ?></option>
                <?php endif ?>

                <?php } ?>
          </select>
        </div>
        <div class="form-group">
           <label>Tanggal</label>
           <input type="date" name="detail" class="form-control" value="<?= $row->detail ?>">
        </div>
        <div class="form-grpup">
          <label>Bimbingan Orangtua / Wali</label>
          <select name="data_bimbingan" class="form-control" value="">  
              <?php 

                $data_bimbingan = [ ['Orangtua','1'] , ['Wali','0'] ];

                for ($i=0; $i < count($data_bimbingan) ; $i++) {  ?>

                <?php if ($row->status == $data_bimbingan[$i][1]): ?>
                  <option selected value="<?php echo $data_bimbingan[$i][1] ?>"><?php echo $data_bimbingan[$i][0] ?></option>
                <?php else: ?>
                  <option value="<?php echo $data_bimbingan[$i][1] ?>"><?php echo $data_bimbingan[$i][0] ?></option>
                <?php endif ?>

                <?php } ?>
          </select>
        </div>
        <div class="form-group">
           <label>Nama</label>
           <input type="text" name="nama" class="form-control" value="<?= $row->nama ?>">
        </div>
        <div class="form-group">
           <label>Tempat Lahir</label>
           <input type="text" name="tempat_lahir" class="form-control" value="<?= $row->tempat_lahir ?>">
        </div>
        <div class="form-group">
           <label>Tanggal Lahir</label>
           <input type="date" name="tanggal_lahir" class="form-control" value="<?= $row->tanggal_lahir ?>">
        </div>
        <div class="form-group">
           <label>Pekerjaan</label>
           <input type="text" name="pekerjaan" class="form-control" value="<?= $row->pekerjaan ?>">
        </div>
        <div class="form-group">
           <label>Pendidikan Terakhir</label>
           <input type="text" name="pendidikan_terakhir" class="form-control" value="<?= $row->pendidikan_terakhir ?>">
        </div>
        <div class="form-grpup">
          <label>Agama</label>
          <select name="agama_" class="form-control" value="">  
              <?php 

                $agama_ = [ ['Islam','1'] , ['NonIslam','0'] ];

                for ($i=0; $i < count($agama_) ; $i++) {  ?>

                <?php if ($row->jk == $agama_[$i][1]): ?>
                  <option selected value="<?php echo $agama_[$i][1] ?>"><?php echo $agama_[$i][0] ?></option>
                <?php else: ?>
                  <option value="<?php echo $agama_[$i][1] ?>"><?php echo $agama_[$i][0] ?></option>
                <?php endif ?>    
                <?php } ?>
          </select>
        </div>
        <div class="form-group">
           <label>No. Hp</label>
           <input type="number" name="no_hp" class="form-control"value="<?= $row->no_hp ?>">
        </div>
        <div class="modal-footer">
            <a  class="btn btn-danger" href="<?= base_url('Navigate_button/index') ?>">Back</a>   
            <button type="submit" class="btn btn-success">Update</button>
        </div>
      <?php  } ?>
    </div>
  </div>     
  <?php form_close();  ?>
  </div>
</div>