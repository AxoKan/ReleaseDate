<main id="main" class="main">
  <div class="container">
    <div class="pagetitle">
      <h1></h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="search-container">
                    
                  <label for="search">Search:</label>
                  <input type="text" id="search" placeholder="Enter keywords..."> 
                  <a class="nav-link" href="<?=base_url('home/tambah')?>">
                  <button class="btn btn-success">tambah+</button></a>
                 
                </div>

              </div>
             
              <!-- Table with stripped rows -->
              <table class="table datatable" id="mitraTable">
                <thead>
                  <tr style="font-weight: bold; color: black; font-size: larger;">
                    <td align="center" scope="col">No</td>
                    <td align="center" scope="col">kategory</td>
                    <td align="center" scope="col">game</td>
                    <td align="center" scope="col">Release Date</td>
                    <td align="center" scope="col">Description</td>
                    <td align="center" scope="col">Plartform</td>
                    <td align="center" scope="col">Logo</td>
                    <td align="center" scope="col">aksi</td>
                  </tr> 
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($game as $key) {
                    if ($key->selesai === "belum") {
                ?>
                  <tr>
                    <td align="center" scope="col"><?= $no++ ?></td>
                    <td align="center" scope="col"><?= $key->genrenama ?></td>
                    <td align="center" scope="col"><?= $key->game ?></td>
                    <td align="center" scope="col"><?= $key->tanggal_keluar ?></td>
                    <td align="center" scope="col"><?= $key->describsi ?></td>
                    <td align="center" scope="col"><?= $key->plartform ?></td>
                    
                    <td align="center" >
         <img src="<?php echo base_url('assets/img/custom/' . $key->logo)?>"width="100px">
        </td>
        <td align="center">
				<a href="<?= base_url('Home/edit/'.$key->game_id)?>">
					<i class="btn btn-warning">Edit</i>
				</a>
				<a href="<?= base_url('Home/selesai/'.$key->game_id)?>">
					<i class="btn btn-success">Selesai</i>
				</a>
				</td>
                  </tr>
                <?php
                  }
                  }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  
                     </div>
         

</main><!-- End #main -->
<style>
  /* Modal styling for the memo format */
  .memo-container {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    color: #000;
  }
  .memo-header {
    text-align: center;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 15px;
  }
  .memo-header p {
    margin: 0;
  }
  .memo-header .title {
    margin-top: 5px;
    font-size: 16px;
  }
  .memo-title {
    text-align: center;
    font-size: 20px;
    margin-top: 20px;
    font-weight: bold;
  }
  .memo-body {
    margin-top: 20px;
    padding-left: 10px;
  }
  .memo-body p {
    margin: 0;
  }
  .memo-footer {
    margin-top: 30px;
    text-align: right;
  }
  .memo-footer p {
    margin: 0;
  }
  /* Button styling for consistency */
  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
  }
  .btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }
</style>
<script>
  // Search functionality
  document.getElementById('search').addEventListener('input', function() {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('#mitraTable tbody tr');
    rows.forEach(row => {
      const rowData = row.textContent.toLowerCase();
      row.style.display = rowData.includes(searchValue) ? '' : 'none';
    });
  });
</script>


<!-- Include Bootstrap JavaScript (required for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
