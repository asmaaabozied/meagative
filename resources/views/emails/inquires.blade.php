<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Email Title</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            font-size: 100%;
            line-height: 1.6;
        }

        img {
            max-width: 100%;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            height: 100%;
        }

        a {
            color: #348eda;
        }

        .btn-primary {
            text-decoration: none;
            color: #FFF;
            background-color: #348eda;
            border: solid #348eda;
            border-width: 10px 20px;
            line-height: 2;
            font-weight: bold;
            margin-right: 10px;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            border-radius: 25px;
        }

        .btn-secondary {
            text-decoration: none;
            color: #FFF;
            background-color: #aaa;
            border: solid #aaa;
            border-width: 10px 20px;
            line-height: 2;
            font-weight: bold;
            margin-right: 10px;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            border-radius: 25px;
        }

        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .padding {
            padding: 10px 0;
        }

        table.body-wrap {
            width: 100%;
            padding: 20px;
        }

        table.body-wrap .container {
            border: 1px solid #f0f0f0;
        }

        table.footer-wrap {
            width: 100%;
            clear: both !important;
        }

        .footer-wrap .container p {
            font-size: 12px;
            color: #666;

        }

        table.footer-wrap a {
            color: #999;
        }

        h1, h2, h3 {
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            line-height: 1.1;
            margin-bottom: 15px;
            color: #000;
            margin: 40px 0 10px;
            line-height: 1.2;
            font-weight: 200;
        }

        h1 {
            font-size: 36px;
        }

        h2 {
            font-size: 28px;
        }

        h3 {
            font-size: 22px;
        }

        p, ul, ol {
            margin-bottom: 10px;
            font-weight: normal;
            font-size: 14px;
        }

        ul li, ol li {
            margin-left: 5px;
            list-style-position: inside;
        }

        .container {
            display: block !important;
            max-width: 600px !important;
            margin: 0 auto !important; /* makes it centered */
            clear: both !important;
        }

        .body-wrap .container {
            padding: 20px;
        }

        .content {
            max-width: 600px;
            margin: 0 auto;
            display: block;
        }

        .content table {
            width: 100%;
        }
    </style>
</head>

<body bgcolor="#f6f6f6">
<!-- Main Body -->
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">
            <div class="content">
                <table>
                    <tr>
                        <td align="center">

                        </td>
                    </tr>
                    <!-- Email content goes here .. -->
                    <br>
                    <p>
                    <br>

                    @if($data->status==2)
                        <div class="alert-danger">

                            ! {{$data->customer->name ?? ''}}
                            مرحبًا
                            <br>
                            تم قبول طلب الاستفسار بنجاح
                            ، لو ف اي استفسار فيرجى الاتصال بفريق دعم


                        </div>
                        <p><a href="http://dev.wwwnl1-sr9.supercp.com/en"> Mega Vents </a></p>
                    @elseif($data->status==1)
                        <div class="alert-danger">

                            ! {{$data->customer->name ?? ''}}
                            مرحبًا
                            <br>
                            تم رفض طلب الاستفسار
                            ، لو ف اي استفسار فيرجى الاتصال بفريق دعم


                        </div>
                        <p><a href="http://dev.wwwnl1-sr9.supercp.com/en"> Mega Vents </a></p>
                    @elseif($data->status==3)

                        <div class="alert-danger">

                            ! {{$data->customer->name ?? ''}}
                            مرحبًا
                            <br>
                            تم انتهاء مده طلب الاستفسار
                            ، لو ف اي استفسار فيرجى الاتصال بفريق دعم


                        </div>
                        <p><a href="http://dev.wwwnl1-sr9.supercp.com/en"> Mega Vents </a></p>

                    @endif
                </table>
            </div>
        </td>
        <td></td>
    </tr>
</table>
<!-- /Main Body -->
<!-- Footer -->
<table class="footer-wrap">
    <tr>
        <td></td>
        <td class="container">
            <div class="content">
                <table>
                    <tr>
                        <td align="center">

                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td></td>
    </tr>
</table>
<!-- /Footer -->
</body>
</html>



