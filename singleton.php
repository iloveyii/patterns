<?php

define('EOL', php_sapi_name()=='cli' ? PHP_EOL : '<br/>');
define('SPC', php_sapi_name()=='cli' ? ' ' : '&nbsp;');

/**
 * Design pattern - Singleton
 * @author: Hazrat Ali
 * @mail: iloveyii@yahoo.com
 * Date: 2016-07-30
 */
class Translation
{
    private static $instance;
    private $dir = 'tr';
    private $language;
    private $translations;

    public function __construct($language)
    {
        $this->language = $language;
        $this->readTanslationFile('string.json');
    }

    public static function getInstance($language)
    {
        if( ! isset(self::$instance)) {
            self::$instance = new self($language);
        }

        return self::$instance;
    }

    public function translate($text)
    {
        return isset($this->translations[$text]) ? $this->translations[$text] : false;
    }

    private function readTanslationFile($fileName)
    {
        $filePath = $this->getPathAbs($fileName);

        if(file_exists($filePath)) {
            $contents = file_get_contents($filePath);
        } else {
            $contents = json_encode([
                'language'=>'språk',
                'code'=>$this->language,
                'country'=>'land',
                'city'=>'stad'
            ]);

            file_put_contents($filePath, $contents);
        }

        $this->translations = json_decode($contents, JSON_FORCE_OBJECT);
    }

    private function getPathAbs($fileName)
    {
        $path = sprintf("%s/%s/%s/%s", dirname(__FILE__), $this->dir, $this->language, $fileName);

        if( ! file_exists(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        return $path;
    }
}

// TEST DRIVE

// object way
$translation = new Translation('sv');
echo $translation->translate('country') . EOL;

// singleton way - neat and one liner
echo Translation::getInstance('sv')->translate('country') . EOL;
echo Translation::getInstance('fr')->translate('country') . EOL;