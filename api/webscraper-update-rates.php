<?php
//used to set up and figure out webscraper
// Author:codeRECODE
// Title: PHP Web Scraping Tutorial
// Date:Jul 14, 2022
// URL:https://youtu.be/rmGTB9-kB78?si=q_mu7Wzvbk5tLCvQ
    include("/xampp/htdocs/CurrencyTransfer/includes/dbconfing-inc.php");
    require("vendor\autoload.php");
    use Goutte\Client;
    use Symfony\Component\DomCrawler\Crawler;

    $client = new Client();

$crawler = $client->request("GET","https://www.bankofengland.co.uk/boeapps/database/Rates.asp?Travel=NIxAZx&into=GBP");


$tableString = $crawler->filter('table')->text();
//seperates string into array
$tableArray=explode(' ', $tableString);
echo count($tableArray);
array_splice($tableArray,0,11);
//checks ascii values of the satrt of each entry to see if its still the currency name or chnaged to exchnage rate
for ($i = 0; $i < count($tableArray); $i++){
    if(ord($tableArray[$i])>57){
        if(ord($tableArray[$i+1])> 57){
            if(ord($tableArray[$i+ 2])>57){
                $currency=''.$tableArray[$i].' '.$tableArray[$i+1].' '.$tableArray[$i+2];
                $rate=$tableArray[$i+3];
                $stmnt=$mysqli->prepare("UPDATE exchange_rates SET exchange_rate='$rate' WHERE currency_name='$currency'");
                $stmnt->execute();
                $i=$i+5;
            }
            else{
                $currency=''.$tableArray[$i].' '.$tableArray[$i+1];
                $rate=$tableArray[$i+2];
                $stmnt=$mysqli->prepare("UPDATE exchange_rates SET exchange_rate ='$rate'WHERE currency_name='$currency'");
                $stmnt->execute();
                $i=$i+4;
            }
        }
        else{
            $currency=$tableArray[$i];
            $rate=$tableArray[$i+1];
            $stmnt=$mysqli->prepare("UPDATE exchange_rates SET exchange_rate='$rate'WHERE currency_name='$currency'");
            $stmnt->execute();
            $i=$i+3;
        }
    }
}
$data=1;
header('Location:/CurrencyTransfer/exchange-update.php?data='.$data);
