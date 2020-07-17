<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\User;
use App\Charts\UserLineChart;
use Charts;
   
class ChartController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chartLine()
    {
        $api = url('/chart-line-ajax');
   
        $chart = new UserLineChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api);
          
        return view('chartLine', compact('chart'));
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chartLineAjax(Request $request)
    {
        $year = $request->has('year') ? $request->year : date('Y');
        $users = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', $year)
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
  
        $chart = new UserLineChart;
  
        $chart->dataset('New User Register Chart', 'bar', $users)->options([
                    'fill' => 'true',
                    'borderColor' => 'red'
                ]);
  
        return $chart->api();
    }



    public function random(){

            $chart=Charts::create('line','highcharts')
                    ->setTitle('My chart')
                    ->setLabels(['First','Second','Third'])
                    ->setValues([5,10,20])
                    ->setDimensions(1000,500)
                    ->setResponsive(false);
                    return view('home',compact('chart'));
    }
}