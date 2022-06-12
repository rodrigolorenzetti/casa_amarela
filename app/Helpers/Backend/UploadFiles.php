<?php

use Buglinjo\LaravelWebp\Webp;

function UploadFile($file, $path)
{

    $extension = $file->extension();

    $md5_file =  md5($file->getClientOriginalName());
    $file_name = $md5_file . ".{$extension}";

    $file->move(public_path($path), $file_name);

    if ($extension == "png" || $extension == "jpg" || $extension == "webp" || $extension == "jpeg") {
        \Tinify\setKey("put_key_here");
        $source = \Tinify\fromFile(public_path($path) . "/{$file_name}");
        $source->toFile(public_path($path) . "/{$file_name}");
    }

    return $file_name;
}


function UploadImageWithWebp($file, $path)
{
    \Tinify\setKey("mC9WdKtKWf23VZcn0YcWHBSqnLj4pXN9");

    $extension = $file->extension();

    $md5_image =  md5($file->getClientOriginalName() . date("d/m/Y"));
    $file_name = $md5_image . ".{$extension}";
    $file_name_webp = $md5_image . ".webp";
    $path_webp = public_path($path) . "/{$file_name_webp}";

    $webp = Webp::make($file);
    $webp->save($path_webp);

    $file->move(public_path($path), $file_name);

    $source = \Tinify\fromFile(public_path($path) . "/{$file_name}");
    $source->toFile(public_path($path) . "/{$file_name}");

    return array($file_name, $file_name_webp);
}
