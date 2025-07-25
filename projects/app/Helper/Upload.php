<?php 

namespace App\Helper;

use ModelHelper;
use Image;

/**
 * Class Upload
 * @package App\Helper
 */
class Upload{

    /**
     * @param $file
     * @param string $path
     * @return string
     */
	public static function fileUpload($file,$path="uploads"){
        $path="uploads/".$path;
		$ext=$file->getClientOriginalExtension();
        $image=uniqid().'.'.$ext;
        $file->move(public_path($path),$image);
        $image_name=$path.'/'.$image;
        return $image_name;
	}

    /**
     * @param $file
     * @param string $path
     * @return string
     */
	public static function uploadData($file,$path="uploads/files"){
        $path="uploads/".$path;
		$ext=$file->getClientOriginalExtension();
        $image=uniqid().'.'.$ext;
        $file->move(public_path($path),$image);
        $image_name=$path.'/'.$image;
        return $image_name;
	}
       
    public static function uploadWithLogoImageData($file,$path="uploads/files"){
        // $path="uploads/".$path;
        // $ext=$file->getClientOriginalExtension();
        // $image=uniqid().'.'.$ext;
        // $file->move(public_path($path),$image);
        // $image_name=$path.'/'.$image;
        // $logo=public_path('uploads/logo/watermark-logo.png');
        // $main_image=public_path($path.'/'.$image);


        //  $img = Image::make($main_image);
   
        // /* insert watermark at bottom-right corner with 10px offset */
        // $img->insert($logo, 'bottom-right', 10, 10);
       
        // $img->save(public_path($path.'/water/'.$image)); 
       


        // return $path.'/water/'.$image;
         $path="uploads/".$path;
        $ext=$file->getClientOriginalExtension();
        $image=uniqid().'.'.$ext;
        $file->move(public_path($path),$image);
        $image_name=$path.'/'.$image;
        return $image_name;
    }

    public static function logouploadData($file,$path="uploads"){
        $path="uploads/".$path;
        $ext=$file->getClientOriginalExtension();
        $image="logo-".uniqid().'.'.$ext;
        $file->move(public_path($path),$image);
        $image_name=$path.'/'.$image;
        return $image_name;
    }

    public static function videoUploadData($file,$path="uploads"){
        $path="uploads/".$path;
        $ext=$file->getClientOriginalExtension();
        $image="video-".uniqid().'.'.$ext;
        $file->move(public_path($path),$image);
        $image_name=$path.'/'.$image;
        return $image_name;
    }
}	