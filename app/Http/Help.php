<?php


namespace App\Http;


use DateTime;


class Help
{
    public function age($period, $report = null)
    {
        $period = new DateTime($period);

        if (!is_null($report)) {
            $report = new DateTime($report);
        } else {
            $report = new DateTime(Verta());
        }
        return $period->diff($report)->days;
    }


    public function sumReport($s1, $s2, $s3, $s4, $s5, $s6)
    {
        $sumTalafat = $s1 + $s2 + $s3 + $s4 + $s5 + $s6;
        return $sumTalafat;
    }
}
