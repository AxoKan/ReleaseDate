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
  <form action="<?= base_url('home/aksi_edit')?>" method="post" enctype="multipart/form-data">
    <div class="container">
<form>
<div class="row mb-3">
<label for="nama" class="col-sm-2 col-form-label">Game</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="nama" id="nama" value="<?= $game->game ?>" >
</div>
</div>
<div class="row mb-3">
<label for="nama" class="col-sm-2 col-form-label">Description</label>
<div class="col-sm-10">
<textarea class="form-control" id="Des" name="Des"><?= htmlspecialchars($game->describsi) ?></textarea>

</div>
</div>
<div class="row mb-3">
<label for="nama" class="col-sm-2 col-form-label">Release Date</label>
<div class="col-sm-10">
<input type="Date" class="form-control" name="date" id="date"  value="<?= $game->tanggal_keluar ?>">
</div>
</div>
<div class="row mb-3">
    <label for="logo" class="col-sm-2 col-form-label">Upload Logo</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="logo" id="logo">
        <?php if (!empty($game->logo)): ?>
            <small>Current Logo: <?= htmlspecialchars($game->logo) ?></small>
        <?php endif; ?>
    </div>
</div>
<div class="row mb-3">
    <label for="trailer" class="col-sm-2 col-form-label">Upload Trailer</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="trailer" id="trailer">
        <?php if (!empty($game->trailer)): ?>
            <small>Current Trailer: <?= htmlspecialchars($game->trailer) ?></small>
        <?php endif; ?>
    </div>
</div>
<div class="row mb-3">
    <label for="image1" class="col-sm-2 col-form-label">Upload Image 1</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="image1" id="image1">
        <?php if (!empty($game->foto_1)): ?>
            <small>Current Image 1: <?= htmlspecialchars($game->foto_1) ?></small>
        <?php endif; ?>
    </div>
</div>
<div class="row mb-3">
    <label for="image2" class="col-sm-2 col-form-label">Upload Image 2</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="image2" id="image2">
        <?php if (!empty($game->foto_2)): ?>
            <small>Current Image 2: <?= htmlspecialchars($game->foto_2) ?></small>
        <?php endif; ?>
    </div>
</div>
<div class="row mb-3">
    <label for="image3" class="col-sm-2 col-form-label">Upload Image 3</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="image3" id="image3">
        <?php if (!empty($game->foto_3)): ?>
            <small>Current Image 3: <?= htmlspecialchars($game->foto_3) ?></small>
        <?php endif; ?>
    </div>
</div>


<input type="hidden" name="id" value="<?= $game->game_id ?>">
      <div class="mt-2">
        <button type="submit" class="btn btn-primary me-2">Save changes</button>
      </div>
    </form>
  </div>
  <!-- /Account -->
</div>
