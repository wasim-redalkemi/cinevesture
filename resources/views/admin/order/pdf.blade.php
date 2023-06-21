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
            font-size:14px;
            line-height: 20px;
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
        .head_wrap{
            position: relative;
            height: 2cm;
            /* border:1px solid yellow; */
        }
        .inner_wrap{
            background-color: #1c0330;
            widows: 100%;
            color: aliceblue;
            padding: 15px 0px;
        }
       .inner_wrap .trans_wrap {
            text-align: center;
        }
        .body_wrap {
            height: 24.5cm;
            background: rgba(255,255,255,0.8);
            width: 80%;
            text-align: left;
            padding: 3% 2% 2% 2%; 
            margin: 0 auto;
        }
        .body_wrap:after {
            background: url("{{asset('/images/asset/Logo-white-trans.png')}}") no-repeat center;
            content: "";
            opacity: 0.3;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;   
            transform: rotate(-30deg);
        }
        .footer_wrap{
            position: relative;
            width: 100%; 
            height: 2cm;
        }
        .invoice_wrap
        {
            position: relative;
            width: 100%;
        }
        .float_left{
            float: left;
        }
        .total{
            width: 100%;
            position: relative;
            text-align: right;
            padding: 0px 0px 0px 0px;
        }
        .amount_wrap
        {
            position: relative;
            float: right;
            text-align: right;
        }
        .clear_float
        {
            clear: both;
        }
        .invoice_no_wrap{
            margin: 30px 0;
        }
        .total_wrap{
            width: 100%;
            text-align: right;
            position: relative;
            padding:2px;
        }
        .hr_line
        {
            height: 1px;
            background-color: #ccc;
            width: 100%;
        }
        .footer_text
        {
            width: 100%;
            height: 100%;
            position: relative;
        }
        .footer_text_wrap
        {
            top: 35%;
            position: relative;
        }
    </style>
</head>
<body>
    <div class="main_wrap">
        <div class="head_wrap"> 
            <div class="inner_wrap"> 
               <div class="trans_wrap">
                    <img  class="" style="width: 130px;"; src="{{asset('/images/asset/Logo-white.jpg')}}" alt="logo">
                </div> 
            </div>
        </div>
        <div class="body_wrap">
           <div class="form">
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
                <div class="clear_float"></div>
           </div>
           <div class="invoice_no_wrap">
                <div>INVOICE NO</div>
                <div>{{$userOrder->id}}</div>
           </div>
            <div class="">
                <div class="hr_line"></div>
            </div>
            <div class="invoice_wrap">
                <div class="float_left">
                    <div> <b> PARTICULARS </b></div>
                    <div>SUBSCRIPTION DETAILS</div>
                    <div>{{$userOrder->plan_name}}
                        @if ($userOrder->plan_time=='y')
                            (Yearly)
                        @else
                            (Monthly)
                        @endif
                        </div>
                    <div>Valid for {{$userOrder->plan_time_quntity}} days.</div>
                </div>
                <div class="float_left amount_wrap">
                    <div><b>AMOUNT</b></div>
                    <div class="amt_wrap">{{ $userOrder->currency=="INR" ? 'INR' : 'USD' }} {{$userOrder->plan_amount}}</div>
                </div>
                <div class="clear_float"></div>
            </div>
            <div class="total">
                <div class="sub_total"><nobr>SUBTOTAL - {{ $userOrder->currency=="INR" ? 'INR' : 'USD' }} {{$userOrder->taxable??0}}</nobr></div>
                <div class="tax"><nobr>GST (18%) - {{ $userOrder->currency=="INR" ? 'INR' : 'USD' }} {{$userOrder->gst??0}}</nobr></div>
            </div>
            <div class="">
                <div class="hr_line"></div>
                <div class="total_wrap">
                    <div class=""><nobr>TOTAL - {{ $userOrder->currency=="INR" ? 'INR' : 'USD' }} {{$userOrder->plan_amount}}</nobr></div>
                </div>
                <div class="hr_line"></div>
            </div>
        </div>
        <div class="footer_wrap">
            <div class="footer_text">
                <div class="footer_text_wrap">
                    © @php echo date('Y'); @endphp Cinevesture. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</body>
</html>