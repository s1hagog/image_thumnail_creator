# image_thumnail_creator
A short php code to create thumbnails for the images


HOW TO USE:

To use the following snippet.

1. use require('resize.php') in your scripts folder;
2. call the function create_thumnail($path, $save, $width, $height);

More Instructions.
1. Arguments:
$path = is a path to original image to create thumbnail from. Can be like 'assets\images\123.jpg';
$save - is a path where we want to save the image (has to include file name!). Can be like 'assets\thumbs\1234.jpg';

$width = setting width for output thumbnail
$height - setting height for output thumbnail
