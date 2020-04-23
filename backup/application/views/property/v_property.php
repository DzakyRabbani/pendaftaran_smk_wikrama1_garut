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
                <h4 style="color: white;">Table Property</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
		                    <tr>
		                    	<th>No</th>
		                        <th>Name</th>
		                        <th>Img Source</th>
		                        <th>Update</th>
		                        <th>Status</th>
		                        <th>Created-At</th>
		                        <th>Modified-At</th>
		                        <th colspan="2">Action</th>
		                    </tr>
                       		<?php 
                       		$no = 1;
                       		foreach ($property as $row): ?>
	                        <tr>
	                            <td><?= $no++; ?></td>
	                            <td><?= $row->name_property; ?></td>
	                            <td><img src="<?= base_url();?>assets/img/<?= $row->img_source ?>" class="img-thumbnail" width="80"></td>
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
	                            <td><?= anchor('Property/edit/' .$row->property_id , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?></td>
	                            <td onclick="javascript: return confirm('Anda Yakin Mau Menghapus')"><?= anchor('Property/delete/' .$row->property_id ,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>  
	                        </tr>
							  <?php endforeach; ?>
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
       <form action="<?= base_url(). 'Property/insert_action'; ?>" method="post" enctype="multipart/form-data">
       		
       		<div class="form-group">
       			<label>Name Property</label>
       			<input type="text" name="name_property" class="form-control" required="true">
       		</div>
       		<div class="form-group">
       			<label>Img Source</label>
       			<input type="file" name="img_source" class="form-control" required="true">
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