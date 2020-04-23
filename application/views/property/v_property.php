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
                <i><h4 style="color: white;">PESERTA DIDIK BARU</h4></i>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id= "property">
                       <thead>
					   <tr>
		                    	<th>No</th>
		                        <th>Nama Lengkap</th>
								<th>Foto Peserta</th>
								<th>Jenis Kelamin</th>
								<th>TTL</th>
								<th>Agama</th>
								<th>Cita-cita</th>
								<th>Hoby</th>
								<th>Anak Ke-</th>
								<th>Jumlah Bersaudara</th>
								<th>Berat Badan</th>
								<th>Tinggi Badan</th>
								<th>Golongan Darah</th>
		                        <th>Action</th>
		                    </tr>
					    </thead>
					    <tbody>
					<?php 
                       		$no = 1;
                       		foreach ($property as $row): ?>
	                        <tr>
	                            <td><?= $no++; ?></td>
	                            <td><?= $row->nama_lengkap; ?></td>
								<td><img src="<?= base_url();?>assets/img/<?= $row->img_source ?>" class="img-thumbnail" width="80"></td>
								<?php if ($row->jk == 1): ?>
	                            <td>Laki-laki</td>
                                <?php else : ?>
                                <td>Perempuan</td>
								<?php endif ?>
								<td><?= $row->ttl; ?></td>
								<?php if ($row->agama == 1): ?>
	                            <td>Islam</td>
                                <?php else : ?>
                                <td>NonIslam</td>
								<?php endif ?>
								<td><?= $row->cita_cita; ?></td>
								<td><?= $row->hoby; ?></td>
								<td><?= $row->anak_ke; ?></td>
								<td><?= $row->jumlah_bersaudara; ?></td>
								<td><?= $row->berat_badan; ?></td>
								<td><?= $row->tinggi_badan; ?></td>
								<td><?= $row->golongan_darah; ?></td>
								<td><?= anchor('Property/edit/' .$row->property_id , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?>
	                            <a onclick="javascript: return confirm('Anda Yakin Mau Menghapus')"><?= anchor('Property/delete/' .$row->property_id ,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
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
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PESERTA DIDIK BARU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?= base_url(). 'property/insert_action'; ?>" method="post" enctype="multipart/form-data">
       		
       		<div class="form-group">
       			<label>Name Lengkap</label>
       			<input type="text" name="nama_lengkap" class="form-control" required="true">
       		</div>
			<div class="form-group">
				   <label>Nama Panggilan</label>
				   <input type="text" name="nama_panggilan" class="form-control" required="true">
		   </div>
			<div class="form-group">
       			<label>Foto Peserta</label>
       			<input type="file" name="img_source" class="form-control" required="true">
       		</div>
       		<div class="form-group">
       			<label>Jenis Kelamin</label>
       			<select class="form-control" name="jk">
       				<option value="1" >Laki-laki</option>
       				<option value="0">Perempuan</option>
       			</select>
			 </div>
			 <div class="form-group">
				   <label>Tempat Tanggal Lahir</label>
         		   <textarea input type="text" name="ttl" class="form-control" required="true"></textarea>
			 </div>   
		  	 <div class="form-group">
       			<label>Agama</label>
       			<select class="form-control" name="agama">
       				<option value="1" >Islam</option>
       				<option value="0">NonIslam</option>
       			</select>
			 </div>
			 <div class="form-group">
				   <label>Cita-Cita</label>
				   <input type="text" name="cita_cita" class="form-control" required="true">
		   </div>
		   <div class="form-group">
				   <label>Hoby</label>
				   <input type="text" name="hoby" class="form-control" required="true">
		   </div>
		   <div class="form-group">
				   <label>Anak Ke-</label>
				   <input type="number" name="anak_ke" class="form-control" required="true">
		   </div>
		   <div class="form-group">
				   <label>Jumlah Bersaudara</label>
				   <input type="number" name="jumlah_bersaudara" class="form-control" required="true">
		   </div>
		   <div class="form-group">
				   <label>Berat Badan</label>
				   <input type="number" name="berat_badan" class="form-control" required="true">
		   </div>
		   <div class="form-group">
				   <label>Tinggi Badan</label>
				   <input type="number" name="tinggi_badan" class="form-control" required="true">
		   </div>
		   <div class="form-group">
				   <label>Golongan Darah</label>
				   <input type="text" name="golongan_darah" class="form-control" required="true">
		   </div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success">Save</button>
		      </div>
		</form>
    </div>
  </div>
</div>