<?php

namespace App\Helpers\Shared;

use Image;

class FileHelper
{
	public static function isFileUploaded($inputName)
	{
		return ($_FILES[$inputName]['error'] != UPLOAD_ERR_NO_FILE);
	}

	public static function uploadImage($dir, $inputName, $options)
	{
		$targetDir = $dir;

		$fileNamePrefix = isset($options['file_name_prefix']) ? $options['file_name_prefix'] : '';
		$fileExtension = isset($options['file_extension']) ? $options['file_extension'] : 'jpg';
		$fileMaxSize = isset($options['file_max_size']) ? $options['file_max_size'] : (1 * 1024 * 1024);

		$resizeToWidth = 0;
		$resizeToHeight = 0;

		$shouldResize = isset($options['resize']) ? true : false;

		if($shouldResize)
		{
			$resizeToWidth = $options['resize']['width'];
			$resizeToHeight = $options['resize']['height'];
		}

		if($_FILES[$inputName]['error'] != UPLOAD_ERR_OK){
		    switch($_FILES[$inputName]["error"]){
			  case UPLOAD_ERR_INI_SIZE:
			   $msg = "The file is larger than the server allows!";
			   break;
		      case UPLOAD_ERR_NO_FILE:
		       $msg = "No file was uploaded!";
		       break;
		      default:
		       $msg = "Sorry, there was error while uploading the file!";
		      break;  
			}
			return [false, $msg];
		}

		$file = $_FILES[$inputName];
		$fileName = $fileNamePrefix . base64_encode(date("H:m:s")) . '.' . $fileExtension;
		$targetFile = $targetDir . $fileName;

		$check = getimagesize($file["tmp_name"]);

		if($check === false) 
			return [false,'The file you uploaded is not an image!'];

		if ($file["size"] > $fileMaxSize * 1024)
		    return [false,'Sorry, File size up to ' . ($fileMaxSize / (1024)) .' KB only allowed.'];

		if (move_uploaded_file($file["tmp_name"], $targetFile)) {

			if($shouldResize)
			{
	            $img = Image::make($targetFile);

	            $height = $img->height();
	            $width = $img->width();

	            $resizeToWidth = (int) $width;
	            $resizeToHeight = (int) ((3/4) * $resizeToWidth);

	            $img->resize($resizeToWidth, $resizeToHeight);
/*
	            $resizeToWidth = (int) $resizeToWidth;
	            $resizeToHeight = (int) $resizeToWidth;*/

	            //$img->crop($resizeToWidth, $resizeToHeight);

	            static::deleteImage($targetFile);

	            $img->save($targetFile);
			}

		    return [true, $fileName];
		} else {
		    return [false, 'Sorry, there was an error uploading your file.'];
		}
	}

	public static function deleteImage($file)
	{
		unlink($file);
	}
}