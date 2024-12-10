<div class="container-xxl flex-grow-1 container-p-y">

<div class="card mb-4">

  <!-- Account -->
  <div class="card-body">
    <div class="d-flex align-items-start align-items-sm-center gap-4">
 
</div>

      <div class="button-wrapper">
     

       
      </div>
    </div>
  </div>
  <hr class="my-0" />
  <div class="card-body">
  <form action="<?= base_url('home/aksi_tambah')?>" method="post" enctype="multipart/form-data">
    <div class="container">
<form>
<div class="row mb-3">
<label for="nama" class="col-sm-2 col-form-label">Game</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="nama" id="nama" >
</div>
</div>
<div class="row mb-3">
<label for="nama" class="col-sm-2 col-form-label">Genre</label>
<div class="col-sm-10">
<select name="genre" class="form-control" >
                        <option value="">Pilih</option>
                        <?php foreach($genre as $key): ?>
                           
                                <option value="<?=$key->id_genre?>"><?=$key->genrenama?></option>
                       
                        <?php endforeach; ?>
                    </select>
</div>
</div>
<div class="row mb-3">
<label for="nama" class="col-sm-2 col-form-label">Description</label>
<div class="col-sm-10">
<textarea class="form-control" id="Des" name="Des"></textarea>
</div>
</div>
<div class="row mb-3">
<label for="nama" class="col-sm-2 col-form-label">Plartform</label>
<div class="col-sm-10">
<textarea class="form-control" id="Plart" name="Plart"></textarea>
</div>
</div>
<div class="row mb-3">
<label for="nama" class="col-sm-2 col-form-label">Release Date</label>
<div class="col-sm-10">
<input type="Date" class="form-control" name="date" id="date" >
</div>
</div>
<div class="row mb-3">
<label for="image" class="col-sm-2 col-form-label">Upload Logo</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="logo" id="logo">
</div>
</div>
<div class="row mb-3">
  <label for="trailer" class="col-sm-2 col-form-label">Upload trailer</label>
  <div class="col-sm-10">
    <input type="file" class="form-control" name="trailer" id="trailer" accept="video/*">
    <small id="error-message" style="color: red; display: none;">The trailer must be 5 minutes or shorter.</small>
  </div>
</div>

<script>
  document.getElementById('trailer').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const errorMessage = document.getElementById('error-message');

    if (file) {
      const video = document.createElement('video');
      video.preload = 'metadata';

      video.onloadedmetadata = function () {
        window.URL.revokeObjectURL(video.src);
        const duration = video.duration;
        if (duration > 300) { // 300 seconds = 5 minutes
          errorMessage.style.display = 'block';
          event.target.value = ''; // Clear the file input
        } else {
          errorMessage.style.display = 'none';
        }
      };

      video.src = URL.createObjectURL(file);
    }
  });
</script>

<div class="row mb-3">
<label for="image" class="col-sm-2 col-form-label">Upload Image 1</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="image1" id="image1">
</div>
</div>

<div class="row mb-3">
<label for="image" class="col-sm-2 col-form-label">Upload Image 2</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="image2" id="image2">
</div>
</div>
<div class="row mb-3">
<label for="image" class="col-sm-2 col-form-label">Upload Image 3 </label>
<div class="col-sm-10">
<input type="file" class="form-control" name="image3" id="image3">
</div>
</div>
<div class="row mb-3">
<label for="image" class="col-sm-2 col-form-label">Upload Image 4 </label>
<div class="col-sm-10">
<input type="file" class="form-control" name="image4" id="image4">
</div>
</div>
<input type="hidden" name="id" value="<?= $satu->id_logo ?>">
      <div class="mt-2">
        <button type="submit" class="btn btn-primary me-2">Save changes</button>
      </div>
    </form>
  </div>
  <!-- /Account -->
</div>
