// ==UserScript==
// @name          fanyi
// @namespace     http://example.com
// @description   example.com
// @include       *
// ==/UserScript==

//link:
//javascript:(function()%20{var%20element=document.createElement('script');%20element.setAttribute('src',%20'http://localhost/Programmer/montage/js/fanyi.js');%20document.body.appendChild(element);})()

var url = "http://localhost/Programmer/montage/js/fanyi.js";

var h = document.getElementsByTagName('head').item(0);
var script=document.createElement("script"); 
script.setAttribute('type','text/javascript');
script.setAttribute("charset","UTF8");
script.setAttribute('src',url);
h.appendChild(script);
