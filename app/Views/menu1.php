<style>
  body {
    margin: 0;
    font-family: "Times New Roman", Times, serif;
    color: #000;
  }

  .top-nav {
    width: 100%;
    background-color: #f8f9fa;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  .top-nav .left-section,
  .top-nav .right-section {
    display: flex;
    align-items: center;
  }

  .top-nav ul {
    display: flex;
    gap: 20px;
    align-items: center;
  }

  .top-nav ul li {
    list-style: none;
  }

  .top-nav ul li a {
    text-decoration: none;
    color: #000;
    font-weight: bold;
    padding: 8px 15px;
    border-radius: 4px;
    transition: background-color 0.2s ease;
  }

  .top-nav ul li a:hover,
  .top-nav ul li.active a {
    background-color: #007bff;
    color: #fff;
  }

  .logo {
    display: flex;
    align-items: center;
  }

  .logo h4 {
    margin: 0 10px;
  }

  .search-container {
    position: relative;
    flex-grow: 1;
    max-width: 600px;
    margin: 0 20px;
  }

  .search-input {
    padding: 8px 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
  }

  .dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    max-height: 200px;
    overflow-y: auto;
    display: none;
    z-index: 1000;
  }

  .dropdown a {
    display: block;
    padding: 8px 15px;
    color: #000;
    text-decoration: none;
    transition: background-color 0.2s ease;
  }

  .dropdown a:hover {
    background-color: #f1f1f1;
  }
</style>

<div class="top-nav">
  <div class="left-section">
    <div class="logo">
      <!-- Logo is now clickable -->
      <a href="<?= base_url('home/dashboard1') ?>" style="text-decoration: none; color: inherit;">
        <h4><?= $satu->nama_Logo ?></h4>
      </a>
    </div>
  </div>

  <div class="search-container">
    <input type="text" class="search-input" placeholder="Search games..." id="game-search" />
    <div class="dropdown" id="search-results"></div>
  </div>

  <div class="right-section">
    <ul>
      <li class="menu-item">
        <a href="<?= base_url('home/logout') ?>">
          <i class="menu-icon tf-icons bx bx-log-in-circle"></i> LogOut
        </a>
      </li>
    </ul>
  </div>
</div>

<script>
  const searchInput = document.getElementById('game-search');
  const dropdown = document.getElementById('search-results');

  // Fetch game data from PHP-rendered array
  const games = <?= json_encode($game); ?>;

  searchInput.addEventListener('input', () => {
    const query = searchInput.value.toLowerCase().trim();

    if (query.length > 0) {
      const filteredGames = games.filter((game) =>
        game.game.toLowerCase().includes(query)
      );

      dropdown.innerHTML = filteredGames
        .map(
          (game) =>
            `<a href="/home/game/${game.game_id}">${game.game}</a>`
        )
        .join('');

      dropdown.style.display = 'block';
    } else {
      dropdown.innerHTML = '';
      dropdown.style.display = 'none';
    }
  });

  document.addEventListener('click', (event) => {
    if (!dropdown.contains(event.target) && event.target !== searchInput) {
      dropdown.style.display = 'none';
    }
  });
</script>
