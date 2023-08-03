import os
import platform
from random import randint

from colorama import Fore, init
from pytimedinput import timedInput

eating_count = 0

def print_field():
	global eating_count
	print(Fore.RED + '🍎 COUNT : ', eating_count)
	cells = ''
	for cell in CELLS:
		print_cell = '  '
		if cell in snake_body:
			print_cell = Fore.GREEN + '🐍'
			# print(Fore.GREEN + 'X', end='')
		elif cell == apple_pos:
			print_cell = Fore.RED + '🍎'
			# print(Fore.RED + '🍎',end='')
		elif cell[1] in (0, FIELD_HEIGHT - 1) or cell[0] in (0, FIELD_WIDTH - 1):
			print_cell = Fore.CYAN + '🌴'
			# print(Fore.CYAN + '#', end='')
		# else:
		# 	print(" ", end='')
		# print(cell)
		cells += print_cell
		if cell[0] == FIELD_WIDTH - 1:
			print(cells)
			# print('')
			cells = ''

def update_snake():
	global eaten
	new_head = snake_body[0][0] + direction[0], snake_body[0][1] + direction[1]
	snake_body.insert(0,new_head)
	if not eaten:
		snake_body.pop(-1)
	eaten = False

def apple_collision():
	global apple_pos, eaten, eating_count, timeout

	if snake_body[0] == apple_pos:
		apple_pos = place_apple()
		eaten = True
		eating_count += 1
		if timeout > 0.05:
			timeout -= 0.02


def place_apple():
	col = randint(1,FIELD_WIDTH - 2)
	row = randint(1,FIELD_HEIGHT - 2)
	while (col, row) in snake_body:
		col = randint(1,FIELD_WIDTH - 2)
		row = randint(1,FIELD_HEIGHT - 2)
	return (col,row)

init(autoreset=True)

# settings
FIELD_WIDTH = 16
FIELD_HEIGHT = 16
CELLS = [(col,row) for row in range(FIELD_HEIGHT) for col in range(FIELD_WIDTH)]

# snake
snake_body = [
	(5,FIELD_HEIGHT // 2),
	(4,FIELD_HEIGHT // 2),
	(3,FIELD_HEIGHT // 2)]
DIRECTIONS = {'left':(-1,0),'right': (1,0),'up': (0,-1),'down': (0,1)}
direction = DIRECTIONS['right']
eaten = False
apple_pos = place_apple()


def cls():
    platformOS = platform.platform()
    clearCmd = 'clear'
    if 'Window' in platformOS:
        clearCmd = 'cls'
    os.system(clearCmd)

timeout = 0.3
while True:
	try:
		cls()

		# draw field
		print_field()

		# get input
		txt,_ = timedInput('',timeout = timeout)
		match txt:
			case 'w': direction = DIRECTIONS['up']
			case 'a': direction = DIRECTIONS['left']
			case 's': direction = DIRECTIONS['down']
			case 'd': direction = DIRECTIONS['right']
			case 'q':
				# os.system('cls')
				break

		# update game 
		update_snake()
		apple_collision()

		# check death
		if snake_body[0][1] in (0, FIELD_HEIGHT - 1) or \
		snake_body[0][0] in (0,FIELD_WIDTH - 1) or\
		snake_body[0] in snake_body[1:]:
			# os.system('cls')
			break
	except KeyboardInterrupt:
		break
