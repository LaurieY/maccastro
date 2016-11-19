<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
      "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Maps of Lecture and Meeting Venues</title>
  <meta name="generator" content="Amaya, see http://www.w3.org/Amaya/">
  <meta name="keywords"
  content="Astronomy, Solar System, Sun, Moon, Planets, Nebulae, Galaxies, Deep Sky Objects, Cosmos, Telescope Observing, Lovell Telescope, Jodrell Bank">
  <meta name="description" content="Macclesfield Astronomical Society">
  <meta name="description" content="Directions to MaccAstro Venues">
  <meta name="Author" content="Alan Banks">
<link rel="apple-touch-icon" href="apple-touch-icon-120x120-precomposed.png">
<link rel="apple-touch-icon" href="apple-touch-icon-152x152-precomposed.png">
  <link href="css/macc-style-min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

  <script type="text/javascript">
$(document).ready(function(){if($("ul.dropdown").length){$("ul.dropdown li").dropdown();}});$.fn.dropdown=function(){return this.each(function(){$(this).hover(function(){$(this).addClass("hover");$('> .dir',this).addClass("open");$('ul:first',this).css('visibility','visible');},function(){$(this).removeClass("hover");$('.open',this).removeClass("open");$('ul:first',this).css('visibility','hidden');});});}</script>
  <script type="text/javascript">
$(document).ready(function(){if((navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.match(/iPod/i))||(navigator.userAgent.match(/iPad/i))){$(".class li a").click(function(){});}});</script>

  <script type="text/javascript">jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {var currentAttrValue = jQuery(this).attr('href');
         // Show/Hide Tabs
jQuery('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();
         // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
        e.preventDefault();    });});
 </script>
 
</head>

<body>

<div id="header">

<div class="top">
</div>

<div class="logo">
<?php include("logo.php"); ?>
</div>
</div>


<div class="frame1">
<?php include("menu.php"); ?>
</div>

<div class="frame">

<div id="main-content1">

<div align="center">

<div class="text1">
<p style="text-align:justify;margin-left:auto;margin-right:auto;"><strong><em
style="color:#800040">We hold three meetings every month,</em></strong><br>
a Lecture (Goostrey), a Social evening (Blacksmith's Arms), &amp; Workshop
(Calvary Church Hall).<br>
All meetings start at 20:00 and last approximately 90 minutes.</p>
</div>
</div>

<div class="tabs">
<ul class="tab-links">
  <li class="active"><a href="#tab1">Goostrey Village Hall</a></li>
  <li><a href="#tab2">Blacksmith's Arms</a></li>
<!--
  <li><a href="#tab3">Heritage Centre</a></li>
-->
  <li><a href="#tab4" name="Calvary" id="Calvary">Calvary Church Hall</a></li>
</ul>

<div class="tab-content">

<div id="tab1" class="tab active">
<p style="text-align:center;margin-left:auto;margin-right:auto;">Our Lecture
(Village Hall, Goostrey) is held on the third Tuesday of every month.<br>
Our speakers are usually well regarded academics or experts in the world of
astronomy. </p>
<img alt="" src="graphics/goosteyvh-sm.gif" width="900" height="790"> </div>

<div id="tab2" class="tab">
<p style="text-align:center;margin-left:auto;margin-right:auto;">Our Social
Evening (Blacksmiths Arms, Henbury) is held on the second Tuesday of every
month.<br>
This is our chance to get together and talk astronomy. </p>
<img alt="" src="graphics/maccmap.gif" width="900" height="560"> </div>
<!--
<div id="tab3" class="tab">
<p style="text-align:center;margin-left:auto;margin-right:auto;">Our Workshop
(Heritage Centre, Macclesfield) is held on the first Tuesday of every month.<br>
This is where our members showcase their passion for astronomy in a variety of
short presentations.</p>
<img alt="" src="graphics/heritage.gif" width="900" height="790"> </div>
-->
<div id="tab4" class="tab">
<p style="text-align:center;margin-left:auto;margin-right:auto;">
Our Workshop
(Cavary Curch Hall, Macclesfield) is held on the first Tuesday of every month.<br>
This is where our members showcase their passion for astronomy in a variety of
short presentations.<br>
20:00 at Calvary Church Hall, Merebrook Rd, Macclesfield SK11 8RH<br>
For larger image <a href="graphics/CalvaryChurch.jpg">click here.</a> </p>
<img alt="" src="graphics/CalvaryChurch.gif" width="900" height="411"> </div>
</div>
</div>
</div>
</div>

<div id="bottom">
<p style="text-align:center;margin-left:auto;margin-right:auto;"><span
style="color:#ffffff">© Macclesfield Astronomical Society
<?php echo date("Y") ?></span></p>
</div>
</body>
</html>
