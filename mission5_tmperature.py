import os
import glob
import time
from urllib.request import urlopen

os.system('modprobe w1-gpio')
os.system('modprobe w1-therm')

base_dir = '/sys/bus/w1/devices/'
device_folder = glob.glob(base_dir + '28*')[0]
device_file = device_folder + '/w1_slave'

def read_temp_raw():
  f = open(device_file, 'r')
  lines = f.readlines()
  f.close()
  return lines

def read_temp():
  lines = read_temp_raw()
  while lines[0].strip()[-3:] != 'YES':
    time.sleep(13)
    lines = read_temp_raw()
  equals_pos = lines[1].find('t=')
  if equals_pos != -1:
    temp_string = lines[1][equals_pos+2:]
    temp_c = float(temp_string) / 1000.0
    return temp_c

while True:
  print(read_temp())
  content = urlopen("https://api.thingspeak.com/update?api_key=8JCY69RN26C01FSV&field2="+str(read_temp()))
  content1 = urlopen("http://10.42.0.14:3000/jh?temp="+str(read_temp()))
  time.sleep(4)
