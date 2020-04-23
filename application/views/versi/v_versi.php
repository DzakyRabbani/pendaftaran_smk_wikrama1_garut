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
                <i><h4 style="color: white;">NILAI RAPORT</h4></i>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id= "versi">
                        <thead>
		                    <tr>
		                      	<th>No</th>
		                        <th>Mata Pelajaran</th>
		                        <th>Tingkat Kelas</th>
		                        <th>Semester</th>
                            <th>Nilai</th>
                            <th>Prestasi Yang Pernah Diraih</th>
                            <th>Informasi Ini Tau Dari ?</th>
                            <th>Action</th>
		                    </tr>
                        </thead>
                         <tbody>
                       <?php 
                            $no = 1; 
                            foreach($versi as $row): ?>
                             <tr>
                                    <th><?= $no++?></th>
                                    <th><?= $row->mata_pelajaran?></th>
                                    <th><?= $row->tingkat_kelas?></th>
                                    <?php if ($row->semester == 1): ?>
	                                   <td>1</td>
                                    <?php else : ?>
                                    <td>2</td>
						    	                  <?php endif ?>
                                    <th><?= $row->nilai?></th>
                                    <th><?= $row->prestasi?></th>
                                    <?php if ($row->informasi == 1): ?>
	                                   <td>Media</td>
                                    <?php else : ?>
                                    <td>Orang Lain</td>
						    	                  <?php endif ?>
                                    <td><?= anchor('Versi/edit/' .$row->version_id , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?>
	                                  <a onclick="javascript: return confirm('Anda Yakin Mau Menghapus')"><?= anchor('Versi/delete/' .$row->version_id ,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
                                    </td>  
                              </tr>
                            <?php endforeach?>
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
        <h5 class="modal-title" id="exampleModalLabel">FROM INPUT NILAI RAPORT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?= base_url(). 'Versi/insert_action'; ?>" method="post" enctype="multipart/form-data">
       <div class="form-group">
       			<label>Mata Pelajaran</label>
       			<input type="text" name="mata_pelajaran" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Tingkat Kelas</label>
       			<input type="number" name="tingkat_kelas" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Semester</label>
       			<select class="form-control" name="semester">
       				<option value="1">1</option>
       				<option value="0">2</option>
       			</select>
       		</div>
           <div class="form-group">
       			<label>Nilai</label>
       			<input type="number" name="nilai" class="form-control" required="true">
       		</div>
           <div class="form-group">
       			<label>Prestasi Yang Pernah Diraih</label>
       			<textarea input type="text" name="prestasi" class="form-control" required="true"></textarea>
       		</div>
           <div class="form-group">
       			<label>Informasi Ini Tau Dari ?</label>
       			<select class="form-control" name="informasi">
       				<option value="1">Media</option>
       				<option value="0">Orang Lain</option>
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