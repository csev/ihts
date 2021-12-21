<?php
use \Tsugi\Util\Net;
use \Tsugi\Core\LTIX;
use \Tsugi\UI\Output;

require "top.php";
require "nav.php";

?>
<div id="container">
<div style="margin-left: 10px; float:right">
<iframe width="400" height="225" src="https://www.youtube.com/embed/onEh_zuvql4?rel=0" frameborder="0" allowfullscreen></iframe>
</div>
<h1><?= $CFG->servicedesc ?></h1>
<p>
This web site provides free / OER materials to help you learn the history and inner workings of the Internet.
You can take this course and receive a certificate at:
<ul>
<li><a href="https://www.coursera.org/learn/internet-history" target="_blank">Coursera: <?= $CFG->servicedesc ?></a> </li>
<li><a href="https://online.umich.edu/courses/internet-history-technology-and-security/" target="_blank">Free certificates for University of Michgan students and staff</a></li>
<li>
<a href="https://www.freecodecamp.org/news/learn-the-history-of-the-internet-in-dr-chucks/" target="_blank">Free Code Camp</a>
provides this material in a single video so you can sit back
and binge-watch it all without interruption.
</li>
</ul>
</p>
<p>
If you are watching the videos on a television, you might find our
<a href="ref" target="_blank">quick reference</a> useful on your phone or computer.
</p>
<p>
If you
<a href="tsugi/login.php">log in</a> to this site you have joined a free, global open and online course. You have a grade book, autograded assignments and discussion forums.
Since this site is used by learners, we take your
<a href="privacy">privacy</a> very seriously.
</p>
<h2>Technology</h2>
<p>
This site uses <a href="http://www.tsugi.org" target="_blank">Tsugi</a>
framework to embed a learning
management system into this site and handle the autograders.
If you are interested in collaborating
to build these kinds of sites for yourself, please see the
<a href="http://www.tsugi.org" target="_blank">tsugi.org</a> website.
<h3>Copyright</h3>
<p>
The material produced specifically for this site is by Charles Severance and others
and is Copyright Creative Commons Attribution 3.0
unless otherwise indicated.
</p>
<!--
<?php
echo("IP Address: ".Net::getIP()."\n");
echo(Output::safe_var_dump($_SESSION));
var_dump($USER);
?>
-->
</div>
<?php
require "foot.php";
