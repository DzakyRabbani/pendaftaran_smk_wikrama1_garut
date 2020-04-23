<div class="main-content">
      <section class="section">
          <div class="section-header">
            <h1>ADMIN</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a ><?php echo date("D, d M Y "); ?></a></div>
            </div>
          </div>
      </section>
 	<div class="section-body">
 	<?= $this->session->flashdata('message'); ?>
      <div style="margin-top: 50px; ">
      	<button class="btn btn-danger" data-toggle="modal" data-target="#insert"><i class="fas fa-plus fa-sm"></i> Add Data</button>
      </div>
  	    <div class="card mt-2">
                <div class="card-header" style="background:#ff0000;">
                <h4 style="color: white;">Table Room</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
		                    <tr>
		                    	<th>No</th>
		                        <th>Name Rom</th>
		                        <th>Img Source</th>
                            <th>Property</th>
		                        <th>Update</th>
		                        <th>Status</th>
		                        <th>Created-At</th>
		                        <th>Modified-At</th>
		                        <th colspan="2">Action</th>
		                    </tr>
                       		<?php 
                       		$no = 1;
                       		foreach ($room as $row): ?>
	                        <tr>
	                            <td><?= $no++; ?></td>
	                            <td><?= $row->name_room; ?></td>
	                            <td><img src="<?= base_url();?>assets/img_room/<?= $row->img_source ?>" class="img-thumbnail" width="80"></td>
                              <td><?= $row->name_property ?></td>
                              <?php if($row->update == 1): ?>
	                            <td>Yes</td>
                              <?php else : ?>
                              <td>No</td>	
                              <?php endif ?>
                              <?php if ($row->status == 1): ?>
	                            <td>Active</td>
                              <?php else : ?>
                              <td>InActive</td>
                              <?php endif ?>
	                            <td><?= $row->created_at; ?></td>
	                            <td><?= $row->modified_at; ?></td>
	                            <td><?= anchor('Room/edit/' .$row->room_id , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?></td>
	                            <td onclick="javascript: return confirm('Anda Yakin Mau Menghapus')"><?= anchor('Room/delete/' .$row->room_id ,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>  
	                        </tr>
                        	<?php endforeach ?>
                      	</tbody>
                    </table>
                </div>
            </div>
        </div>
  </div>	
</div>
<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FROM INPUT USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?= base_url(). 'Room/insert_action'; ?>" method="post" enctype="multipart/form-data">
       		
       		<div class="form-group">
       			<label>Name Room</label>
       			<input type="text" name="name_room" class="form-control" required="true">
       		</div>
       		<div class="form-group">
       			<label>Img Source</label>
       			<input type="file" name="img_source" class="form-control" required="true">
       		</div>
          <div class="form-group">
            <label>Property</label>
            <select class="form-control" name="name_property">
            <?php foreach ($property as $row): ?>      
              <option value="<?= $row->property_id ?> "><?= $row->name_property ?></option>
              <?php endforeach ?>
            </select>
          </div>
       		<div class="form-group">
       			<label>Status</label>
       			<select class="form-control" name="status">
       				<option value="1" >Active</option>
       				<option value="0">InActive</option>
       			</select>
       		</div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-danger">Save</button>
		      </div>
		</form>
    </div>
  </div>
</div>