
# Blind-LowVision-as91897
Blind &amp; Low Vision fundraising landing page + database -- as91897-2.8 + as91892 - 2.3<br/>
***Coded by <a href="https://github.com/bradley-kyan" title="bradley-kyan Github">Kyan Bradley</a> of [Avondale College](https://www.avcol.school.nz/)***

## Overview ##
This project is part of a solo assesment for NCEA LVL 2 soley created by Kyan Bradley of Avondale College. This repository contains the website for as91897 and the MSSQL queries to required properly reproduce the project.
This project also contains depenecies for the Blind-LowVision-Application (as91896 - 2.7) assesment.<br><br>
<h3 title="DONT EVEN THINK ABOUT USING THIS OUTSIDE TESTING PURPOSES">THIS PROJECT IS ONLY PROOF OF CONCEPT!</h3>  
<p>Do not in under any circumstances attempt to publish/deploy this website due to security reasons. Do not use this solution outside of testing purposes. This webiste does not use any forms of encryption (SSL etc.) for data transfer. The code does not prevent SQL injection attacks, and too the connection strings to the MSSQL server is hard coded -> once again without any encryption.</p><br>
<p><q><b><i>Personally I consider this project to be a breeding ground for security flaws.</i></b></q> - Kyan Bradley </p>
<hr>

### What is contained in this repository ###
This repository contains html pages, MSSQL queries javascript scripts and php scripts, which are all dependant on one another.
## Dependencies and Requirements ##
To reporoduce this project the following are needed:
<ul><li>A PHP compatible web server running PHP 7.3 or later with MSSQL drivers enabled <br><i> See <a href="#info"><b>info </b></a> for further web server details</i>
<li>Google Chrome, Firefox, Edge etc. ( not Internet Explorer v11 )
<li>Reliable internet connetion
<li>MSSQL Server</ul>

*It must be noted that the php scripts connection strings for the MSSQL database in this repository will need to be changed to your database*

## Info ##
To set up the web server I personally used Microsoft IIS due to its great intergration into the Windows OS. XAMPP can be used as well, but i ran into difficulties regarding setting up the MSSQL drivers necessary to run the php scripts.<br>
[Microsoft Web Platform Installer](https://www.microsoft.com/web/downloads/platform.aspx) made installing the required dependencies easy in comparison to other methods.<br><br>

### Special thanks to: ###
 [kenwheeler](https://github.com/kenwheeler) - Slick.js [link](https://github.com/kenwheeler/slick/)<br/>
 [niklasvh](https://github.com/niklasvh) - Html2Canvas [link](https://github.com/niklasvh/html2canvas)<br/>
 [omcg33](https://github.com/omcg33) - jquery.limarquee [link](https://github.com/omcg33/jquery.limarquee)<br/>
 
 Mr Vijay Prasad - Teacher at Avondale College<br>
