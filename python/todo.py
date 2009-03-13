# -*- coding: UTF-8 -*- 
try:
  from xml.etree import ElementTree
except ImportError:
  from elementtree import ElementTree
import gdata.calendar.service
import gdata.service
import atom.service
import gdata.calendar
import atom
import getopt
import sys
import string
import time
import datetime

from calendarExample import *

def totimestamp(strtime, timezone=8):
  t = strtime.split('T')
  d = t[0].split('-')
  try:
    t = t[1].split(':')[:2]
  except:
    t = []
  t = [int(i) for i in d+t]
  try:
    dt = datetime.datetime(t[0], t[1], t[2], t[3]-timezone+8, t[4])
  except:
    dt = datetime.datetime(t[0], t[1], t[2])
  value = time.mktime(dt.timetuple())
  #print datetime.datetime.fromtimestamp(value)
  #return str(value)
  return str(datetime.datetime.fromtimestamp(value))

#gdata.py-1.2.4/samples/calendar/calendarExample.py

#user = "testunit.zhang@gmail.com"
#pw = "yqqlmgsycl"

user = "zhang.allyes@gmail.com"
pw = ""

#TODO week view 周视图
cal_client = gdata.calendar.service.CalendarService()
cal_client.email = user
cal_client.password = pw
cal_client.source = 'Google-Calendar_Python_Sample-1.0'
cal_client.ProgrammaticLogin()

#feed = cal_client.GetCalendarEventFeed()
#print 'Events on Primary Calendar: %s' % (feed.title.text,)

#按日期查
query = gdata.calendar.service.CalendarEventQuery('default', 'private', 'full')
query.start_min = '2009-03-01'
query.start_max = '2009-03-07' 
feed = cal_client.CalendarQuery(query)

for i, an_event in zip(xrange(len(feed.entry)), feed.entry):
  print "\n"
  print "==%s==" % an_event.title.text.decode('UTF-8').encode('gbk')
  if an_event.content.text:
    print an_event.content.text.decode('UTF-8').encode('gbk')
  #print an_event.content.text
  for a_when in an_event.when:
    #print a_when.start_time
    print totimestamp(a_when.start_time)
    #print 'End:   %s' % (a_when.end_time,)

#sample = CalendarExample(user, pw)
#sample._FullTextQuery("Be");
