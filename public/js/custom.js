var player = videojs('yt-video');
player.on('timeupdate', function() {
    if(this.currentTime() > 3) {
        this.off('timeupdate')
        Livewire.emit('VideoViewed')
    }
})