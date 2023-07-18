document.addEventListener('DOMContentLoaded', function() {
    let fullscreenButton = document.getElementById('fullscreenButton');

    function toggleFullScreen() {
        let image = this;

        if (!document.fullscreenElement) {
            if (image.requestFullscreen) {
                image.requestFullscreen();
            } else if (image.mozRequestFullScreen) {
                image.mozRequestFullScreen();
            } else if (image.webkitRequestFullscreen) {
                image.webkitRequestFullscreen();
            } else if (image.msRequestFullscreen) {
                image.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    }

    fullscreenButton.addEventListener('click', toggleFullScreen);
});
