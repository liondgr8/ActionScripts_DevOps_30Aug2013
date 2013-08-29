<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Suraj.Savita
 * Date: 6/27/12
 * Time: 5:45 PM
 * To change this template use File | Settings | File Templates.
 */

//
//require_once "../include/GLOBALS.php";
//$objGN = new General();
//$account_name = $argv[1];
//$row = array();
//$row=$objGN->getCredentials($account_name);
$row['access_key'] = 'AKIAJ5WMRJONZASMKE5A';
$row['secret_key'] = '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';
$access_key = $row['access_key'];
$secret_key = $row['secret_key'];


function My_parser($options)
{
    foreach ($options as $key => $value) {
//        echo $key;
//        echo $value;
        $pos = strrpos($value, ':');
        if (!$pos === false) {
            $xx = json_decode($value, true);
//            echo $xx;
            $options[$key] = $xx;
        }


    }
    return $options;
}


function value_check(&$value)
{
    if (preg_match('/,/', $value)) {
        $re_value = explode(',', $value);
        $value = $re_value;
//       return $re_value;
    } elseif ($value) {
    }
}


function myfunc($data1, $d)
{
    $word_separator = '>';

    $data = array_combine($data1, $d);
//    var_dump($data);
    $out = array();
    foreach ($data as $pKey => $pValue) {
        $exp = explode($word_separator, $pKey);
//        print_r($exp);
        $x = "\$out['";
//        var_dump($pValue);
        value_check($pValue);
//        var_dump($pValue);
        $x .= implode("']['", $exp) . "'] = \$pValue ;";
//        print_r($x);
        eval($x);
    }
//    var_dump($x);

//    echo '<pre>' . PHP_EOL;
//    var_dump($out);

//    echo '</pre>' . PHP_EOL;
//    $cc = array(1, 2, 3, 4, 5, 6, 7);
//    eval("\$vv = \$cc;");
//    var_dump($vv);
    $opt = $out;
//    var_dump($opt);
    return $out;

}

if ($argc > 1 && $argc & 1) {
    $params = myfunc(array_slice($argv, 1, count($argv) / 2), array_slice($argv, 1 + count($argv) / 2, count($argv) / 2));
}
else {
    $params = null;
}