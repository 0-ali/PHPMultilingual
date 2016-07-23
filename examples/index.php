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
require __DIR__ . "/English.php";
$Language = new PHPMultilingual\English;
print "<h1>". $Language->get('welcome') . "<h1/>";
$date = date("y-M-d");
echo $Language->get('date'); // date phrase containing Variable called date 
?>
