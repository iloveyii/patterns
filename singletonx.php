<?php

define('EOL', php_sapi_name()=='cli' ? PHP_EOL : '<br/>');
define('SPC', php_sapi_name()=='cli' ? ' ' : '&nbsp;');

/**
 * Design pattern - Singleton extended
 * The extended version contains an array of instances
 *
 * @author: Hazrat Ali
 * @mail: iloveyii@yahoo.com
 * Date: 2016-07-30
 */
class TranslationX
{
    private static $instances = [];
    private $dir = 'tr';
    private $language;
    private $translations;

    public function __construct($language)
    {
        $this->language = $language;
        $this->readTranslationFile('string.json');

        echo 'Object initiated with language ' , $language . EOL;
    }

    public static function getInstance($language)
    {
        if( ! isset(self::$instances[$language])) {
            self::$instances[$language] = new self($language);
        }

        return self::$instances[$language];
    }

    public function translate($text)
    {
        return isset($this->translations[$text]) ? $this->translations[$text] : false;
    }

    private function readTranslationFile($fileName)
    {
        $filePath = $this->getPathAbs($fileName);

        if(file_exists($filePath)) {
            $contents = file_get_contents($filePath);
        } else {
            $svContents = json_encode([
                'language'=>'språk',
                'code'=>$this->language,
                'country'=>'land',
                'city'=>'stad'
            ]);
            $frContents = json_encode([
                'language'=>'la langue',
                'code'=>$this->language,
                'country'=>'pays',
                'city'=>'ville'
            ]);

            if($this->language == 'sv') {
                file_put_contents($filePath, $svContents);
                $contents = $svContents;
            }

            if($this->language == 'fr') {
                file_put_contents($filePath, $frContents);
                $contents = $frContents;
            }
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

// singleton way - neat and one liner
echo TranslationX::getInstance('sv')->translate('country') . EOL;
echo TranslationX::getInstance('fr')->translate('country') . EOL;

echo TranslationX::getInstance('sv')->translate('country') . EOL;