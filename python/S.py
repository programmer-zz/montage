import os
import re

if os.path.isfile("Result.txt"):
    try:
        os.remove("Result.txt")
    except os.error:
        print "-_-!"

port = open("port.ini", "r").read().strip()
thread = open("thread.ini", "r").read().strip()

for line in open("tj.ini", "r"):
    ip = line.strip()
    cmd = "s.exe tcp " + ip + " " + port + " " + thread + " /save"
    print cmd
    os.system(cmd)

str = ""
d = {}
ports = []
ips = []
rs = {}

for line in open("Result.txt"):
    if(line.strip() == ''):
        continue

    p = re.compile('^-')
    if(p.match(line)):
        continue

    p = re.compile('^Performing')
    if(p.match(line)):
        continue
    p = re.compile('^Scan')
    if(p.match(line)):
        continue
    p = re.compile('Open')
    line = p.sub('', line).strip()
    
    v = line[line.find("  "):].strip()
    i = line[0:line.find("  ")].strip()

    ports.append(v)
    ips.append(i)

ports.sort()
ips.sort()

#print ports

for ip in ips:
    p = {}
    for port in sorted(ports):
        p[port] = " "
    rs[ip] = p

for line in open("Result.txt"):
    if(line.strip() == ''):
        continue

    p = re.compile('^-')
    if(p.match(line)):
        continue

    p = re.compile('^Performing')
    if(p.match(line)):
        continue
    p = re.compile('^Scan')
    if(p.match(line)):
        continue
    p = re.compile('Open')
    line = p.sub('', line).strip()
    
    v = line[line.find("  "):].strip()
    i = line[0:line.find("  ")].strip()
    rs[i][v] = v

flag = 0
for k, v in rs.iteritems():

    if(flag == 0):
        str + ","
        for k3, v3 in v.iteritems():
            str += "," + k3
        str += "\n\n"
        flag = 1

    str += k
    for k2, v2 in v.iteritems():
        str += "," + v2
    str += "\n"

#print str

saveto = "rs.csv"
open(saveto,"w").writelines(str)

print "Complete"

#print open(saveto, "r").read()
