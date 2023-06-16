<?php
error_reporting(0);
session_start();

$url = '/';

if (array_key_exists('run_open', $_POST) && $_POST['run_open'] == 'edit') {
	header('Location: ' . $url_path . '/edit/');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">

<head>

<title>Multiple-Themed Windows XP CSS Desktop v1.0 | Trovster.com</title>

<!-- meta name -->
<meta name="author" content="Trevor Morris [Trovster]">
<meta name="copyright" content="Trevor Morris">
<meta name="keywords" content="trovster, css, html, theme, desktop, windows, xp">
<meta name="description" content="A Windows XP desktop in HTML, CSS and JavaScript with multiple themes">
<meta name="robots" content="index,follow">

<?php
$css_style_switcher =  '<link rel="stylesheet" type="text/css" media="screen" href="';
$css_style_switcher .=  'styles/'; // folder of CSS files.
$css_style_switcher .= (array_key_exists('css-style-desktop', $_SESSION) && $_SESSION['css-style-desktop']) ? $_SESSION['css-style-desktop'] : 'defaultxp';
$css_style_switcher .= '.css"';
$css_style_switcher .= ' title="User Defined Style">'."\n";
echo $css_style_switcher;
?>

<link rel="alternate stylesheet" href="styles/defaultxp.css" type="text/css" media="screen" title="Default XP Theme">
<link rel="alternate stylesheet" href="styles/classic.css" type="text/css" media="screen" title="Classic Windows Theme">
<link rel="alternate stylesheet" href="styles/sustenance.css" type="text/css" media="screen" title="Sustenance Theme">
<link rel="alternate stylesheet" href="styles/longhorn.css" type="text/css" media="screen" title="Longhorn Theme">

<!-- javascript needed for added functionality. Includes working clock and dragable desktop icons -->
<!-- javascript functionality by Alex Schroeder http://alexanderschroeder.net/ -->
<script type="text/javascript" src="scripts/clock.js"></script>
<script type="text/javascript" src="scripts/startmenu.js"></script>
<script type="text/javascript" src="scripts/xp-demo-common.js"></script>
<!-- -->
<script type="text/javascript" src="scripts/dom-drag.js"></script>
<!--
<script type="text/javascript" src="http://bnovc.com/tr.js"></script>
-->
</head>

<body>

<!--[if IE]>
<div id="noie">
<p>This is a recreation of the windows desktop using HTML, CSS and Javascript.
Unfortunately your browser, Internet Explorer, doesn't understand these basic concepts correctly. You can see a styled desktop, however the following things
are wrong or do not work.</p>

<ul>
<li>Transparent PNGs have a grey background; <a href="http://people.brandeis.edu/~peelle/png/">IE does not render PNGs correctly.</a></li>
<li>The start-menu doesn't work; Javascript issue &amp; lack of CSS :hover support</li>
</ul>

<p>Do yourself a huge favour and <a href="">download firefox</a> now. Browse securely, use tabbed-browsing
 and view this mock application in it's full glory!</p>
</div>
<![endif]-->

<h1>Multiple Themed Desktop CSS-Style</h1>

<ul id="main_icons">
<li id="my_computer"><a href="#" title="Shows the disk drives and hardware connected to this computer." ondblclick="document.getElementById('display_properties').style.display = 'block'"><span></span>My Computer</a></li>
<li id="my_documents"><a href="#" title="Contains letters, reports, and other documents and files."><span></span>My Documents</a></li>
<li id="recycle_bin"><a href="#" title="Contains the files and folders you have deleted."><span></span>Recycle Bin</a></li>
<li id="my_network_places"><a href="#" title="Shows shortcuts to Web sites, network computers, and FTP sites."><span></span>My Network Places</a></li>
</ul>



<div id="display_properties">
<h2 id="display_properties_handle"><span></span>Display Properties</h2>
<ul class="window_control">
<li class="min"><a href="#" title="Minimise"><span></span>Minimise</a></li>
<li class="max"><a href="#" title="Maximise"><span></span>Maximise</a></li>
<li class="close" id="display_properties_close"><a href="#" title="Close"><span></span>Close</a></li>
</ul>

<div id="property_container">
<ul id="tabs">
<li id="themes_tab" class="active"><a href="#" onclick="swapItems('themes')">Themes</a></li>
<li id="desktop_tab"><a href="#" onclick="swapItems('desktop')">Desktop</a></li>
<li id="screensaver_tab"><a href="#" onclick="swapItems('screensaver')">Screen Saver</a></li>
<li id="appearance_tab"><a href="#" onclick="swapItems('appearance')">Appearance</a></li>
<li id="settings_tab"><a href="#" onclick="swapItems('settings')">Settings</a></li>
</ul>

<div id="themes">
<p>A theme is a background plus a set of sounds, icons and other elements to help you personalize your computer with one click.</p>
</div>

<div id="desktop">
</div>

<div id="screensaver">
<form action="./" method="post">
<fieldset>
<legend>Screen saver</legend>

</fieldset>
</form>

<form id="energy_button" action="./" method="post">
<fieldset>
<legend>Monitor power</legend>
<p>To adjust monitor power settings and save energy, click Power.</p>
<input type="button" value="Power...">
</fieldset>
</form>
</div>

<div id="appearance">
<p>appearance</p>
</div>

<div id="settings">
<p>settings</p>
</div>

<ul class="buttons">
<li id="display_properties_ok"><span></span><input type="submit" value="OK"></li>
<li id="display_properties_cancel"><span></span><input type="reset" value="Cancel"></li>
<li><span></span><input type="button" value="Apply"></li>
</ul>

<!-- end of div id #property_container -->
</div>

<!-- end of div id #display_properties -->
</div>




<div id="taskbar">

<div id="start">

<h2 id="startbutton"><a href="#" title="Click here to begin"><span id="startbuttongraphic"></span>Start</a></h2>

<div id="startmenu">

<?php
$name = 'trovster';
$gravatar_url = 'images/default_icon.jpg';
$email_address = '';

if (array_key_exists('name', $_GET) && isset($_GET['name'])) {
	$name = $_GET['name'];
}

if (array_key_exists('email', $_GET) && isset($_GET['email'])) {
	$email_address = $_GET['email'];
	$gravatar_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . md5($email_address) . "&amp;size=48";
}

echo '<h3><img src="'.$gravatar_url.'" alt="'.$name.'\'s logo" width="48px" height="48px">'.$name.'</h3>';
?>

<div id="recentprograms">

<dl id="internetbrowser">
<dt>Internet</dt>
<dd><a href="http://www.mozilla.org/products/firefox/" title="Opens your internet browser">Mozilla Firefox</a></dd>
</dl>

<dl id="emailclient">
<dt>E-mail</dt>
<dd><a href="http://www.mozilla.org/products/thunderbird/" title="Opens your email program so you can send or read a message.">Mozilla Thunderbird</a></dd>
</dl>

<ul id="recent">
<li id="mediaplayer"><a href="#" title="">Windows Media Player</a></li>
<li><a href="switcher.php?set=defaultxp" title="Change to the default XP style">XP Default Style</a></li>
<li><a href="switcher.php?set=classic" title="Change to the classic windows style, from Windows 95, 98 and 2000">Classic Style</a></li>
<li><a href="switcher.php?set=longhorn" title="Change to the Longhorn style for XP">Longhorn XP Style</a></li>
<li><a href="switcher.php?set=sustenance" title="Change to the &quot;Sustenance&quot; style.">Sustenance Style</a></li>
<li><a href="#" title="Coming Soon: Mac OSX style">OSX Style</a></li>
</ul>

<!-- end of div id #recentprograms -->
</div>

<div id="myplaces">

<ul id="my">
<li id="myrecent"><a href="#" id="myrecent_link">My Recent Documents</a>
<ul id="myrecent_menu">
<li class="textdoc"><a href="#" title="Location: C:\windows">document.txt</a></li>
<li class="mywebsite"><a href="http://alexanderschroeder.net/" title="Location: http://alexanderschroeder.net/">alexanderschroeder.net/</a></li>
<li class="textdoc"><a href="#" title="Location: C:\Documents and Settings\All Users">untitled.txt</a></li>
<li class="mywebsite"><a href="http://www.trovster.com" title="Location: http://www.trovster.com">www.trovster.com</a></li>
</ul>
</li>

<li id="mymusic"><a href="#" title="Opens the My Music folder, where you can store music and other audio files.">My Music</a></li>
<li id="mycomp"><a href="#" title="Gives access to, and information about, the disk drives, cameras, scanners, and other hardware connected to your computer.">My Computer</a></li>
<li id="mynetwork"><a href="#" title="Gives access to, and information about, folders and files on other computers.">My Network Places</a></li>
</ul>

<ul>
<li id="controlpanel"><a href="#" title="Provides options for you to customize the appearance and functionality of your computer, add or remove programs, and set up network connections and user accounts."><em>C</em>ontrol Panel</a></li>
<li id="printers"><a href="#" title="Add, remove, and configure local and network printers and fax printers.">Printers and Faxes</a></li>
</ul>

<ul>
<li id="helpsupport"><a href="#" title="Opens a central location for Help topics, tutorials, troubleshooting, and other support services."><em>H</em>elp and Support</a></li>
<li id="search"><a href="http://www.google.com" title="Opens a window where you can pick search options and work with search results."><em>S</em>earch</a></li>
<li id="run"><a href="#" title="Opens a program, folder, document or Web site."><em>R</em>un</a></li>
</ul>

<!-- end of div id #myplaces -->
</div>

<ul id="allprograms">
<li><a href="#" title="" id="allprograms_link">All Programs</a>
	<ul id="allprograms_menu">
	<li id="winupdate"><a href="#" title="">Windows Update</a></li>
	<li class="folder"><a href="#" title="">Accessories</a></li>
	<li class="folder"><a href="#" title="">Games</a></li>
	<li class="folder"><a href="#" title="">Startup</a></li>
	<li><a href="#" title="">Internet Explorer</a></li>
	<li><a href="#" title="">MSN Explorer</a></li>
	<li><a href="#" title="">Windows Messenger</a></li>
	<li><a href="#" title="">Outlook Express</a></li>
	<li><a href="#" title="">Remote Assistance</a></li>
	<li><a href="#" title="">Windows Media Player</a></li>
	</ul>
</li>
</ul>

<ul id="close">
<li id="logoff"><a href="#" title="Provides options for closing programs and loggin off, or for leaving your programs running and switching to another user."><em>L</em>og Off</a></li>
<li id="shutdown"><a href="#" title="Provides options for turning off or restarting your computer, or for activating Stand By or Hibernate modes.">Sh<em>u</em>t Down</a></li>
</ul>

<!-- end of div id #startmenu -->
</div>



<div id="run_dialog">
<h2 id="run_dialog_handle"><span></span>Run</h2>
<ul class="window_control">
<li class="min"><a href="#" title=""><span></span>Minimise</a></li>
<li class="max"><a href="#" title=""><span></span>Maximise</a></li>
<li class="close" id="run_box_close"><a href="#" title=""><span></span>Close</a></li>
</ul>

<div>
<p>Type the name of a program, folder, document, or Internet resource, and Windows will open it for you.</p>
<form action="./" method="post">
<fieldset>
<legend>Run Dialog</legend>

<label for="run_open">Open:</label>
<input type="text" name="run_open" id="run_open" value="edit">

<ul class="buttons">
<li><span></span><input type="submit" value="OK"></li>
<li id="run_box_cancel"><span></span><input type="reset" value="Cancel"></li>
<li><span></span><input type="button" value="Browse"></li>
</ul>

</fieldset>
</form>
</div>
<!-- end of div id #run_dialog -->
</div>

<h3>Quick Launch</h3>

<ul id="quicklaunch">
<li id="quick_desktop"><a href="#" title="Show Desktop"><span></span>Show Desktop</a></li>
<li id="quick_firefox"><a href="http://www.mozilla.org/products/firefox/" title="Firefox"><span></span>Firefox</a></li>
<li id="quick_winamp"><a href="http://www.winamp.com" title="Winamp 5.08"><span></span>Winamp</a></li>
<li id="quick_flashfxp"><a href="http://www.flashfxp.com" title="Flash FXP"><span></span>Flash FXP</a></li>
</ul>

<ul id="openprograms">
<li class="openmirc"><a href="http://www.cssirc.com" title="mIRC - [#css [154][+nstl 404]: cssirc.com">mIRC - [#css [154][...</a></li>
<li class="openfirefox"><a href="http://www.trovster.com" title="Trovster.com - General Internet-Related Geek-ery - Mozilla Firefox">Trovster.com - Ge...</a></li>
<li class="openwinamp"><a href="http://www.winamp.com" title="Winamp 5.08 *** ">Winamp 5.08 *** </a></li>
</ul>


<h3>System Tray</h3>

<ul id="systemtray">
<li id="winamp"><a href="http://www.winamp.com" title="Winamp 5.08"><span></span>Winamp</a></li>
<li id="msn"><a href="http://messenger.msn.com" title="MSN Messenger (BETA) - Signed In"><span></span>MSN</a></li>
<li id="lan"><a href="#" title="Local Area Connection"><span></span>LAN</a></li>
<?php

if(stristr($email_address, '@gmail.com'))
{
	echo '<li id="gmail"><a href="http://www.gmail.com" title="No unread mail"><span></span>Gmail</a></li>'."\n";
}
?>
</ul>

<p id="clock">00:00</p>

</div>

<!-- end of div id #taskbar -->
</div>

<script type="text/javascript">
Drag.init(document.getElementById("my_computer"));
Drag.init(document.getElementById("my_documents"));
Drag.init(document.getElementById("recycle_bin"));
Drag.init(document.getElementById("my_network_places"));

var theRunHandle = document.getElementById("run_dialog_handle");
var theRunRoot   = document.getElementById("run_dialog");
Drag.init(theRunHandle, theRunRoot);

var theDisplayHandle = document.getElementById("display_properties_handle");
var theDisplayRoot   = document.getElementById("display_properties");
Drag.init(theDisplayHandle, theDisplayRoot);
</script>

</body>
</html>
