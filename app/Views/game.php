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
                    <h1 id="countdown" class="text-2xl font-bold text-yellow-400"></h1>
                    <h1 class="text-1xl font-bold"><?= $game->describsi ?></h1>
                </div>
            </div>
        <?php else: ?>
            <p class="text-red-500">Game data not found.</p>
        <?php endif; ?>

        <!-- Star Rating Section -->
        <div class="mt-4">
            <h2 class="text-xl font-bold mb-2">Rate This Game</h2>
            <div id="starRating" class="flex space-x-1 text-yellow-400 text-2xl">
                <i class="fas fa-star cursor-pointer" data-value="1"></i>
                <i class="fas fa-star cursor-pointer" data-value="2"></i>
                <i class="fas fa-star cursor-pointer" data-value="3"></i>
                <i class="fas fa-star cursor-pointer" data-value="4"></i>
                <i class="fas fa-star cursor-pointer" data-value="5"></i>
            </div>
            <p id="ratingValue" class="text-lg mt-2 text-yellow-400">Rating: 0/5</p>
        </div>

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
<!-- Comment Section -->
<div 
    id="commentSection" 
    class="mt-8 bg-white-800 p-4 rounded-lg shadow-md" 
    data-id="<?= $game->game_id ?>"
>
    <h2 class="text-2xl font-bold mb-4 text-gray-700">Comments</h2>

    <!-- Comment Form -->
    <form id="commentForm" class="mb-4">
        <textarea 
            id="commentInput" 
            class="w-full p-2 border rounded-lg text-black" 
            rows="3" 
            placeholder="Write a comment..."
            required
        ></textarea>
        <button 
            type="submit" 
            class="mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500"
        >
            Submit
        </button>
    </form>

    <!-- Comment List -->
    <div id="commentList" class="space-y-4">
        <!-- Comments will be dynamically added here -->
    </div>
</div>

    <script>
        // JavaScript for countdown
        const releaseDate = new Date("<?= $game->tanggal_keluar ?>").getTime(); // Release date from PHP
        const countdownElement = document.getElementById('countdown');

        function updateCountdown() {
            const now = new Date().getTime();
            const timeRemaining = releaseDate - now;

            if (timeRemaining <= 0) {
                countdownElement.textContent = "Released!";
                return;
            }

            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            countdownElement.textContent = `Countdown: ${days}d ${hours}h ${minutes}m ${seconds}s`;
        }

        // Update countdown every second
        setInterval(updateCountdown, 1000);

        // JavaScript for slider functionality
        const slider = document.getElementById('slider');
        const items = slider.children;
        const video = document.getElementById('trailer');
        let currentIndex = 0;

        function updateSlider() {
            for (let i = 0; i < items.length; i++) {
                items[i].classList.add('hidden');
            }
            items[currentIndex].classList.remove('hidden');

            if (currentIndex !== 0 && !video.paused) {
                video.pause();
                video.currentTime = 0;
            }
        }

        document.getElementById('prevButton').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateSlider();
        });

        document.getElementById('nextButton').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % items.length;
            updateSlider();
        });

        updateSlider();

        // JavaScript for star rating
        const stars = document.querySelectorAll('#starRating i');
        const ratingValueElement = document.getElementById('ratingValue');
        let currentRating = 0;

        stars.forEach(star => {
            star.addEventListener('click', () => {
                currentRating = star.getAttribute('data-value');
                ratingValueElement.textContent = `Rating: ${currentRating}/5`;
                stars.forEach((s, index) => {
                    if (index < currentRating) {
                        s.classList.add('text-yellow-400');
                        s.classList.remove('text-gray-400');
                    } else {
                        s.classList.add('text-gray-400');
                        s.classList.remove('text-yellow-400');
                    }
                });
            });
        });
        // Get references to the form, input, list, and game ID
const commentSection = document.getElementById('commentSection');
const gameId = commentSection.getAttribute('data-id'); // Get the game ID
const commentForm = document.getElementById('commentForm');
const commentInput = document.getElementById('commentInput');
const commentList = document.getElementById('commentList');

// Load saved comments for this game ID
const savedComments = JSON.parse(localStorage.getItem(`comments_${gameId}`)) || [];
renderComments();

// Handle form submission
commentForm.addEventListener('submit', (e) => {
    e.preventDefault();

    // Get the comment text
    const commentText = commentInput.value.trim();
    if (commentText === '') return;

    // Create a new comment object
    const newComment = {
        text: commentText,
        date: new Date().toLocaleString(),
    };

    // Save the comment for this game ID
    savedComments.push(newComment);
    localStorage.setItem(`comments_${gameId}`, JSON.stringify(savedComments));
    renderComments();

    // Clear the input
    commentInput.value = '';
});

// Render comments for this game ID
function renderComments() {
    // Clear the comment list
    commentList.innerHTML = '';

    // Loop through saved comments and add them to the list
    savedComments.forEach((comment) => {
        const commentElement = document.createElement('div');
        commentElement.classList.add('p-3', 'bg-gray-100', 'rounded-lg', 'text-black');

        commentElement.innerHTML = `
            <p class="font-bold text-gray-800">${comment.date}</p>
            <p>${comment.text}</p>
        `;

        commentList.appendChild(commentElement);
    });
}

    </script>
</body>
</html>
