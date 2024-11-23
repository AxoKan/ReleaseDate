<style>
  /* General Styles */
  body {
    margin: 0;
    font-family: "Times New Roman", Times, serif;
    color: #000;
  }

  .banner {
    width: 100%;
    height: 600px; /* Adjust height as needed */
    background-image: url("<?= base_url('assets/img/custom/games1.png') ?>");
    background-size: cover;
    background-position: center;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
  }

  .game-list-container {
    width: 100%;
    margin: 0 auto;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .game-item {
    display: flex;
    align-items: center;
    padding: 20px;
    margin-bottom: 10px;
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: background-color 0.2s ease, box-shadow 0.2s ease;
    width: 100%;
    box-sizing: border-box; /* Ensures padding is included in width */
  }

  .game-item:hover {
    background-color: #f0f8ff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .game-logo {
    width: 80px; /* Larger logo */
    height: 80px;
    margin-right: 20px;
    border-radius: 6px;
    object-fit: cover;
    border: 1px solid #ddd;
  }

  .game-details {
    flex: 1; /* Makes the details section take up remaining space */
  }

  .game-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin: 0 0 5px;
  }

  .game-id {
    font-size: 14px;
    color: #666;
  }
</style>

<div class="banner"></div>
<div class="game-list-container">
  <?php foreach ($game as $key):
        if ($key->selesai === "belum") { ?>
    <form action="<?= base_url('home/game/' . $key->game_id) ?>" method="post" class="game-form">
      <div class="game-item" onclick="this.parentNode.submit();">
        <!-- Game Logo -->
        <img
          src="<?= base_url('assets/img/custom/' . $key->logo) ?>"
          alt="Game Logo"
          class="game-logo"
        />

        <!-- Game Details -->
        <div class="game-details">
          <div class="game-title"><?= $key->game ?></div>
          <div class="game-id">Release Date: <?= $key->tanggal_keluar?></div>
        </div>
      </div>
    </form>
  <?php }endforeach; ?>
</div>
