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
                <i><h4 style="color: white;">KETERANGAN TEMPAT TINGGAL</h4></i>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id= "room">
                       <thead>
                       <tr>
		                    	<th>No</th>
		                        <th>Alamat Rumah</th>
		                        <th>Kelurahan</th>
		                        <th>Kecamatan</th>
		                        <th>Kota/Kabupaten</th>
		                        <th>Propinsi</th>
                            <th>Kode Pos</th>
                            <th>No. Telepon Rumah</th>
                            <th>Email</th>
                            <th>Tinggal Dengan</th>
		                        <th>Action</th>
		                    </tr>
                        </thead>
                        <tbody> 
                  	<?php 
                       		$no = 1;
                       		foreach ($room as $row): ?>
	                        <tr>
	                            <td><?= $no++; ?></td>
	                            <td><?= $row->alamat_rumah; ?></td>
                                <td><?= $row->kelurahan; ?></td>
	                            <td><?= $row->kecamatan; ?></td>
	                            <td><?= $row->kota_kabupaten; ?></td>
                                <td><?= $row->propinsi; ?></td>
                                <td><?= $row->kode_pos; ?></td>
                                <td><?= $row->no_telepon_rumah; ?></td>
                                <td><?= $row->email; ?></td>
                                <?php if ($row->tinggal_dengan == 1): ?>
	                            <td>Keluarga</td>
                                <?php else : ?>
                                <td>Tidak Keluarga</td>
						    	<?php endif ?>
	                            <td><?= anchor('Room/edit/' .$row->room_id , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?>
	                            <a onclick="javascript: return confirm('Anda Yakin Mau Menghapus')"><?= anchor('Room/delete/' .$row->room_id ,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
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
        <h5 class="modal-title" id="exampleModalLabel">FROM INPUT PESERTA BARU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?= base_url(). 'Room/insert_action'; ?>" method="post" enctype="multipart/form-data">
       <div class="form-group">
            <label>Property</label>
            <select class="form-control" name="nama_lengkap">
            <?php foreach ($property as $row): ?>      
              <option value="<?= $row->property_id ?> "><?= $row->nama_lengkap ?></option>
              <?php endforeach ?>
            </select>
          </div>
       		<div class="form-group">
       			<label>Alamat Rumah</label>
       			<textarea input type="text" name="alamat_rumah" class="form-control" required="true"></textarea>
       		</div>
           <div class="form-group">
       			<label>Kelurahan</label>
       			<input type="text" name="kelurahan" class="form-control" required="true">
       		</div>
       		<div class="form-group">
       			<label>Kecamatan</label>
       			<input type="text" name="kecamatan" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Kota / Kabupaten</label>
       			<input type="text" name="kota_kabupaten" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Propinsi</label>
       			<input type="text" name="propinsi" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Kode Pos</label>
       			<input type="number" name="kode_pos" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>No. Telepon Rumah</label>
       			<input type="number" name="no_telepon_rumah" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Email</label>
       			<input type="text" name="email" class="form-control" required="true">
       		</div>
       		<div class="form-group">
       			<label>Tinggal Dengan</label>
       			<select class="form-control" name="tinggal_dengan">
       				<option value="1">Keluarga</option>
       				<option value="0">Tidak Keluarga</option>
       			</select>
       		</div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success">Save</button>
		      </div>
		</form>
    </div>
  </div>
</div>