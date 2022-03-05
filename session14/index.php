<?php
require 'vendor/autoload.php';
require 'CharacterRemover.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::make('files/eduplus.png')->save('output/output.jpg');
