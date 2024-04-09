<?php
    include("../includes/dbconfing-inc.php");
    require("vendor\autoload.php");
    use Goutte\Client;
    use Symfony\Component\DomCrawler\Crawler;

    $client = new Client();

$crawler = $client->request("GET","https://www.bankofengland.co.uk/boeapps/database/Rates.asp?Travel=NIxAZx&into=GBP");

$tableString = $crawler->filter('table')->text();
// $crawler->filterXPath('//tbody')->each(function($node) {
//     echo $node ->filter("tr > td")->text();
// });
$tableArray=explode(' ', $tableString);
echo count($tableArray);
//var_dump($tableArray);
array_splice($tableArray,0,11);
//var_dump($tableArray);
for ($i = 0; $i < count($tableArray); $i++){
    if(ord($tableArray[$i])>57){
        if(ord($tableArray[$i+1])> 57){
            if(ord($tableArray[$i+ 2])>57){
                //echo ''.$tableArray[$i].' '.$tableArray[$i+1].' '.$tableArray[$i+2].' Rate:'.$tableArray[$i+3]."\n";
                $currency=''.$tableArray[$i].' '.$tableArray[$i+1].' '.$tableArray[$i+2];
                $rate=$tableArray[$i+3];
                $stmnt=$mysqli->prepare("INSERT INTO `exchange_rates` (`exchange_Id`, `currency_name`, `exchange_rate`, `currency_symbol`, `currency_image`) VALUES (NULL,'$currency','$rate', NULL, NULL);");
                $stmnt->execute();
                $i=$i+5;
            }
            else{
                //echo ''.$tableArray[$i].' '.$tableArray[$i+1].' Rate:'.$tableArray[$i+2]."\n";
                $currency=''.$tableArray[$i].' '.$tableArray[$i+1];
                $rate=$tableArray[$i+2];
                $stmnt=$mysqli->prepare("INSERT INTO `exchange_rates` (`exchange_Id`, `currency_name`, `exchange_rate`, `currency_symbol`, `currency_image`) VALUES (NULL,'$currency','$rate', NULL, NULL);");
                $stmnt->execute();
                $i=$i+4;
            }
        }
        else{
            //echo ''.$tableArray[$i].' Rate:'.$tableArray[$i+1]."\n";
            $currency=$tableArray[$i];
            $rate=$tableArray[$i+1];
            $stmnt=$mysqli->prepare("INSERT INTO `exchange_rates` (`exchange_Id`, `currency_name`, `exchange_rate`, `currency_symbol`, `currency_image`) VALUES (NULL,'$currency','$rate', NULL, NULL);");
            $stmnt->execute();
            $i=$i+3;
        }
    }
}
