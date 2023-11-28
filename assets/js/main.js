
 document.addEventListener('DOMContentLoaded', function() {
    const player = new Plyr('#player', {
        controls: ['play', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'],
        hideControls: true // Assurez-vous que cette option est définie pour masquer les contrôles
    });

    const playerElement = document.getElementById('player');

    playerElement.addEventListener('mouseenter', function() {
        player.toggleControls(true);
    });

    playerElement.addEventListener('mouseleave', function() {
        player.toggleControls(false);
    });
});

