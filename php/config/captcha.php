<?php 
//Send a generated image to the browser 
create_image();  

function create_image() 
{ 
    //Let's generate a totally random string using md5 
    $md5 = md5(rand(0,999)); 
    //We don't need a 32 character long string so we trim it down to 5 
    $pass = substr($md5, 10, 5); 

    //Set the image width and height 
    $width = 100; 
    $height = 40;  

    //Create the image resource 
    $image = ImageCreate($width, $height);  

    //We are making three colors, white, black and gray 
    $white = ImageColorAllocate($image, 255, 255, 255); 
    $black = ImageColorAllocate($image, 0, 0, 0); 
    $grey = ImageColorAllocate($image, 204, 204, 204); 

    //Make the background black 
    $kk=rand(1,7);
    ImageFill($image, 0, 0, $black); 

    //Add randomly generated string in white to the image
    ImageString($image, rand(5,$height-30),rand(1,50),rand(5,$height-30), $pass, $white); 

    //Throw in some lines to make it a little bit harder for any bots to break 
    //ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
    imageline($image, 0, $height/rand(1,5), $width, $height/rand(1,5), $grey);  
    imageline($image, $width/rand(1,5), 0, $width/rand(1,5), $height, $grey); 
 
    //Tell the browser what kind of file is come in 
    header("Content-Type: image/jpeg"); 

    //Output the newly created image in jpeg format 
    return ImageJpeg($image); 
    
    //Free up resources
    ImageDestroy($image); 
} 
?>