<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\SubscriptionOrder;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class UserOrderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataObj = [];
        DB::enableQueryLog();
        $search_data=(!empty($request->search))?$request->search:'';
        $orders = SubscriptionOrder::query()
        ->with(['plan'])
        ->whereHas('user',function($q)use($search_data)
        {
            if(!empty($search_data)) {
                $q->where("name","like","%$search_data%");
                $q->orWhere("email","like","%$search_data%");
            }
        })
        ->whereNotNull('order_id')
        ->orderBy('created_at','desc')
        ->paginate($this->records_limit);     
        $dataObj = $orders;
        return view('admin.order.userorder',compact('dataObj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadInvoicePdf(Request $request)
    {
        $userOrder=SubscriptionOrder::query()->with('user')->find($request->id);
        
        $html = view('admin.order.pdf',compact(['userOrder']));
        
        $file_name=date('siHdmY').'_'.$userOrder->id.'.pdf';
        $pdf = PDF::loadHtml($html);
        $pdf->setPaper('A4');
        return $pdf->stream($file_name,array("Attachment" => true));
        // return $pdf->download($file_name.'.pdf');
        // return view('admin.order.pdf',compact(['data','userOrder']));

    }
}
