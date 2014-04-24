#LastPass XSS Payload

		Greg Foss
		@Heinzarelli
		greg . foss [at] owasp . org
		v0.1 Beta
		4/24/2014

--------------------------------------------------

#Writeup
		http://blog.logrhythm.com/security/lastpass-cross-site-scripting-payload/

--------------------------------------------------

#Vulnerability Disclosure Timeline

		3/3/2014 - Vulnerability 1 - Discovery, payload development, and exploitation (v3.1.1)
		3/10/2014 - Vulnerability 1 - Disclosure to LastPass
		3/27/2014 - Vulnerability 1 - Resolved in pre-release (v3.1.4)
		4/3/2014 - Vulnerability 2 - Discovery and disclosure to LastPass (v3.1.6)
		4/13/2014 - New LastPass public release (v3.1.9) - Addresses Heartbleed concerns and introduces master password reuse protection
		4/17/2014 - Vulnerability 2 - Re-validation - XSS payload subverting new protections
		4/18/2014 - Vulnerabilities 1 & 2 Resolved in public release (v3.1.12/3.1.13)
		4/22/2014 - XSS Payload and write-up - public release

--------------------------------------------------

#Payload

ONLY USE THIS PAYLOAD LEGALLY, AGAINST AUTHORIZED TARGETS. THE DEVELOPER OF THIS PAYLOAD IS NOT LIABLE FOR ILLEGAL/QUESTIONABLE ACTIVITIES CONDUCTED WITH THIS TOOL. BY USING THIS TOOL, YOU AGREE THAT YOU HAVE READ AND UNDERSTAND THESE TERMS

This is a payload designed to exploit Cross-Site Scripting (XSS) vulnerabilities in web applications and steal LastPass login credentials. The payload consists of multiple files, most of which are simply clones of client-side code used by LastPass. Exploitation using this payload is simple, just host all of these files on your server and modify the xss.html contents to point to your server and inject this code into a vulnerable parameter.

--------------------------------------------------

#Instructions

		1. Host the payload files on your server
		2. Modify the contents of xss.html
			a. Point this to your hosted payload directory
			b. The wording can be modified within the error-overlay.php file
			c. The color of the overlay can be modified by changing the error parameter between 1 and 0 (error=1)
		3. To avoid tipping people off, modify lp.php header('location:') field to point back to a specific page on the vulnerable site
		4. If necessary, modify the xss.log file location within the lp.php, login.php, and error-overlay.php files
		5. Inject the HTML code from xss.html into a vulnerable parameter
		6. Profit
		
--------------------------------------------------

#License

Copyright (c) 2014, Greg Foss
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
* Neither the name of Greg Foss nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

--------------------------------------------------
