<?php


namespace App\Http;


use DateTime;
use Hekmatinasser\Verta\Verta;


class Help
{
    public function age($period, $report = null)
    {
        $period = Verta::parse($period);

        if (!is_null($report)) {
            $report = Verta::parse($report);
        } else {
            $report = Verta::today();
        }
        return $period->diffDays($report);
    }


    public function sumReport($s1, $s2, $s3, $s4, $s5, $s6)
    {
        $sumTalafat = $s1 + $s2 + $s3 + $s4 + $s5 + $s6;
        return $sumTalafat;
    }


    public function aveBw($arraye, $joje){
        $sum = 0;
        foreach ($arraye as $item){
            $value = (int) $item['t_send_koshtargah'] / $joje * (int) $item['avr_v_koshtar'];
            $sum = $sum + $value;
        }
        return round($sum, 2);
    }


    public function aveDay($arraye, $joje){
        $sum = 0;
        foreach ($arraye as $item){
            $value = (int) $item['age'] * ((int) $item['t_send_koshtargah'] / $joje) ;
            $sum = $sum + $value;
        }

        return round($sum, 1);
    }


    public function gsht($s1, $s2, $s3, $s4, $s5, $s6){
        $sumTalafat = $s1 + $s2 + $s3 + $s4 + $s5 + $s6;
        return $sumTalafat;
    }


    public static function group($group){
        $str = null;

        if ($group == 1){
            $str = "ادمین";
        }elseif ($group == 2){
            $str = "دکتر";
        }elseif ($group == 3) {
            $str = "کارشناس";
        }else{
            $str = "رئیس";
        }
        return $str;
    }

    public static function UpImage($newFile, $userEmail)
    {
        if (!empty($newFile) or !is_null(!null)){
            $filename = $userEmail.".".$newFile->getClientOriginalExtension();
            $newFile->move(base_path('public/assets/images/upload'), $filename);
            return "assets/images/upload/$filename";
        }else{
            return null;
        }
    }
}
