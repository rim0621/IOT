import time
import RPi.GPIO as GPIO

pin=[3,5,7,11,13,15,19,21,23,8,10,12]

# to use Raspberry Pi board pin numbers
GPIO.setmode(GPIO.BOARD)
GPIO.setup(18,GPIO.IN,pull_up_down=GPIO.PUD_DOWN)
start=time.time()
def setup(p):
  GPIO.setup(pin[p], GPIO.OUT)
def out(p, v):
  GPIO.output(pin[i], v)
def win():

  for j in range(0,3):
    for i in range(0,len(pin)):
      GPIO.output(pin[i],1)
    for i in range(0,len(pin)):
      GPIO.output(pin[i],-1) 
      time.sleep(0.02)
		



for i in range(0, len(pin)): setup(i)

for i in range(0, len(pin)): out(i, 0);


while 1:
 
  
    for i in range(0, len(pin)):
      out(i, 1);
      time.sleep(0.05)
    
    if (GPIO.input(18)==1):
      if  GPIO.input(3)==1 and GPIO.input(5)==1 and GPIO.input(7)==1 and GPIO.input(11)==1 and GPIO.input(13)==1 and GPIO.input(15)==1 and GPIO.input(19)==1 and GPIO.input(21)==1 and GPIO.input(23)==1 and GPIO.input(12)==1:
         print("succese")
         end=time.time()
         print(end-start)
         win()
         start=time.time()
      else:
         print("try again")

    for i in range(len(pin)-1, -1, -1):
      out(i, 0);
      time.sleep(0.05)
 
   
