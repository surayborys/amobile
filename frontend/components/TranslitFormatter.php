<?php
namespace frontend\components;

use yii\i18n\Formatter;

/**
 * extends yii\i18n\Formatter
 * formats cyryllic strings like "Привет мир" to "hello-world"
 *
 * @author suray
 */
class TranslitFormatter extends Formatter{
    
    /**
     * finds all cyryllic characters and replaces them with corresponded latin chars
     * also removes ~"~ ~"~ ~,~ and replaces white spaces with '-'
     * returns string with latin characters in lowercase
     * 
     * 
     * usage Yii::$app->formatter->asLatinNiSpaces('Привет, "мир"'); //privet-mir
     * 
     * @param string $someString
     * @return string
     */
    public function asLatinNoSpaces($someString)
    {
        return $this->latinNoSpacesFormat($someString);
    }
    
    protected function latinNoSpacesFormat($s)
    {
        $s = (string) $s; // convert to string
        $s = strip_tags($s); // remove HTML-tags
        $s = str_replace(array("\n", "\r"), " ", $s); // remove CR
        $s = preg_replace("/\s+/", ' ', $s); // remove multi-spaces
        $s = trim($s); // remove spaces at the beginning/at the and of the string
        
        $cyr  = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у', 
            'ф','х','ц','ч','ш','щ','ъ', 'ы','ь', 'э', 'ю','я',
            'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У',
            'Ф','Х','Ц','Ч','Ш','Щ','Ъ', 'Ы','Ь', 'Э', 'Ю','Я' );
        $lat = array( 'a','b','v','g','d','e','e','zh','z','i','y','k','l','m','n','o','p','r','s','t','u',
            'f' ,'h' ,'ts' ,'ch','sh' ,'sht' ,'i', 'y', 'y', 'e' ,'yu' ,'ya','A','B','V','G','D','E','E','Zh',
            'Z','I','Y','K','L','M','N','O','P','R','S','T','U',
            'F' ,'H' ,'Ts' ,'Ch','Sh' ,'Sht' ,'I' ,'Y' ,'Y', 'E', 'Yu' ,'Ya' );
        
        
        $s = str_replace($cyr, $lat, $s); //replace cyryllic characters
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // remove unallowable characters
        $s = str_replace(" ", "-", $s); // replace spaces with '-' sign
        $s = strtolower($s); //lowercase
        
        return $s; // return result
    }
}
