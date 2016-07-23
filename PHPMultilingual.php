<?php 
/**
██╗  ██╗ ██████╗ ██████╗ ██████╗ ██████╗ ██████╗ ███████╗
╚██╗██╔╝██╔════╝██╔═████╗██╔══██╗╚════██╗██╔══██╗╚══███╔╝
 ╚███╔╝ ██║     ██║██╔██║██║  ██║ █████╔╝██████╔╝  ███╔╝ 
 ██╔██╗ ██║     ████╔╝██║██║  ██║ ╚═══██╗██╔══██╗ ███╔╝  
██╔╝ ██╗╚██████╗╚██████╔╝██████╔╝██████╔╝██║  ██║███████╗
╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚═════╝ ╚═════╝ ╚═╝  ╚═╝╚══════╝                                  
**/

/**
 * @package         ITCB\APP
 * @author          xC0d3rZ <x.c0d3rz000@gmail.com>
 * @copyright       xC0d3rZ  
 */
namespace ITCB\APP\TextProcessing;
 
abstract class PHPMultilingual{
    protected $language = '';

    protected $configs = [];

    protected $phrases = [];

    abstract public function translation($str);
    protected function set($to,$key,$value){
        switch ($to) {
            case 'language':
                $this->language = $value;
                $case = (isset($this->language) || $this->language == $value) ? true:false;  
                break;
            case 'configs':
                $this->configs[$key] = $value; 
                $case = (isset($this->configs[$key])) ? true:false;                  
                break;
            case 'phrases':
                $this->phrases[$key] = $value; 
                $case = (isset($this->phrases[$key])) ? true:false;                                  
                break;                            
            default:
                $case = false;
                break;
        }
        return $case;
    }
    protected function getLanguage(){
        return (object) $this->language;
    }
    protected function getPhrases(){
        return (object) $this->phrases;
    }
    protected function getConfigs(){
        return (object) $this->configs;
    }
    protected function getPhrase($phrase){
        $a = $this->getPhrases();
        $b = $a->$phrase;
        return ($b) ? $b : $this->getConfigs()->emptyPhrase;
    }
    protected function isEmpty($str){
        return ($str == $this->getConfigs()->emptyPhrase) ? true : false;
    }
    public function parse($str){
        //Copyrights  http://stackoverflow.com/a/17870017
        if (preg_match_all("/{{(.*?)}}/", $str, $variables)){
              foreach ($variables[1] as $i => $varname) {
                $compiled = str_replace($variables[0][$i], sprintf('%s',$GLOBALS[$varname]),$str);
             }
             return $compiled;
         }else{
             return $str;
         }
    }
    protected function phrase($phrase){
        $a = $this->getPhrase($phrase);
        if(!$this->isEmpty($a)){
            if($this->getConfigs()->doTranslation === true):
                 $b = $this->translation($a);
            else:
                 $b = $a;      
            endif;  
        }
        return ($b) ? $b : $this->getConfigs()->emptyPhrase;
    }
    protected function load(){
         $a = $this->getConfigs()->phrasesFile;
         if(is_readable($a) && json_decode(file_get_contents($a))){
             $phrases = json_decode(file_get_contents($a),true);
             $this->set('language','',$this->getConfigs()->language);
             foreach ($phrases as $phrase => $value) {
                       $this->set('phrases',$phrase,$value); 
             }
         }else{
                 throw new \Exception("PhraseFile not found or invalid");
              }
    }
    function get($phrase,$callback=false){
        if(is_callable($callback)){
            $callback($this->phrase($phrase));
        }else{
            return $this->parse($this->phrase($phrase));
        }
    }
    function __construct() {
        $this->load();
    }
}
?>
