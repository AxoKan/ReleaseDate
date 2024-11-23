<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-white-900 text-white">
    <div class="max-w-5xl mx-auto p-4">
        <!-- Game Header Section -->
        <?php if (!empty($game)): ?>
            <div class="flex items-center space-x-4 bg-white-800 p-4 rounded-lg">
                <img 
                    alt="Game Icon" 
                    class="w-24 h-24 rounded-lg object-cover" 
                    src="<?= base_url('assets/img/custom/' . $game->logo) ?>"
                />
                <div>
                    <h1 class="text-3xl font-bold"><?= $game->game ?></h1>
                    <h1 class="text-2xl font-bold">Release Date: <?= $game->tanggal_keluar ?></h1>
                    <h1 class="text-1xl font-bold"><?= $game->describsi ?></h1>
                </div>
            </div>
        <?php else: ?>
            <p class="text-red-500">Game data not found.</p>
        <?php endif; ?>

        <!-- Screenshots and Trailer Section -->
        <div class="mt-8 relative">
            <div id="slider" class="grid grid-cols-1">
                <video 
                    id="trailer" 
                    class="w-3/4 mx-auto h-84 object-cover rounded-lg" 
                    controls 
                >
                    <source 
                        src="<?= base_url('assets/img/custom/' . $game->trailer) ?>" 
                        type="video/mp4"
                    />
                    Your browser does not support the video tag.
                </video>
                <img 
                    alt="Game Screenshot 1" 
                    class="w-3/4 mx-auto h-84 object-cover rounded-lg hidden" 
                    src="<?= base_url('assets/img/custom/' . $game->foto_1) ?>"
                />
                <img 
                    alt="Game Screenshot 2" 
                    class="w-3/4 mx-auto h-84 object-cover rounded-lg hidden" 
                    src="<?= base_url('assets/img/custom/' . $game->foto_2) ?>"
                />
                <img 
                    alt="Game Screenshot 3" 
                    class="w-3/4 mx-auto h-84 object-cover rounded-lg hidden" 
                    src="<?= base_url('assets/img/custom/' . $game->foto_3) ?>"
                />
            </div>
            <button 
                id="prevButton" 
                class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white text-black rounded-full p-2"
            >
                <i class="fas fa-chevron-left"></i>
            </button>
            <button 
                id="nextButton" 
                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white text-black rounded-full p-2"
            >
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <script>
        // JavaScript for slider functionality
        const slider = document.getElementById('slider');
        const items = slider.children;
        const video = document.getElementById('trailer');
        let currentIndex = 0;

        // Show the current item and hide others
        function updateSlider() {
            for (let i = 0; i < items.length; i++) {
                items[i].classList.add('hidden');
            }
            items[currentIndex].classList.remove('hidden');

            // Pause the video if it's not currently active
            if (currentIndex !== 0 && !video.paused) {
                video.pause();
                video.currentTime = 0;
            }
        }

        // Navigate to the previous item
        document.getElementById('prevButton').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateSlider();
        });

        // Navigate to the next item
        document.getElementById('nextButton').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % items.length;
            updateSlider();
        });

        // Initialize the slider
        updateSlider();
    </script>
</body>
</html>
