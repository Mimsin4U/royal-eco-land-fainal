<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplication Form</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
        }

        .container {
            width: 94%;
            margin: 0 auto;
        }

        .col-1 {
            width: 8.33%;
        }

        .col-2 {
            width: 16.66%;
        }

        .col-3 {
            width: 25%;
        }

        .col-4 {
            width: 33.33%;
        }

        .col-5 {
            width: 41.66%;
        }

        .col-6 {
            width: 50%;
        }

        .col-7 {
            width: 58.33%;
        }

        .col-8 {
            width: 66.66%;
        }

        .col-9 {
            width: 75%;
        }

        .col-10 {
            width: 83.33%;
        }

        .col-11 {
            width: 91.66%;
        }

        .col-12 {
            width: 100%;
        }

        [class*="col-"] {
            float: left;
            padding: 10px;
        }

        .row::after {
            content: "";
            clear: both;
            display: flex;
        }

        input {
            width: 100%;
            height: 25px;
            padding: 17px 10px;
            border: 0;
            background-color: rgba(98, 98, 98, 0.644);
        }

        .level {
            padding: 8px 0;
        }

        input[type="checkbox"] {
            padding: 0px;
            margin-top: -2px;
            height: 20px;
            width: 40px;
        }

    </style>
</head>

<body>
    <div class="row">
        <div class="col-4" style="padding: 0px;">
            <img src="{{asset('/form')}}/cover1.jpeg" alt="" height="200px" width="100%">
        </div>
        <div class="col-4">
            <img src="{{asset('/form')}}/royal_eco_land.png" alt="" height="130px" width="100%">
            <div style="text-align: center;">
                <h2>Application Form </h2>
            </div>
        </div>
        <div class="col-2">
            <div style="background-color: blanchedalmond; height: 200px; width: 100%;  padding: 50px;">
                <span>Affix Photo Of Applicant With Signature</span>
            </div>
        </div>
        <div class="col-2">
            <div style="background-color: blanchedalmond;  height: 200px; width: 100%; padding: 50px;">
                <span>Affix Photo Of Nomine With Signature</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <div class="row">
                <div class="col-2"><strong>Persional Details</strong></div>
                <div class="col-6"><strong>Applicant</strong></div>
                <div class="col-4"><strong>Nomine</strong></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>Individual's Full Name*</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>Father's Name* :</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>Mother's Name* :</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>Husband's Name :</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>Date Of Birth :</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>Phone Number :</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>Present Address :</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>Parmanent Address :</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>Nationality :</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>Ocupation :</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="level"><b>National ID :</b> </div>
                </div>
                <div class="col-6"><input type="text"></div>
                <div class="col-4"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="level">
                        <b>Indicate Your Choise of : </b>
                    </div>
                </div>
                <div class="col-2">
                    <div style="display: flex;margin: 5px 0;">
                        <span>Flat</span>
                        <input type="checkbox">
                    </div>
                </div>
                <div class="col-2" style="display: flex;margin: 5px 0;">
                    <span>Plot</span>
                    <input type="checkbox">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div style="display: flex;margin: 5px 0;">
                        <div class="level">
                            <b>Project: </b>
                        </div>
                        <input type="text">
                    </div>
                </div>
                <div class="col-4">
                    <div style="display: flex;margin: 5px 0;">
                        <div class="level">
                            <b>Type/Zone:</b>
                        </div>
                        <input type="text">
                    </div>
                </div>
                <div class="col-3">
                    <div style="display: flex;margin: 5px 0;">
                        <div class="level">
                            <b>Size/Decm:</b>
                        </div>
                        <input type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div style="display: flex;margin: 5px 0;">
                        <div class="level">
                            <b>Plot/Flat No: </b>
                        </div>
                        <input type="text">
                    </div>
                </div>
                <div class="col-3">
                    <div style="display: flex;margin: 5px 0;">
                        <div class="level">
                            <b>Road No:</b>
                        </div>
                        <input type="text">
                    </div>
                </div>
                <div class="col-2">
                    <div style="display: flex;margin: 5px 0;">
                        <div class="level">
                            <b>Faching:</b>
                        </div>
                        <input type="text">
                    </div>
                </div>
                <div class="col-2">
                    <div style="display: flex;margin: 5px 0;">
                        <div class="level">
                            <b>Flor:</b>
                        </div>
                        <input type="text">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="level">
                    <b>Car Parking: </b>
                </div>
            </div>
            <div class="col-2">
                <div style="display: flex;margin: 5px 0;">
                    <span>Yes</span>
                    <input type="checkbox">
                </div>
            </div>
            <div class="col-2" style="display: flex;margin: 5px 0;">
                <span>No</span>
                <input type="checkbox">
            </div>
            <div class="col-6" style="display: flex;margin: 5px 0;">
                <span>Parking Price: </span>
                <input type="text" style="margin: -6px 0 0 0;">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h4>Payment System</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="level">
                    <b>Mode Of Payment : </b>
                </div>
            </div>
            <div class="col-2">
                <div style="display: flex;margin: 5px 0;">
                    <span>Installment</span>
                    <input type="checkbox">
                </div>
            </div>
            <div class="col-2" style="display: flex;margin: 5px 0;">
                <span>Consolidate</span>
                <input type="checkbox">
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div style="display: flex;margin: 5px 0;">
                    <div class="level">
                        <b>Amount: </b>
                    </div>
                    <input type="text">
                </div>
            </div>
            <div class="col-6">
                <div style="display: flex;margin: 5px 0;">
                    <div class="level">
                        <b>Cash / Cheque / P.O. No:</b>
                    </div>
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div style="display: flex;margin: 5px 0;">
                    <div class="level">
                        <b>Date: </b>
                    </div>
                    <input type="text">
                </div>
            </div>
            <div class="col-4">
                <div style="display: flex;margin: 5px 0;">
                    <div class="level">
                        <b>Bank:</b>
                    </div>
                    <input type="text">
                </div>
            </div>
            <div class="col-4">
                <div style="display: flex;margin: 5px 0;">
                    <div class="level">
                        <b>Branch:</b>
                    </div>
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div style="display: flex;margin: 5px 0;">
                    <div class="level">
                        <b>Price/Unite: </b>
                    </div>
                    <input type="text">
                </div>
            </div>
            <div class="col-3">
                <div style="display: flex;margin: 5px 0;">
                    <div class="level">
                        <b>Rate/Sft./Dcm:</b>
                    </div>
                    <input type="text">
                </div>
            </div>
            <div class="col-6">
                <div style="display: flex;margin: 5px 0;">
                    <div class="level">
                        <b>Utility Cost:</b>
                    </div>
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <div style="display: flex;margin: 5px 0;">
                    <div class="level">
                        <b>Total Price:</b>
                    </div>
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p> I Agree ,Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate id qui, ipsa mollitia numquam doloremque rerum minus a error veniam veritatis voluptatem, consequuntur hic provident. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus totam necessitatibus laboriosam aspernatur dolore corporis fuga accusamus porro commodi voluptates!</p>
            </div>
        </div>
        <div class="row" style="margin-top: 8px;">
            <div class="col-3">
                <hr>
                <h5 style="margin: 10px 0;">Authorized Signature</h5>
                <span>Date:</span>
            </div>
            <div class="col-6">

            </div>
            <div class="col-3">
                <hr>
                <h5 style="margin: 10px 0;">Applicant Signature</h5>
                <span>Date:</span>
            </div>
        </div>
    </div>
    <script>
        window.onload = (event) => {
            window.print();
        };
    </script>
</body>

</html>
