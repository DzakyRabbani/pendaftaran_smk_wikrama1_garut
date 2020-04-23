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
        <div class="form-group">
            <label>Img Source</label>
            <input type="file" name="img_source" class="form-control" value="">
            <input type="hidden" name="img_update" value="<?php echo @$row->img_source ?>">
            <span><?= $row->img_source ?></span>
        </div>
        <div class="form-group">
           <label>Detil</label>
           <textarea type="text" name="detil" class="form-control"><?= $row->detil ?></textarea>
        </div>
         <div class="form-grpup">
          <label>Room</label>
          <select name="room" class="form-control" value="">  
          <?php foreach ($room as $room_v): ?>
            <?php if ($room_v->room_id == $row->room_id): ?>
              <option selected value="<?= $room_v->room_id ;?>"><?= $room_v->name_room; ?></option>
            <?php else: ?>
              <option value="<?= $room_v->room_id ;?>"><?= $room_v->name_room; ?></option> 
            <?php endif ?>
          <?php endforeach ?>
          </select>
        </div>
        <div class="form-grpup">
          <label>Status</label>
          <select name="status" class="form-control" value="">  
              <?php 

                $status = [ ['Active','1'] , ['InActive','0'] ];

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
            <a  class="btn btn-success" href="<?= base_url('Navigate_button/index') ?>">Back</a>   
            <button type="submit" class="btn btn-danger">Update</button>
        </div>
      <?php  } ?>
    </div>
  </div>     
  <?php form_close();  ?>
  </div>
</div>