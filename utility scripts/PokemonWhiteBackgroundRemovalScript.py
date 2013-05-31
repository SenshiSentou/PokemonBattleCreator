import bpy
import os
import sys

checkedPixels = []
im = 0
size = 0

def checkPixel(x, y):
    numPixel = 4*x + 4*size*y
    
    if numPixel in checkedPixels:
        return
    if im.pixels[numPixel] == 1 and im.pixels[numPixel+1] == 1 and im.pixels[numPixel+2] == 1:
        #print(numPixel)
        checkedPixels.append(numPixel)
        im.pixels[numPixel+3] = 0
        if x < size-1:
            checkPixel(x+1, y)
        if x > 0:
            checkPixel(x-1, y)
        if y < size-1:
            checkPixel(x, y+1)
        if y > 1:
            checkPixel(x, y-1)
        

def remWhite():
    for x in range(0,size):
        for y in range(0,size):
            if x%size == 0 or x%size == size-1 or y == 0 or y == size-1:
                checkPixel(x, y)


sys.setrecursionlimit(10000)
path = "/Applications/XAMPP/xamppfiles/htdocs/PokemonBattleScreener/pokemon/red-blue"
for root, subFolders, files in os.walk(path):
    for filename in files:
        img = os.path.join(root, filename)
        if not ".DS_Store" in img:
            print(img)
            bpy.data.images.load(img)
        #remWhite()

for i in range(0, len(bpy.data.images)):
    im = bpy.data.images[i]
    size = bpy.data.images[i].size[0]
    checkedPixels = []
    remWhite()
    im.save()