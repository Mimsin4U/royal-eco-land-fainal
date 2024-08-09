<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body id="body">
    <button type="button" id="printBtn" onclick="printInvoice()" style="float: right">Print</button>
    <div class="invoice-box" >
        <table cellpadding="0" cellspacing="0" id="invoice">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{asset('royal_eco_land.png')}}" style="width: 100%; max-width: 230px" />
                            </td>

                            <td>
                                Invoice : #B{{$plotOrder->id}}<br />
                                Created : {{date('F j, Y', strtotime(now()))}}<br />
                                For : Booking Money
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Nirman Samad Trade Center, <br>
                                (3rd Floor) Flat-C3 63/1,<br> 
                                pioneer Road,Kakril, Dhaka-1000 <br>
                                royalecoland@gmail.com
                            </td>

                            <td>
                                {{$plotOrder->name}}<br />
                                {{$plotOrder->mobile}}<br />
                                {{$plotOrder->email}} <br>
                                Plot No : {{$plotOrder->plot_no}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Item</td>
                <td>Overview</td>
            </tr>

            <tr class="item">
                <td>Total Price</td>

                <td>{{$plotOrder->total_price}} /-</td>
            </tr>

            <tr class="item">
                <td>Booking Money Paid</td>

                <td>{{$plotOrder->booking_money}} /-</td>
            </tr>
            <tr class="item">
                <td>Downpayment Date</td>

                <td>{{date('F j, Y', strtotime($plotOrder->down_payment_date))}}</td>
            </tr>
        </table>
        <br>
        <br>
        <br>
    </div>
    <script>
        function printInvoice(){
            window.print();
        }
    </script>
</body>

</html>
