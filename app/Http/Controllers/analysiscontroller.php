<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\User;
use App\Charts\UserLineChart;
use Charts;
use DB;
class analysiscontroller extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function analysis()
    {
        $api = url('/productanalysisajax');
        
        $chart = new UserLineChart;
        $chart->labels(['product1', 'product2', 'product3', 'product4', 'product5', 'product6', 'product7', 'product8', 'product9', 'product10', 'product11', 'product12'])->load($api);
          
        return view('analysis.product', compact('chart'));
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function analysisAjax(Request $request)
    {
     
        $product = DB::table('products')
                ->join('billings','products.id','=','billings.product_id')
                ->select(DB::raw("SUM(product_quantity) as count"),'products.p_name','products.p_price')
                ->groupby('product_id','p_name','p_price')
                    ->pluck('count');
  
        $chart = new UserLineChart;
  
        $chart->dataset('Number of sell', 'bar', $product)->options([
                    'fill' => 'true',
                    'borderColor' => 'red'
                ]);
  
        return $chart->api();
    }





    public function analysisofusers()
    {
        $api = url('/useranalysisAjax');
        
        $chart = new UserLineChart;
        $chart->labels(['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60','71','72','73','74','75','76','77','78','79','80'])->load($api);
          
        return view('analysis.product', compact('chart'));
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function analysisofuserAjax(Request $request)
    {
//               $product = DB::table('billings')
//                 ->select(DB::raw("SUM(product_price) as count"),'user_id')
//                 ->groupby('user_id')
//                     ->pluck('count');
        
         $product = DB::table('sales')
                ->select(DB::raw("SUM(total) as count"),'user_id')
                ->groupby('user_id')
                    ->pluck('count');
  
        $chart = new UserLineChart;
  
        $chart->dataset('New User Register Chart', 'line', $product)->options([
                    'fill' => 'false',
                    'borderColor' => 'blue'
                ]);
  
        return $chart->api();
    }














}
