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
    <?php echo form_open_multipart('Versi/update'); ?>
    <div class="card">
      <div class="card-header">
          <h2>Edit Form</h2>
      </div>
      <div class="card-body">
      <?php foreach ($versi as $row) { ?>
         <input type="hidden" name="version_id" value="<?= $row->version_id ?>">
        <div class="form-group">
           <label>Mata Pelajaran</label>
           <input type="text" name="mata_pelajaran" class="form-control" value="<?= $row->mata_pelajaran ?>">
        </div>
        <div class="form-group">
           <label>Tingkat Kelas</label>
           <input type="number" name="tingkat_kelas" class="form-control" value="<?= $row->tingkat_kelas ?>">
        </div>
        <div class="form-grpup">
          <label>Semester</label>
          <select name="semester" class="form-control" value="">  
              <?php 

                $semester = [ ['1','1'] , ['2','0'] ];

                for ($i=0; $i < count($semester) ; $i++) {  ?>

                <?php if ($row->status == $semester[$i][1]): ?>
                  <option selected value="<?php echo $semester[$i][1] ?>"><?php echo $semester[$i][0] ?></option>
                <?php else: ?>
                  <option value="<?php echo $semester[$i][1] ?>"><?php echo $semester[$i][0] ?></option>
                <?php endif ?>

                <?php } ?>
          </select>
        </div>
        <div class="form-group">
           <label>Nilai</label>
           <input type="number" name="nilai" class="form-control" value="<?= $row->nilai ?>">
        </div>
        <div class="form-group">
           <label>Prestasi Yang Pernah Diraih</label>
           <input type="text" name="prestasi" class="form-control" value="<?= $row->prestasi ?>">
        </div>
        <div class="form-grpup">
          <label>Informasi Ini Tau Dari ?</label>
          <select name="informasi" class="form-control" value="">  
              <?php 

                $informasi = [ ['Media','1'] , ['Orang Lain','0'] ];

                for ($i=0; $i < count($informasi) ; $i++) {  ?>

                <?php if ($row->status == $informasi[$i][1]): ?>
                  <option selected value="<?php echo $informasi[$i][1] ?>"><?php echo $informasi[$i][0] ?></option>
                <?php else: ?>
                  <option value="<?php echo $informasi[$i][1] ?>"><?php echo $informasi[$i][0] ?></option>
                <?php endif ?>

                <?php } ?>
          </select>
        </div>
        <div class="modal-footer">
            <a  class="btn btn-danger" href="<?= base_url('Versi/index') ?>">Back</a>   
            <button type="submit" class="btn btn-success">Update</button>
        </div>
      <?php  } ?>
    </div>
  </div>     
  <?php form_close();  ?>
  </div>
</div>