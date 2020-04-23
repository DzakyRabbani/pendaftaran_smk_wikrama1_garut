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
    <?php echo form_open_multipart('property/update'); ?>
    <div class="card">
      <div class="card-header">
          <h2>Edit Form</h2>
      </div>
      <div class="card-body">
      <?php foreach ($property as $row) { ?>
         <input type="hidden" name="property_id" value="<?= $row->property_id ?>">
        <div class="form-group">
           <label>Nama Lengkap</label>
           <input type="text" name="nama_lengkap" class="form-control" value="<?= $row->nama_lengkap ?>">
        </div>
        <div class="form-group">
           <label>Nama Panggilan</label>
           <input type="text" name="nama_panggilan" class="form-control" value="<?= $row->nama_panggilan ?>">
        </div>
        <div class="form-group">
            <label>Foto Peserta</label>
            <input type="file" name="img_source" class="form-control" value="">
            <input type="hidden" name="img_update" value="<?php echo @$row->img_source ?>">
            <span><?= $row->img_source ?></span>
        </div>
        <div class="form-grpup">
          <label>Jenis Kelamin</label>
          <select name="jk" class="form-control" value="">  
              <?php 

                $jk = [ ['Laki-laki','1'] , ['Perempuan','0'] ];

                for ($i=0; $i < count($jk) ; $i++) {  ?>

                <?php if ($row->jk == $jk[$i][1]): ?>
                  <option selected value="<?php echo $jk[$i][1] ?>"><?php echo $jk[$i][0] ?></option>
                <?php else: ?>
                  <option value="<?php echo $jk[$i][1] ?>"><?php echo $jk[$i][0] ?></option>
                <?php endif ?>    
                <?php } ?>
          </select>
        </div>
        <div class="form-group">
           <label>Tempat Tanggal Lahir</label>
           <textarea input type="text" name="ttl" class="form-control"><?= $row->ttl ?></textarea>
        </div>
        <div class="form-grpup">
          <label>Agama</label>
          <select name="agama" class="form-control" value="">  
              <?php 

                $agama = [ ['Islam','1'] , ['NonIslam','0'] ];

                for ($i=0; $i < count($agama) ; $i++) {  ?>

                <?php if ($row->jk == $agama[$i][1]): ?>
                  <option selected value="<?php echo $agama[$i][1] ?>"><?php echo $agama[$i][0] ?></option>
                <?php else: ?>
                  <option value="<?php echo $agama[$i][1] ?>"><?php echo $agama[$i][0] ?></option>
                <?php endif ?>    
                <?php } ?>
          </select>
        </div>
        <div class="form-group">
           <label>Cita - cita</label>
           <input type="text" name="cita_cita" class="form-control" value="<?= $row->cita_cita ?>">
        </div>
        <div class="form-group">
           <label>Hoby</label>
           <input type="text" name="hoby" class="form-control" value="<?= $row->hoby ?>">
        </div>
        <div class="form-group">
           <label>Anak Ke-</label>
           <input type="number" name="anak_ke" class="form-control" value="<?= $row->anak_ke ?>">
        </div>
        <div class="form-group">
           <label>Jumlah Bersaudara</label>
           <input type="number" name="jumlah_bersaudara" class="form-control" value="<?= $row->jumlah_bersaudara ?>">
        </div>
        <div class="form-group">
           <label>Berat Badan</label>
           <input type="number" name="berat_badan" class="form-control" value="<?= $row->berat_badan ?>">
        </div>
        <div class="form-group">
           <label>Tinggi Badan</label>
           <input type="number" name="tinggi_badan" class="form-control" value="<?= $row->tinggi_badan ?>">
        </div>
        <div class="form-group">
           <label>Golongan Darah</label>
           <input type="text" name="golongan_darah" class="form-control" value="<?= $row->golongan_darah ?>">
        </div>
        <div class="modal-footer">
            <a  class="btn btn-danger" href="<?= base_url('property/index') ?>">Back</a>   
            <button type="submit" class="btn btn-success">Update</button>
        </div>
      <?php  } ?>
    </div>
  </div>     
  <?php form_close();  ?>
  </div>
</div>