const FFmpeg = require('node-ffmpeg-pro');

new FFmpeg()
.Input('https://edge18-lax.live.mmcdn.com/live-hls/amlst:venicebtchh/playlist.m3u8')
    .Output('recordings/test.mp4')
    .Run('./dist/ffmpeg', FFmpeg.OverWriteOutput());

    