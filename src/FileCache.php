<?php
namespace Slackbot;

class FileCache {

    /**
     * @return string new url
     */
    public function write($search, $image_url) {
        
        $binary = file_get_contents($image_url);

        $new_path = "storage/" . sha1($search);
        file_put_contents($new_path, $binary);

        return $_ENV['HOST_URL'] . "/" . $new_path;
    }
}