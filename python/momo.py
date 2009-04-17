# -*- coding: UTF-8 -*- 
# http://www.pythonware.com/library/tkinter/introduction/x953-menus.htm

from Tkinter import *
import tkMessageBox        

root = Tk()

def say_hi():
    print "hi there, everyone!"

def callback():
    #print "clicked at", event.x, event.y 
    print "called the callback!"

def tuichu():
    if tkMessageBox.askokcancel("Quit", "Do you really wish to quit?"):
        root.destroy()

menu = Menu(root)
root.config(menu=menu)

filemenu = Menu(menu)
menu.add_cascade(label="File", menu=filemenu)
filemenu.add_command(label="New", command=callback)
filemenu.add_command(label="Open...", command=callback)
filemenu.add_separator()
filemenu.add_command(label="Exit", command=tuichu)

helpmenu = Menu(menu)
menu.add_cascade(label="Help", menu=helpmenu)
helpmenu.add_command(label="About...", command=callback)


# create a toolbar
toolbar = Frame(root, height=300)

b = Button(toolbar, text="new", width=6, command=callback)
b.pack(side=LEFT, padx=2, pady=2)

b = Button(toolbar, text="open", width=6, command=callback, state=DISABLED)
b.pack(side=LEFT, padx=2, pady=2)

#状态栏
toolbar.pack(side=TOP, fill=X)

status = Label(root, text="正常", bd=1, relief=SUNKEN, anchor=W)
status.pack(side=BOTTOM, fill=X)


root.mainloop()
