<?php
$time = date_default_timezone_set('Asia/Kolkata');
$time = new DateTime();
$time = $time->format("H:i:s d:m:Y");
$times = date_default_timezone_set('Asia/Kolkata');
$times = new DateTime();
$year_original = $times->format("Y");
$month_original = $times->format("m");
$date_original = $times->format("d"); 
function dateCheck($fdate,$rdate){
  $fdate= explode('-', $fdate);
  $rdate= explode('-', $rdate);
  if($fdate[0] < $rdate[0]){
    return true;
  }
  else if($fdate[0] == $rdate[0]){
    if($fdate[1] < $rdate[1]){
      return true;
    }
    else if($fdate[1] == $rdate[1]){
      if($fdate[2] <= $rdate[2]){
        return true;
      }
      else {
        return false;
      }
    }
    else{
      return false;
    }
  }
  else{
    return false;
  }
}

function date_array($date)
{
    $date = str_replace(" ", ":", $date);
    $date = str_replace("\\", ":", $date);
    $date = str_replace("-", ":", $date);
    $date = str_replace(",", ":", $date);
    $date = explode(':', $date);
    return $date;
}
function date_array_ago($date)
{
    $date = date_array($date);
    $time_original = date_default_timezone_set('Asia/Kolkata');
    $time_original = new DateTime();
    $year_original = $time_original->format("Y");
    $month_original = $time_original->format("m");
    $date_original = $time_original->format("d");
    $hours_original = $time_original->format("H");
    $min_original = $time_original->format("i");
    $seconds_original = $time_original->format("s");
    if ($date[5] == $year_original) {
        if ($date[4] == $month_original) {
            if ($date[3] == $date_original) {
                if ($date[0] == $hours_original) {
                    if ($date[1] == $min_original) {
                        if ($date[2] == $seconds_original) {
                            return "just now.";
                        } else {
                            return $seconds_original - $date[2] . " second(s) ago";
                        }
                    } else {
                        return $min_original - $date[1] . " Minute(s) ago";
                    }
                } else {
                    return $hours_original - $date[0] . " Hour(s) ago";
                }
            } else {
                return $date_original - $date[3] . " Day(s) ago";
            }
        } else {
            return $month_original - $date[4] . " Month(s) ago";
        }
    } else {
        return $year_original - $date[5] . " Year(s) ago";
    }
}

function secure_encript($inp)
{
    $inp = base64_encode($inp);
    return $inp;
}

function secure_decript($inp)
{
    $inp = base64_decode($inp);
    return $inp;
}
function check_mobile($mobile)
{
    if (empty($mobile)) {
        return false;
    } else {
        $mobile = secure_en_input($mobile);
        if (!preg_match("/^[0-9,10 ]*$/", $mobile)) {
            return true;
        } else {
            return false;
        }

    }
}

function check_name($name)
{
    if (empty($name)) {
        return false;
    } else {
        $name = secure_en_input($name);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            return true;
        } else {
            return false;
        }

    }
}

function check_email($email)
{
    if (empty($email)) {
        return false;
    } else {
        $email = secure_en_input($email);
        if (!preg_match("/^[a-zA-Z ]*$/", $email)) {
            return true;
        } else {
            return false;
        }

    }
}

function check_aadhar($aadhar)
{
    if (empty($aadhar)) {
        return false;
    } else {
        $aadhar = secure_en_input($aadhar);
        if (!preg_match("/^[a-zA-Z ]*$/", $aadhar)) {
            return true;
        } else {
            return false;
        }

    }
}
function prettyPrint( $json )
{
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if ( $in_escape ) {
            $in_escape = false;
        } else if( $char === '"' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                case '{': case '[':
                    $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
            }
        } else if ( $char === '\\' ) {
            $in_escape = true;
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
    }

    return $result;
}
function secure_en_input($inp)
{
    //$inp = mysql_real_escape_string($inp);
    $inp = preg_replace('#[^a-z0-9/~!@$%^)(=[]/?><,._ +/*/\/]#i', '', $inp);
    $inp = str_replace("<", "&lt;", $inp);
    $inp = str_replace(">", "&gt;", $inp);
    $inp = str_replace("'", "[sq];", $inp);
    $inp = str_replace("\"", "[dq];", $inp);
    $inp = str_replace("/", "[fws];", $inp);
    $inp = str_replace("\\", "[bws]", $inp);
    $inp = nl2br($inp);
    $inp = str_replace("&amp;", "&", $inp);
    $inp = stripslashes($inp);
    $inp = htmlentities($inp);
    $inp = trim($inp);
    $inp = htmlspecialchars($inp);
    return $inp;
}

function secure_input_uppercase($inp)
{
    $inp = strtoupper($inp);
    return $inp;
}
function secure_input_lowercase($inp)
{
    $inp = strtolower($inp);
    return $inp;
}

function secure_de_input($inp)
{
   // $inp = str_replace("/&lt;/", "<", $inp);
    //$inp = str_replace("/&gt;/", ">", $inp);
    $inp = str_replace("lt;", "<", $inp);
    $inp = str_replace("gt;", ">", $inp);
    $inp = str_replace("&amp;", " ", $inp);
    $inp = str_replace("amp;", " ", $inp);
    $inp = str_replace("nbsp;", " ", $inp);
    $inp = str_replace("[fws];", "/", $inp);
    $inp = str_replace("[sq];","'",  $inp);
    $inp = str_replace("[dq];","\"",  $inp);
    return $inp;
}

function send_mail($to, $subject, $message)
{
    
    $from = 'Admin AIR HUB,RKValley <admin@rguktrkv.ac.in>';
    // To send HTML mail, the Content-type header must be set
    $headers = 'MIME-Version:1.0' . "\r\n";
    $headers .= 'Content-type:text/html; charset=iso-8859-1' . "\r\n";
    // Create email headers
    $headers .= 'From:' . $from . "\r\n" .
    'Reply-To:' . $from . "\r\n" . 'X-Mailer:PHP/' . phpversion();
    // Compose a simple HTML email message
    /*
    $message = '<html><body>';
    $message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
    $message .= '<p style="color:#080;font-size:18px;"> </p>';
    $message .= '</body></html>';
     */
    // Sending email
    if (mail($to, $subject, $message, $headers)) {
        return 'success';
    } else {
        return 'failed';
    }
}

/*function createZIP($folderpath,$foldername){
$folderpath ="http://www.rguktrkv.ac.in";
$foldername="rguktrkv";
    $rootPath = realpath($folderpath);
    $zip = new ZipArchive();
    $fname=$folderpath.$foldername
    $zip->open($fname, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );
    foreach ($files as $name => $file)
    {
        if (!$file->isDir())
        {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);
            $zip->addFile($filePath, $relativePath);
        }
    }
    $zip->close();
}*/
function make_thumb($src, $dest, $desired_width) {

    /* read the source image */
    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);
    
    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));
    
    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
    
    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
    
    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
}
