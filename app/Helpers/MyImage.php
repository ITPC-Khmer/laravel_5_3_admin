<?php
namespace App\Helpers;

use Intervention\Image\Facades\Image;

class MyImage
{
    public static function resize($image,$tmp = false)
    {
        $uploads = $tmp == false ? 'uploads':'_uploads';
        try
        {
            $extension 		= 	$image->getClientOriginalExtension();
            $imageRealPath 	= 	$image->getRealPath();

            //$fullName 		= 	$image->getClientOriginalName();
            $imageName = rand(11111,99999).'_'.time().'.'.$extension;
            $thumbName 		= 	'tmp1/'. $imageName;
            $thumbName2 		= 	'tmp2/'. $imageName;

            //$imageManager = new ImageManager(); // use this if you don't want facade style code
            //$img = $imageManager->make($imageRealPath);

            $img = Image::make($imageRealPath); // use this if you want facade style code
            $img2 = Image::make($imageRealPath); // use this if you want facade style code


            $img->resize(600,400, function($constraint) {
                $constraint->aspectRatio();
            });

            $img2->resize(80, 80, function($constraint) {
                $constraint->aspectRatio();
            });


            $image->move(public_path($uploads), $imageName);

            /*// draw transparent text
            $img->text('camsmile.org', 100, 100, function($font) {
                $font->file(public_path('news/fonts/fontawesome-webfontba72.ttf'));
                $font->color(array(255, 255, 255, 0.5));
                $font->size(30);
                $font->color('#fdf6e3');
                $font->align('center');
                $font->valign('middle');
                $font->angle(45);
            });*/

            $img->save(public_path($uploads). '/'. $thumbName);
            $img2->save(public_path($uploads). '/'. $thumbName2);
            return $imageName;
        }
        catch(Exception $e)
        {
            return '#';
        }

    }

    public static function getImgFromContent($content)
    {
        $src = '#';
        try {
            preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', $content, $matches);
            $src = isset($matches[1][0]) ? $matches[1][0] : '#';
        } catch (Exception $e) {
            $src = '#';
        }

        return $src;
    }

}