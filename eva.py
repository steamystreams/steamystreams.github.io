import http.client
from ffmpeg_streaming2 import  S3, CloudManager
import ffmpeg_streaming2
import socket
import argparse
import datetime
import sys
import logging
from ffmpeg_streaming2 import Formats
import socket
import threading
import time
import subprocess as sp
from ffmpeg_progress import start



#def bbs(conn):
  #  user_list.append(conn)

   #   greet = "☩欢迎来到混沌世界☩\n{}当前在线人数{}{}(发送在线人数获取当前聊天室人数)".format('*'*10, len(user_list), '*'*10)
    #  conn.send(greet.encode('utf-8'))
    #  try:
     #     while 1:
        #      msg = conn.recv(1024)
          #    if msg.decode('utf-8')[-4:] == '在线人数':
           #       conn.send("{}当前在线人数{}{}".format('*'*10, len(user_list), '*'*10).encode('utf-8'))
       #       elif msg:
           #       for user in user_list:
                  #    user.send(msg)
   #   except ConnectionResetError:
     #     user_list.remove(conn)
      #  #    conn.close()

 # user_list = []
 # server = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
 #  # server.bind(('0.0.0.0', 5500))
 #  # server.listen()
 # while 1:
    #  conn, addr = server.accept()
    #  t = threading.Thread(target=bbs, args=(conn,))
   #   t.start()

 # def send_msg():
    #  while 1:
       #   msg = input()
       #   client.send((name + '：' + msg).encode('utf-8'))


 # def recv_msg():
   #   while 1:
         # msg = client.recv(1024)
       #   if msg:
          #    try:
                #  print(msg.decode('utf-8'))
              #    time.sleep(1)
             # except UnicodeDecodeError:
             #     pass

 # name = input('请输入你的昵称：')
 # client = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
 # client.connect(('http://localhost', 5500))
 #  # sendmsg_thread = threading.Thread(target=send_msg)
 # recvmsg_thread = threading.Thread(target=recv_msg)
# sendmsg_thread.start()
 # recvmsg_thread.start()


save_to = '/Volumes/Craig_ssd/redhawk/cb_python/venv/lib/python3.11/site-packages/ffmpeg_streaming2/tests/files/enc2.key'
url = 'http://127.0.0.1:5501/hls.js/demo/enc.key'





conn = http.client.HTTPSConnection("chaturbate.com")

payload = ""

headers = {
   
    'Content-Type': "application/json"
    }

conn.request("GET", "/api/public/affiliates/onlinerooms/?limit=10&hd=true&gender=f&embed_video_only=1&wm=aqAcE&client_ip=request_ip", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))

logging.basicConfig(filename='streaming.log', level=logging.NOTSET, format='[%(asctime)s] %(levelname)s: %(message)s')




string=data
if b'revshare' in data:
        video = ffmpeg_streaming2.input('https://edge18-lax.live.mmcdn.com/live-hls/amlst:eva_fashionista/playlist.m3u8')

stream = video.stream2file(Formats.h264())
stream.output('/Volumes/12tb/cams/eva3.mp4')
#stream.output(clouds=save_to_s3)
print('amelie is online')
  



def monitor(ffmpeg, duration, time_, time_left, process):
    def ffmpeg_callback(infile: str, outfile: str, vstats_path: str):
        return sp.Popen(['ffmpeg',
                     '-nostats',
                     
                     '-loglevel', '0',
                     '-y',
                     '-vstats_file', vstats_path,
                     '-i', infile,
                      outfile]).pid


def on_message_handler(percent: float,
                       fr_cnt: int,
                       total_frames: int,
                       elapsed: float):
    sys.stdout.write('\r{:.2f}%'.format(percent))
    sys.stdout.flush()


start('my input file.mov',
      'some output file.mp4',
      ffmpeg_callback,
      on_message=on_message_handler,
      on_done=lambda: print(''),
      wait_time=1)  # seconds
schedule.every(20).minutes.do(job)

while True:
    schedule.run_pending()
    time.sleep(1)