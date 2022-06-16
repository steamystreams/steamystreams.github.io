// fetch the AVI file
const sourceBuffer = await fetch("https://edge5-slc.live.mmcdn.com/live-edge/amlst:miss_juliaa-sd-8fa6d38e07615681547d8be44a9a9bde3de137a45dee7ec830593af24a67304f_trns_h264/playlist.m3u8?t=%7B%22username%22%3A%22wickedlicker23%22%2C%22room%22%3A%22miss_juliaa%22%2C%22expire%22%3A1654340763%2C%22org%22%3A%22A%22%2C%22sig%22%3A%226627dc27bfa68e50193140feae6f2fb252879dac6e254e1930f664f7427c8083%22%7D&u=wickedlicker23&rp=f869436a40dd48647958cbeebeae0c2136c22561326bdfc4a77e8a0da6656607").then(r => r.arrayBuffer());

// create the FFmpeg instance and load it
const ffmpeg = createFFmpeg({ log: true });
await ffmpeg.load();

// write the AVI to the FFmpeg file system
ffmpeg.FS(
  "writeFile",
  "https://edge5-slc.live.mmcdn.com/live-edge/amlst:miss_juliaa-sd-8fa6d38e07615681547d8be44a9a9bde3de137a45dee7ec830593af24a67304f_trns_h264/playlist.m3u8?t=%7B%22username%22%3A%22wickedlicker23%22%2C%22room%22%3A%22miss_juliaa%22%2C%22expire%22%3A1654340763%2C%22org%22%3A%22A%22%2C%22sig%22%3A%226627dc27bfa68e50193140feae6f2fb252879dac6e254e1930f664f7427c8083%22%7D&u=wickedlicker23&rp=f869436a40dd48647958cbeebeae0c2136c22561326bdfc4a77e8a0da6656607",
  new Uint8Array(sourceBuffer, 0, sourceBuffer.byteLength)
);

// run the FFmpeg command-line tool, converting the AVI into an MP4
await ffmpeg.run("-i", "https://edge5-slc.live.mmcdn.com/live-edge/amlst:miss_juliaa-sd-8fa6d38e07615681547d8be44a9a9bde3de137a45dee7ec830593af24a67304f_trns_h264/playlist.m3u8?t=%7B%22username%22%3A%22wickedlicker23%22%2C%22room%22%3A%22miss_juliaa%22%2C%22expire%22%3A1654340763%2C%22org%22%3A%22A%22%2C%22sig%22%3A%226627dc27bfa68e50193140feae6f2fb252879dac6e254e1930f664f7427c8083%22%7D&u=wickedlicker23&rp=f869436a40dd48647958cbeebeae0c2136c22561326bdfc4a77e8a0da6656607", "output.mp4");

// read the MP4 file back from the FFmpeg file system
const output = ffmpeg.FS("readFile", "output.mp4");

// ... and now do something with the file
const video = document.getElementById("video");
video.src = URL.createObjectURL(
  new Blob([output.buffer], { type: "video/mp4" })
);