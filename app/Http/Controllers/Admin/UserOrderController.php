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
        // dd($userOrder);
        // $challan_id = $request->id;
        // $challan=Challan::query()
        // ->with(['ewayBillDetails','petrolPumpOwner.petrolPump','fleetOwner.fleetOwner','truck'])
        // ->find($challan_id); 
        // $id = $challan->supervisor_user_id;
        // $role = 4;
        // $transporterAdmin = '';
        // for($i=0;$i<=2;$i++)
        // {
        //     $modelObj = User::find($id);
        //     $id = $modelObj->parent_user_id;
        //     $transporterAdmin = $modelObj;
        // }
        // $transporterAdmin=User::query()->with(['transporters'])->where('id',$transporterAdmin->id)->first();
        // $data = ['challan'=>'','transporterAdmin'=>''];
        // $data['challan'] = $challan;
        $data['transporterAdmin'] = ['hi'];
        $html = view('admin.order.pdf',compact(['data','userOrder']));
        
        // $file_name=date('siHdmY').'_'.$data['challan']->ewayBillDetails->ewb_eway_bill_no;
        $pdf = PDF::loadHtml($html);
        $pdf->setPaper('A4');
        return $pdf->stream('users_list.pdf',array("Attachment" => true));
        // return $pdf->download($file_name.'.pdf');
        // return view('admin.challan.pdf',compact(['data']));

    }
}
