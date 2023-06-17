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
                Hello 
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, ex. Repellendus quae aspernatur tempora optio. Ipsam adipisci dolore ullam fugit pariatur. Iste, distinctio animi harum consequuntur eveniet nulla facere quia.
           </div>
           <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, soluta pariatur commodi necessitatibus ab maiores provident magni quasi quisquam recusandae! Nam officia quisquam dolorum quibusdam accusamus nihil deserunt maiores cupiditate!
           </div>
        </div>
        <div class="footer_wrap">
            <div class="footer_text">© 2023 Cinevesture. All rights reserved.</div>
        </div>
    </div>
</body>
</html>