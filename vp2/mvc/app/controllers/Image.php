<?php

namespace App\Controllers;

use \Intervention\Image\ImageManagerStatic as IImage;

class Image extends Main
{
    protected $origin = 'images/katyshka_origin.jpg';
    protected $result = 'images/katyshka.jpg';

    public function index()
    {
        $this->view->render('image/index', $data);
    }

    public function change()
    {
        $image = IImage::make($this->origin);
        $image->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })
            ->rotate(45)
            ->text(
                'Katyshka!',
                $image->width() / 2,
                $image->height() / 2,
                function ($font) {
                    $font->file(PUBLIC_PATH . '/fonts/arial.ttf')
                        ->size('52');
                    $font->color(array(255, 0, 0, 0.5));
                    $font->align('center');
                    $font->valign('center');
                }
            )
            ->save('images/katyshka.jpg');
        $this->view->render('image/index');
    }
}
