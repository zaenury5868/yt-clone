
var player = videojs('yt-video', {
    controls: true,
    playbackRates: [0.25, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4],
    plugins: {
        // thumbnails:{},
        hotkeys: {
            enableModifiersForNumbers: false,
            seekStep: 10
        }
    }
});

player.hlsQualitySelector();