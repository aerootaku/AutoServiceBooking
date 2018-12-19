import subprocess
import time
import argparse
import picamera
from time import sleep
import sys
from PIL import Image
import base64
import cStringIO
import PIL.Image
import urllib2, urllib
import requests

camera = picamera.PiCamera()
camera.resolution = (800, 600)

parser = argparse.ArgumentParser(description='Display WLAN signal strength.')
parser.add_argument(dest='interface', nargs='?', default='wlan0',
                    help='wlan interface (default: wlan0)')
args = parser.parse_args()

##print '\n---Press CTRL+Z or CTRL+C to stop.---\n'

while True:
    cmd = subprocess.Popen('iwconfig %s' % args.interface, shell=True,
                           stdout=subprocess.PIPE)
    for line in cmd.stdout:
        if 'Link Quality' in line:
            unsorted =  line.lstrip('Link Quality= ')
            #print unsorted[20:]
            code = str(unsorted[20:])
            print code
            print "Capturing Image"
            camera.start_preview()
            sleep(2)
            camera.capture('snapshot.jpg', resize=(640, 480))
            camera.stop_preview()
            print "Saving to Server"
            url = 'http://aviarthardph.net/gps1.php'
            files = {'file': open('snapshot.jpg', 'rb')}
            r = requests.post(url, files=files)
            mydata=[('one',str(code))]    
            mydata=urllib.urlencode(mydata)
            path='http://aviarthardph.net/gps.php'
            req=urllib2.Request(path, mydata)
            req.add_header("Content-type", "application/x-www-form-urlencoded")
            page=urllib2.urlopen(req).read()
            #print page
        elif 'Not-Associated' in line:
            print 'No signal'
    time.sleep(1)
