#!/bin/bash
sox -t mp3 /home/pi/fm2/1.mp3 -t wav - | ./pi_fm_rds -audio - -freq 103.0
