<?php
function check_cookie($title, $redirect="index.php") {
if ( isset($_POST['secret']) && ($_POST['secret'] == '42' || $_POST['secret'] == ':wq') ) {
    setCookie('secret', '42', time() + 15 * 3600 * 24);
    header("Location: ".$redirect);
    return false;
} else if ( !isset($_COOKIE['secret']) || $_COOKIE['secret'] != '42' ) {
    header('Content-Type: text/html; charset="UTF-8"');
?>
<body style="font-family: Courier,monospace; width: 80%; max-width:500px;margin-left: auto; margin-right: auto;">
<center>
<h1><?= $title ?></h1>
<form method="post">
<input type="text" name="secret">
<input type="submit" value="Unlock">
<p>
The unlock code is a number.  You won't be given the number.  It is a puzzle
where you prove that you have the pre-requisite skills for this course.
You need to figure the number out yourself.  There are clues in this page
and the links from this page.
</p>
<p>
It is not too long and has none of those funny hex (abcde) characters.
It is a very significant number with that
makes a regular appearance throughout Dr. Chuck's other online courses
(<a href="https://www.py4e.com" target="_blank">Python</a>,
<a href="https://www.dj4e.com" target="_blank">Django</a>,
<a href="https://www.wa4e.com" target="_blank">PHP</a>, and
<a href="https://www.pg4e.com" target="_blank">PostgreSQL</a>).
</p>
<p>
If you get tired of trying to guess the number, you can take
a fun break and look at some cool pictures of
<a href="https://www.sakaiger.com/sakaicar/" target="_blank">Dr. Chuck's Race Car</a>.
It is pretty awesome and he races in a series called
<a href="https://www.24hoursoflemons.com" target="_blank">24 Hours of Lemons</a>.
</p>
<p>
You can view the
<a href="privacy" target="_new">Privacy policies</a> for this web site before you enter.
We take your privacy seriously.
</p>
</form>
    <script language="javascript">
    console.log('The code is a number that is central to the book "Hitchhiker\'s Guide to the Galaxy');
    console.log('It is also the number of Dr. Chuck\'s race car');
    </script>
</center>
<?php
    return false;
} else {
    return true;
}
}
