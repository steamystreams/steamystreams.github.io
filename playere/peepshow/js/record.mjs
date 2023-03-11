//const FFmpeg = require('node-ffmpeg-pro');

//new FFmpeg()
.Input('https://edge18-lax.live.mmcdn.com/live-hls/amlst:sassyt33n/playlist.m3u8')
    .Output('/Users/craigellenwood/github/playere-pro/playere/recordings/test.mp4')
    .Run('/Users/craigellenwood/github/playere-pro/playere/dist/ffmpeg', FFmpeg.OverWriteOutput());