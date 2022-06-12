<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use App\Models\Period;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Help;

class DailyReportController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'گزارشات روزانه',
            'dailyReport' => DailyReport::all(),
        ];

        return view('dailyreport.daily-reports', $data);
    }


    public function create(DailyReport $dailyReport, Request $request)
    {
        $check = $request->validate([
            'tarikh' => 'required',
            't_talafat_s1' => 'nullable|numeric',
            'v_talafat_s1' => 'nullable|numeric',
            'dan_masrafi_s1' => 'nullable|numeric',
            'ave_vazn_s1' => 'nullable|numeric',
            'app_nori_s1' => 'nullable|numeric',

            't_talafat_s2' => 'nullable|numeric',
            'v_talafat_s2' => 'nullable|numeric',
            'dan_masrafi_s2' => 'nullable|numeric',
            'ave_vazn_s2' => 'nullable|numeric',
            'app_nori_s2' => 'nullable|numeric',

            't_talafat_s3' => 'nullable|numeric',
            'v_talafat_s3' => 'nullable|numeric',
            'dan_masrafi_s3' => 'nullable|numeric',
            'ave_vazn_s3' => 'nullable|numeric',
            'app_nori_s3' => 'nullable|numeric',

            't_talafat_s4' => 'nullable|numeric',
            'v_talafat_s4' => 'nullable|numeric',
            'dan_masrafi_s4' => 'nullable|numeric',
            'ave_vazn_s4' => 'nullable|numeric',
            'app_nori_s4' => 'nullable|numeric',

            't_talafat_s5' => 'nullable|numeric',
            'v_talafat_s5' => 'nullable|numeric',
            'dan_masrafi_s5' => 'nullable|numeric',
            'ave_vazn_s5' => 'nullable|numeric',
            'app_nori_s5' => 'nullable|numeric',

            't_talafat_s6' => 'nullable|numeric',
            'v_talafat_s6' => 'nullable|numeric',
            'dan_masrafi_s6' => 'nullable|numeric',
            'ave_vazn_s6' => 'nullable|numeric',
            'app_nori_s6' => 'nullable|numeric',

            'breeder' => 'required',
            'daro' => 'nullable',
            'vaksan' => 'nullable',
            'avr_v_koshtar' => 'nullable|numeric',
            't_send_koshtargah' => 'nullable|numeric',
            'description' => 'nullable',

            'type_Sickness' => 'nullable',
            'medicines' => 'nullable',
            'therapy' => 'nullable',
            'vitamin' => 'nullable',

        ], [
            '*.required' => 'مقداری را وارد کنید.',
            '*.numeric' => 'فقط عدد وارد کنید'
        ]);
        $check['period_date'] = DB::table('periods')->where('breeder', $request['breeder'])->where('status', 1)->value('tarikh_start');
        $report = new DateTime($check['period_date']);
        $period = new DateTime($check['tarikh']);

        $check['age'] = $period->diff($report)->days;
        try {
            DailyReport::create($check);
            toastr()->success('گزارش باموفقت ثبت شد');
            return redirect()->route('add-daily-report');
        } catch (\Exception $e) {
            toastr()->error($e, 'error');
            return redirect()->route('add-daily-report');
        }
    }


    public function add($dailyReport = null)
    {
        if (!is_null($dailyReport)):
            $data = [
                'title' => 'افزودن گزارش روزانه',
                'breeder' => Period::find($dailyReport)->orderBy('id', 'desc')->get(),
            ];
        else:
            $data = [
                'title' => 'افزودن گزارش روزانه',
                'breeder' => Period::where('status', 1)->get(),
            ];
        endif;

        return view('dailyreport.add-daily-report', $data);
    }


    public function show($dailyReport)
    {
        $data = [
            'title' => 'مشاهده گزارش روزانه',
            'report' => DailyReport::find($dailyReport),
        ];
        return view('dailyreport.view-daily-report', $data);
    }


    public function edit($dailyReport)
    {

        $data = [
            'title' => 'مشاهده گزارش روزانه',
            'report' => DailyReport::find($dailyReport),
            'breeder' => Period::where('status', 1)->get(),
        ];
        return view('dailyreport.edit-daily-report', $data);
    }

    public function update(Request $request, DailyReport $dailyReport)
    {

        $check = $request->validate([
            'tarikh' => 'required',
            't_talafat_s1' => 'nullable|numeric',
            'v_talafat_s1' => 'nullable|numeric',
            'dan_masrafi_s1' => 'nullable|numeric',
            'ave_vazn_s1' => 'nullable|numeric',
            'app_nori_s1' => 'nullable|numeric',

            't_talafat_s2' => 'nullable|numeric',
            'v_talafat_s2' => 'nullable|numeric',
            'dan_masrafi_s2' => 'nullable|numeric',
            'ave_vazn_s2' => 'nullable|numeric',
            'app_nori_s2' => 'nullable|numeric',

            't_talafat_s3' => 'nullable|numeric',
            'v_talafat_s3' => 'nullable|numeric',
            'dan_masrafi_s3' => 'nullable|numeric',
            'ave_vazn_s3' => 'nullable|numeric',
            'app_nori_s3' => 'nullable|numeric',

            't_talafat_s4' => 'nullable|numeric',
            'v_talafat_s4' => 'nullable|numeric',
            'dan_masrafi_s4' => 'nullable|numeric',
            'ave_vazn_s4' => 'nullable|numeric',
            'app_nori_s4' => 'nullable|numeric',

            't_talafat_s5' => 'nullable|numeric',
            'v_talafat_s5' => 'nullable|numeric',
            'dan_masrafi_s5' => 'nullable|numeric',
            'ave_vazn_s5' => 'nullable|numeric',
            'app_nori_s5' => 'nullable|numeric',

            't_talafat_s6' => 'nullable|numeric',
            'v_talafat_s6' => 'nullable|numeric',
            'dan_masrafi_s6' => 'nullable|numeric',
            'ave_vazn_s6' => 'nullable|numeric',
            'app_nori_s6' => 'nullable|numeric',

            'breeder' => 'required',
            'daro' => 'nullable',
            'vaksan' => 'nullable',
            'avr_v_koshtar' => 'nullable|numeric',
            't_send_koshtargah' => 'nullable|numeric',
            'description' => 'nullable',

            'type_Sickness' => 'nullable',
            'medicines' => 'nullable',
            'therapy' => 'nullable',
            'vitamin' => 'nullable',

        ], [
            '*.required' => 'مقداری را وارد کنید.',
            '*.numeric' => 'فقط عدد وارد کنید'
        ]);
        $check['period_date'] = DB::table('periods')->where('breeder', $request['breeder'])->where('status', 1)->value('tarikh_start');
        $report = new DateTime($check['period_date']);
        $period = new DateTime($check['tarikh']);

        $check['age'] = $period->diff($report)->days;

        try {
            $dailyReport->update($check);
            toastr()->success('گزارش باموفقت ویرایش شد');
            return redirect(route('daily-reports'));
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'error');
            return redirect()->route('daily-reports');
        }
    }


    public function destroy(DailyReport $dailyReport)
    {
        try {
            $dailyReport->delete();
            toastr()->success('با موفقیت حذف شد.');
            return redirect(route('daily-reports'));
        } catch (\Exception $e) {
            toastr()->error($e, 'خطا');
            return redirect(route('daily-reports'));
        }
    }
}
