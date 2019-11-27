<?php


//namespace Drupar\Helpers;


class ImageHelper
{
    static function publicPath()
    
    {
        return variable_get('file_public_path', '');
    }
    
    static function documentRoot()
    
    {
        return $_SERVER["DOCUMENT_ROOT"];
    }
    
    static function basePath()
    
    {
        global $base_path;
        return $base_path;
    }
    
    static function png2jpg($file, $quality = 70)
    
    {
        $uri = $file['uri'];
        
        $filepath = image_style_url('jumbotron', $uri);
        
        $resource = imagecreatefrompng($filepath);
        
        // Extraigo sólo el nombre sin la extensión.
        $filename = self::getFilename($file['filename']);
        
        if ($resource && imagejpeg($resource, self::fileDestination() . $filename . '.' . 'jpg', $quality)) {
            
            return file_build_uri($filename . '.' . 'jpg');
            
        }
    }
    
    static function getFilename($filename)
    
    {
        $matches = array();
        preg_match('/(.*).(png|jpg|jpeg|gif)/', $filename, $matches);
        
        return $matches[1];
    }
    
    static function fileDestination()
    
    {
        return self::documentRoot() . self::basePath() . self::publicPath() . '/';
    }
}