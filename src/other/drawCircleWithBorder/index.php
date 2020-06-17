<?php

//TODO: make the same spaces between pixels.
function drawCircleWithBorder($radius, $numberOfSigns)
{
    $width = $radius * 3;
    // Generate an image.
    $image = imagecreatetruecolor($width, $width);
    // Create a colour.
    $white = imagecolorallocate($image, 255, 255, 255);
    // Set the center point of the circle.
    $center = $width / 2;

    $spaceSizeBetweenPixels = 360 / $numberOfSigns;
    $c = 360;
    while ($c >= 1) {
        // Calculate the new x,y coordinates and draw.
        $x = $center + $radius * cos($c);
        $y = $center + $radius * sin($c);
        imagesetpixel($image, $x, $y, $white);
        $c -= $spaceSizeBetweenPixels;
    }
    // Save the image to a file.
    imagepng($image, 'circle.png');
    // Destroy the image handler.
    imagedestroy($image);
}

drawCircleWithBorder(50, 12);