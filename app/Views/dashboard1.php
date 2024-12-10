<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Page</title>
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

        .filter-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .filter-container select {
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
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

        .game-item.hidden {
            display: none;
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

        .ads-container {
            margin: 20px 0;
            padding: 15px;
            background-color: #fff8dc;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .ads-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 6px;
        }

        .ads-title {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .ads-description {
            font-size: 14px;
            color: #666;
        }

        .ads-link {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #ff7f50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .ads-link:hover {
            background-color: #e56740;
        }
        .pin-btn {
    background: none;
    border: none;
    font-size: 18px;
    cursor: pointer;
    color: #666;
    transition: color 0.2s ease;
}

.pin-btn:hover {
    color: #ff7f50;
}

.game-item.pinned {
    border: 2px solid #ff7f50;
    background-color: #fffbea;
}

    </style>
</head>
<body>
    <div class="banner"></div>

    <!-- Random Ads Section -->
    <div id="adsSection" class="ads-container"></div>

    <div class="game-list-container">
        <!-- Filter Dropdown -->
        <div class="filter-container">
            <select id="filterSelect">
                <option value="all">All Genres</option>
                <?php 
                    $uniqueGenres = [];
                    foreach ($game as $key): 
                        if (!in_array($key->genrenama, $uniqueGenres)): 
                            $uniqueGenres[] = $key->genrenama; 
                ?>
                    <option value="<?= $key->genrenama ?>"><?= $key->genrenama ?></option>
                <?php 
                        endif; 
                    endforeach; 
                ?>
            </select>
        </div>

        <!-- Pinned Games Section -->
<div id="pinnedGamesContainer" class="pinned-games-container">
    <h3>Pinned Games</h3>
    <div id="pinnedGames"></div>
</div>

<!-- Game List -->
<div id="gameList">
    <?php foreach ($game as $key): ?>
        <?php if ($key->selesai === "belum"): ?>
          <form action="<?= base_url('home/game/' . $key->game_id) ?>" method="post" class="game-form">
            <div class="game-item" data-genre="<?= $key->genrenama ?>" data-id="<?= $key->game_id ?>">
                <!-- Game Logo -->
                <img
                    src="<?= base_url('assets/img/custom/' . $key->logo) ?>"
                    alt="Game Logo"
                    class="game-logo"
                />

                <!-- Game Details -->
                <div class="game-details">
                    <div class="game-title"><?= $key->game ?></div>
                    <div class="game-id">Release Date: <?= $key->tanggal_keluar ?></div>
                    <div class="game-id">Genre: <?= $key->genrenama ?></div>
                </div>
        <form>
        <button class="pin-btn" >
                    Check
                </button>
                <button class="pin-btn" onclick="togglePin(event, '<?= $key->game_id ?>')">
                    📌 Pin
                </button>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>


    <script>
        // Fake Ads Data
        const fakeAds = [
            {
                title: "Best Gaming Laptop 2024",
                description: "Experience the ultimate gaming performance with our top-rated laptops.",
                image: "https://via.placeholder.com/300x150.png?text=Gaming+Laptop",
                link: "#",
            },
            {
                title: "Exclusive Game Deals!",
                description: "Get up to 70% off on popular titles. Limited time offer!",
                image: "https://via.placeholder.com/300x150.png?text=Game+Deals",
                link: "#",
            },
            {
                title: "Join Our Gaming Community",
                description: "Connect with gamers worldwide. Share tips, strategies, and reviews.",
                image: "https://via.placeholder.com/300x150.png?text=Gaming+Community",
                link: "#",
            },
            {
                title: "Upgrade Your Gaming Setup",
                description: "Explore the latest gaming accessories for peak performance.",
                image: "https://via.placeholder.com/300x150.png?text=Gaming+Accessories",
                link: "#",
            },
            {
                title: "Pre-Order Now!",
                description: "Be the first to play the most anticipated games of the year.",
                image: "https://via.placeholder.com/300x150.png?text=Pre-Order",
                link: "#",
            },
        ];

        // Display a random ad
        function displayRandomAd() {
            const randomAd = fakeAds[Math.floor(Math.random() * fakeAds.length)];
            const adsSection = document.getElementById("adsSection");

            adsSection.innerHTML = `
                <img src="${randomAd.image}" alt="${randomAd.title}" class="ads-image">
                <div class="ads-title">${randomAd.title}</div>
                <div class="ads-description">${randomAd.description}</div>
                <a href="${randomAd.link}" class="ads-link" target="_blank">Learn More</a>
            `;
        }

        // Display a random ad on page load
        window.onload = displayRandomAd;

        // Genre Filter Functionality
        document.getElementById("filterSelect").addEventListener("change", function () {
            const selectedGenre = this.value.toLowerCase();
            const gameItems = document.querySelectorAll(".game-item");

            gameItems.forEach((item) => {
                const itemGenre = item.getAttribute("data-genre").toLowerCase();
                if (selectedGenre === "all" || itemGenre === selectedGenre) {
                    item.classList.remove("hidden");
                } else {
                    item.classList.add("hidden");
                }
            });
        });
        // Get pinned games from localStorage
const pinnedGames = JSON.parse(localStorage.getItem("pinnedGames")) || [];

// Function to toggle pin status
function togglePin(event, gameId) {
    event.stopPropagation(); // Prevent triggering parent click event
    const gameItem = event.target.closest(".game-item");

    if (pinnedGames.includes(gameId)) {
        // Unpin the game
        pinnedGames.splice(pinnedGames.indexOf(gameId), 1);
        gameItem.classList.remove("pinned");
    } else {
        // Pin the game
        pinnedGames.push(gameId);
        gameItem.classList.add("pinned");
    }

    // Update localStorage and rearrange games
    localStorage.setItem("pinnedGames", JSON.stringify(pinnedGames));
    rearrangeGames();
}

// Function to rearrange games (pinned items at the top)
function rearrangeGames() {
    const gameList = document.getElementById("gameList");
    const allGames = Array.from(gameList.children);

    // Sort games by pinned status
    allGames.sort((a, b) => {
        const aPinned = pinnedGames.includes(a.dataset.id);
        const bPinned = pinnedGames.includes(b.dataset.id);
        return bPinned - aPinned; // Pinned games come first
    });

    // Re-append sorted games to the list
    allGames.forEach((game) => gameList.appendChild(game));
}

// Apply pinned status on page load
window.onload = function () {
    displayRandomAd();
    const gameItems = document.querySelectorAll(".game-item");
    gameItems.forEach((item) => {
        if (pinnedGames.includes(item.dataset.id)) {
            item.classList.add("pinned");
        }
    });
    rearrangeGames();
};

    </script>
</body>
</html>
