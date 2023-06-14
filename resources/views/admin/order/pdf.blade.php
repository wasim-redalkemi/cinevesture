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
            /* border:1px solid red; */
        }
        .sub_wrap{
            position: relative;
            padding: 10px;
            border:1px solid yellow;

        }
        .inner_wrap{
            border:1px solid green;
            padding:25px;
        }
    </style>
</head>
<body>
    <div class="main_wrap">
        <div class="sub_wrap"> 
            <div class="inner_wrap"> 
               <div class="trans_wrap">
                    <h2>Cinevesture</h2>
                    {{-- <h4>{{$data['transporterAdmin']->transporters->company_address??'-'}} </h4> --}}
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
    </div>
</body>
</html>