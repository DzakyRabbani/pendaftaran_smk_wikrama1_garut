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
                <i><h4 style="color: white;">KETERANGAN KESEHATAN & DATA BIMBINGAN PESERTA</h4></i>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id= "navigate">
                      <thead>
                      <tr>
		                      	<th>No</th>
                            <th>Keterangan</th>
		                        <th>Tanggal</th>
                            <th>Bimbingan Orangtua / Wali</th>
		                        <th>Nama</th>
		                        <th>Tempat Lahir</th>
		                        <th>Tanggal Lahir</th>
		                        <th>Pekerjaan</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Agama</th>
                            <th>No. HP</th>
		                        <th>Action</th>
		                  </tr>
                      </thead>
                      <tbody>
                       		<?php 
                       		$no = 1;
                       		foreach ($navigate_button as $row): ?>
	                        <tr>
	                            <td><?= $no++; ?></td>
                              <?php if($row->keterangan == 1): ?>
	                            <td>Sehat</td>
                              <?php else : ?>
                              <td>Sakit</td>	
                              <?php endif ?>
	                            <td><?= $row->detail; ?></td>
                              <?php if($row->data_bimbingan == 1): ?>
	                            <td>Orangtua</td>
                              <?php else : ?>
                              <td>Wali</td>	
                              <?php endif ?>
                              <td><?= $row->nama; ?></td>
                              <td><?= $row->tempat_lahir; ?></td>
	                            <td><?= $row->tanggal_lahir; ?></td>
	                            <td><?= $row->pekerjaan; ?></td>
                              <td><?= $row->pendidikan_terakhir; ?></td>
                              <?php if($row->agama_ == 1): ?>
	                            <td>Islam</td>
                              <?php else : ?>
                              <td>NonIslam</td>	
                              <?php endif ?>
                              <td><?= $row->no_hp; ?></td>
	                            <td><?= anchor('Navigate_button/edit/' .$row->button_id , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?>
	                            <a onclick="javascript: return confirm('Anda Yakin Mau Menghapus')"><?= anchor('Navigate_button/delete/' .$row->button_id ,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
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
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PESERTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?= base_url(). 'Navigate_button/insert_action'; ?>" method="post" enctype="multipart/form-data">	
       <div class="form-group">
            <label>Alamat Rumah</label>
            <select class="form-control" name="room_id">
            <?php foreach ($room as $row): ?>
              <option value="<?= $row->room_id ?>" ><?= $row->alamat_rumah ?></option>
            <?php endforeach ?>
            </select>
          </div>
        <div class="form-group">
       			<label>Keterangan</label>
       			<select class="form-control" name="keterangan">
       				<option value="1">Sehat</option>
       				<option value="0">Sakit</option>
       			</select>
       		</div>
       		<div class="form-group">
       			<label>Tanggal</label>
            <input type="date" name="detail" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Bimbingan Orangtua / Wali</label>
       			<select class="form-control" name="data_bimbingan">
       				<option value="1">Orangtua</option>
       				<option value="0">Wali</option>
       			</select>
       		</div>
           <div class="form-group">
       			<label>Nama</label>
            <input type="text" name="nama" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Pendidikan Terakhir</label>
            <input type="text" name="pendidikan_terakhir" class="form-control" required="true">
       		</div>
       		<div class="form-group">
       			<label>Agama</label>
       			<select class="form-control" name="agama_">
       				<option value="1" >Islam</option>
       				<option value="0">NonIslam</option>
       			</select>
       		</div>
           <div class="form-group">
       			<label>No. HP</label>
            <input type="number" name="no_hp" class="form-control" required="true">
       		</div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success">Save</button>
		      </div>
		</form>
    </div>
  </div>
</div>