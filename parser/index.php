<?php
ini_set("max_execution_time", "1200");

$folder =  "../images/road_signs/";
$site = "http://ipdd.adrive.by/";
$start_page = 1;
$col_pages = 7;
for ($i = $start_page; $i <= $col_pages; $i++) {
    $from = "http://ipdd.adrive.by/interactive.aspx?chap=ap2_ch1_pr" . $i;
    $str = file_get_contents($from);
    if (!empty($str)) {
        preg_match_all('|<*(PDD\/IMG\/signs\/.*png)|isU', $str, $matches);

        foreach ($matches as $arr) {
            foreach ($arr as $url) {
                $filename = substr($url, strrpos($url, '/') + 1);
                try {
                    copy($site . $url, $folder . $i . '/' . $filename);
                } catch (Exception $e) {
                    throw new Exception("Ошибка копирования" . $e->getMessage());
                }
            }
        }
    }
}







