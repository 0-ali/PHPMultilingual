PHP Multilingual
===========
**Add PHP Multilingual Support to a Website.** 

---
Are you interested in having a multilingual website?
<img src="http://www.bitrepository.com/wp-content/uploads/2009/07/php-multi-language-site.jpg">
> The solution is PHPMultilingual.

## Usage

### Include PHPMultilingual
```php
 require __DIR__ . "/Class.Phrase.php";
```
* * *
###Phrases file
The first thing we need to do is to create a Phrases files that will contain the text for each of the languages that will be supported by the website. 
 For demo purpose I have chosen English.
  Make a directory named “directory”. In this directory create one file:
 ``English.json``
 Here’s the content:
```json
{
"welcome": "Welcome",
"date": "Today is : {{date}}"
}
```
#### Include variable: 
```
{{VAR_NAME}}
```
```
{{date}}
```
#### Notice
 * Should be a valid JSON object.

### Multilingual
The second thing we need to do is to create a extend class that will allow process the **Phrases File**.
 For demo purpose I have chosen English as Class Name.

```php 
namespace PHPMultilingual;
class English extends \ITCB\APP\TextProcessing\PHPMultilingual{
      protected $language = 'en-US'; // Language code.
      protected $configs =[ 
            // Would be used when call unavailable phrase
            "emptyPhrase" => "_Empty_", 
             // Phrases File path.
            "phrasesFile" =>  __DIR__ . "/English.json",
             //Enable Translation.
            "doTranslation" => false, 
            //Language Code.
            "language" => "en-US"

      ];
      function translation($str){
            return $str;
      }
}
```
### Get Phrase
```php
require __DIR__ . "/English.php";
$Language = new PHPMultilingual\English;
print "<h1>". $Language->get('welcome') . "<h1/>";
$date = date("y-M-d");
echo $Language->get('date'); // date phrase containing Variable called date 
```


