<?php 

/* Date & Time */
echo 'Date & Time <br>';
echo ' How to get today in date and time 
<pre>
$currentTime = time(); # second unit 
echo $currentTime;
echo $currentTime + 5 * 24 * 60 * 60; # time of 5 days later 
echo $currentTime - 24 * 60 * 60; # time of a previous day 
</pre>';
$currentTime = time(); # second unit 
echo $currentTime;
echo '<br>';
echo $currentTime + 5 * 24 * 60 * 60; # time of 5 days later 
echo '<br>';
echo $currentTime - 24 * 60 * 60; # time of a previous day 
echo '<br>';
echo '<br>';

echo 'Due to https://www.php.net/manual/en/datetime.format.php, we can get format keywords <br>';
echo '<pre>
# date( format, time );
echo date(\'m/d/Y g:ia\');
echo date(\'m/d/Y g:ia\', $currentTime + 5 * 24 * 60 * 60);
echo date(\'m/d/Y g:ia\', $currentTime - 24 * 60 * 60);
</pre>';
echo date('m/d/Y g:ia');
echo '<br>';
echo date('m/d/Y g:ia', $currentTime + 5 * 24 * 60 * 60);
echo '<br>';
echo date('m/d/Y g:ia', $currentTime - 24 * 60 * 60);
echo '<br>';
echo '<br>';

echo 'Set time zone by date_default_timezone_set( timezone ) due to https://www.php.net/manual/en/timezones.php';
echo '<pre>
$timezone = date_default_timezone_get();
echo $timezone;
date_default_timezone_set(\'Asia/Ho_Chi_Minh\');
echo date(\'m/d/Y g:ia\');
echo date(\'m/d/Y g:ia\', $currentTime + 5 * 24 * 60 * 60);
echo date(\'m/d/Y g:ia\', $currentTime - 24 * 60 * 60);
</pre>';
$timezone = date_default_timezone_get();
echo $timezone;
echo '<br>';
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('m/d/Y g:ia');
echo '<br>';
echo date('m/d/Y g:ia', $currentTime + 5 * 24 * 60 * 60);
echo '<br>';
echo date('m/d/Y g:ia', $currentTime - 24 * 60 * 60);
echo '<br>';
echo '<br>';

echo ' How to set date in date and time 
<pre>
1) echo date(\'m/d/Y g:ia\', mktime(0,0,0,4,10,null));
2) echo date(\'m/d/Y g:ia\', strtotime(\'2021-01-18 07:00:00\'));
3) echo date(\'m/d/Y g:ia\', strtotime(\'first day of february \')); 
# due to https://www.php.net/manual/en/datetime.formats.relative.php
</pre>'; 
echo date('m/d/Y g:ia', mktime(0,0,0,4,10,null));
echo '<br>';
echo date('m/d/Y g:ia', strtotime('2021-01-18 07:00:00'));
echo '<br>';
echo date('m/d/Y g:ia', strtotime('first day of February')); 
echo '<br>';
echo '<br>';

echo 'Get date as array 
<pre>
$date = date(\'m/d/Y g:ia\', strtotime(\'first day of February\'));
$arr = date_parse_from_format(\'m/d/Y g:ia\', $date);
</pre>';
$date = date('m/d/Y g:ia', strtotime('first day of February'));
$arr = date_parse_from_format('m/d/Y g:ia', $date);
echo '<pre>';
print_r($arr);
echo '</pre>';