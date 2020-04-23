<div class="main-content">
      <section class="section">
          <div class="section-header">
          <i><h1>PENDAFTARAN PESERTA DIDIK BARU TAHUN AJARAN 2020-2021</h1></i>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a ><?php echo date("D, d M Y "); ?></a></div>
            </div>
          </div>
      </section>
 	<div class="section-body">
 	<?= $this->session->flashdata('message'); ?>
      <div style="margin-top: 50px; ">
      	<button class="btn btn-primary" data-toggle="modal" data-target="#insert"><i class="fas fa-plus fa-sm"></i> Add Data</button>
      </div>
  	    <div class="card mt-2">
                <div class="card-header" style="background:#0000ff;">
                <i><h4 style="color: white;">TABLE USER</h4><i>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id= "user">
                       <thead>
                       <tr>
		                      	<th>No</th>
		                        <th>Name</th>
		                        <th>Username</th>
		                        <th>Password</th>
		                        <th>Action</th>
		                    </tr>
                        </thead>
                        <tbody>
                  	<?php 
                       		$no = 1;
                       		foreach ($user as $row): ?>
	                        <tr>
	                            <td><?= $no++; ?></td>
	                            <td><?= $row->name; ?></td>
	                            <td><?= $row->username; ?></td>
	                            <td><?= base64_decode($row->password); ?></td>
	                            <td><?= anchor('User/edit/' .$row->user_id , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?>
	                            <a onclick="javascript: return confirm('Anda Yakin Mau Menghapus')"><?= anchor('User/delete/' .$row->user_id ,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
                              </td>  
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
       <form action="<?= base_url(). 'User/insert_action'; ?>" method="post" enctype="multipart/form-data">
       		
       		<div class="form-group">
       			<label>Name</label>
       			<input type="text" name="name" class="form-control">
       		</div>
       		<div class="form-group">
       			<label>Username</label>
       			<input type="text" name="username" class="form-control">
       		</div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control">
          </div>    
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success">Save</button>
		      </div>
		</form>
    </div>
  </div>
</div>