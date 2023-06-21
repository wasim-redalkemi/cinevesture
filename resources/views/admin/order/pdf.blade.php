<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Receipt</title>
    <style>
        html 
        { 
            -webkit-print-color-adjust: exact; 
        }
        *
        {
            margin: 0;
            padding: 0;
        }
        @media print {
            body{
                width: 21cm;
                height: 29.7cm;
            } 
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size:13px;
        }
        .main_wrap
        {
            width: 21cm; 
            height:29.7cm;
            background: rgb(245, 241, 241);
            display: flex;
            justify-content: center;
            align-content: center;
            text-align: center;
        }
        .sub_wrap{
            position: relative;
            border:1px solid yellow;
        }
        .inner_wrap{
            border:1px solid green;
            background-color: #1c0330;
            widows: 100%;
            color: aliceblue;
            padding: 10 auto;
        }
       .inner_wrap .trans_wrap {
         /* margin: 0 auto;
        padding-left: 50%; */
        /* position: absolute;
        top: 0%;
        left: 50%;
        transform: translate(0%, -50%); */
        text-align: center
             }
             .body_wrap {
              height: 80%;
              background: #ffffff;
              width: 80%;
              text-align: left;
              padding: 2%;
              
            margin: 0 auto;
             }
             .footer_wrap{
                width: 100%; 
            }
            .footer_text{
                margin:48px auto ;
             }
            .heading1{
                margin:5rem 10rem ;
             }
            .invoice_heading{
              
             }
            .mr_33{
               margin: 0 535px;
             }
            .invoice_billed{
               /* padding: 30px 0; */
               /* display: flex; */
               /* justify-content: space-around; */
               
             }
             .invoice_wrap
             {
                position: relative;
                width: 100%;
             }
             .left-align {
                position: absolute;
                right: 0;
                top: 0;
             }
            
            .float_left{
                float: left;
             }
            .address{
               right: 0; 
             }
            .mr_top_10{
                margin: 10px 0;
             }
            .mr_top_5{
                margin: 10px 0;
             }
            .total{
                margin: 10px 0;
                clear: both;
                /* position: absolute; */
                /* right: 0; */
                /* top: 0; */
                
             }
            .sub_total{
                margin: 0 500px;
                
             }
            .tax{
                margin: 0 423px;
                
             }
            .clear_float{
                clear: both;
                
             }
             .invoice_no_wrap{
                clear: both;
                margin: 30px 0;
             }
             .total_wrap{
                margin: 0 527px;
             }
             .amt_wrap{
                right: 5px;
             }

            
    </style>
</head>
<body>
    <div class="main_wrap">
        <div class="sub_wrap"> 
            <div class="inner_wrap"> 
               <div class="trans_wrap">
                    <img  class="" style="width: 130px;"; src="{{asset('/images/asset/Logo-white.jpg')}}" alt="logo">
                </div> 
               <div class="table_wrap">
                   <div class="table_wrap_tables">
                    </div>
                    <div class="table_gap">
                    </div>
                    <div class="table_wrap_tables">
                    </div>
                    <div class="clear_float"></div>
                </div> 
               <div class="last_table_wrap">
                    <div class="last_table">
                        
                    </div>
                </div> 
            </div>
        </div>
        <div class="body_wrap">
           <div class="form">
                {{-- <h1 class="heading1" ><nobr>CONTENT OF INVOICE PDF</nobr></h1>  --}}
                <div class="sub">
                    <div>Subject: Your Invoice from Cinevesture</div>
                    <div class="invoice_heading" style="margin: 20px 535px"> <h3><nobr> TAX INVOICE </nobr></h3></div>
                </div>
           </div>
           <div class="invoice_wrap">
                <div class="float_left">
                    <div>INVOICE DATE</div>
                    <div>{{date('d-m-Y', strtotime($userOrder->created_at))}}</div>
                </div>
                <div class="address float_left">
                    <div class="" style="margin: 0 20rem"> <nobr> BILLED TO</nobr></div>
                    <div style="margin: 0 20rem; width:30%;">{{$userOrder->user->name}} ,<br> {{$userOrder->user->billing_address}}</div>
                </div>
           </div>
           <div class="invoice_no_wrap" style="margin: 40px 0;">
                <div>INVOICE NO./ORDER ID</div>
                <div>{{$userOrder->id}}</div>
           </div>
            <div class="mr_top_5">
                <hr>
            </div>
            <div class="invoice_wrap">
                <div class="">
                    <div> <b> PARTICULARS </b></div>
                    <div>SUBSCRIPTION DETAILS</div>
                    <div>{{$userOrder->plan_name}}
                        @if ($userOrder->plan_time=='y')
                            (Yearly)
                        @else
                            (Monthly)
                        @endif
                        </div>
                    <div>{{$userOrder->plan_time_quntity}} Days</div>
                    <div>Report a Problem</div>
                </div>
                <div class="left-align">
                    <div><b>AMOUNT</b></div>
                    <div class="amt_wrap">{{$userOrder->plan_amount}}</div>
                </div>
            </div>
            <div class="total">
                <div class="sub_total"><nobr>SUBTOTAL - {{ $userOrder->currency=="INR" ? 'INR' : 'USD' }} {{$userOrder->taxable}}</nobr></div>
                <div class="tax"><nobr>GST CHARGED AT 18% - {{ $userOrder->currency=="INR" ? 'INR' : 'USD' }} {{$userOrder->gst}}</nobr></div>
            </div>
            <div class="">
                <div><hr></div>
                <div class="total_wrap mr_33"><nobr>TOTAL - {{ $userOrder->currency=="INR" ? 'INR' : 'USD' }} {{$userOrder->plan_amount}}</nobr></div>
                <div><hr></div>
            </div>
           {{-- <div>
            L Neque, soluta pariatur commodi necessitatibus ab maiores provident magni quasi quisquam recusandae! Nam officia quisquam dolorum quibusdam accusamus nihil deserunt maiores cupiditate!
           </div> --}}
        </div>
        <div class="footer_wrap">
            <div class="footer_text">© 2023 Cinevesture. All rights reserved.</div>
        </div>
    </div>
</body>
</html>