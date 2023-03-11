const Recorder = require('node-ffmpeg-pro');


const rec_button = document.createElement('rec_button');
rec_button.setAttribute("id", data.result.folders[i].name);
rec_button.setAttribute("class", "rec_button");
rec_button.setAttribute('onclick', 'function' + Recorder + '()', );

rec_button.innerText = data.result.folders[i].name;
var header2 = document.getElementById('header1');

header2.appendChild(rec_button);

function Recorder() {
const FFmpeg = require('node-ffmpeg-pro');

new FFmpeg()
.Input('https://edge18-lax.live.mmcdn.com/live-hls/amlst:sassyt33n/playlist.m3u8')
   .Output('recordings/test.mp4')
  .Run('./dist/ffmpeg', FFmpeg.OverWriteOutput());