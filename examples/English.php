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
namespace PHPMultilingual;
require __DIR__ . "/../PHPMultilingual.php"; 
class English extends \ITCB\APP\TextProcessing\PHPMultilingual{
      protected $language = 'en-US'; // Language code.
      protected $configs =[ 
             // Would be used when call unavailable phrase
            "emptyPhrase" => "_Empty_", 
             // Phrases File path.
            "phrasesFile" =>  __DIR__ . "/../phrases/English.json",
             //Enable Translation.
            "doTranslation" => false, 
             //Language Code.
            "language" => "en-US"

      ];
      function translation($str){
            return $str;
      }
}
