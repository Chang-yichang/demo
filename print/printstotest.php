<?php
$fixid=1000;
$sendman = '张三';
$address = '郑州市人民路';
$mobile = '13590000000';
$falert = "警告";
$citytag = '郑州';
$fdatenow=date("Y-m-d");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>申通物流打印单</title>
    <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
    <style type="text/css">
        body {font-size:12px; font-family:"微软雅黑",宋体,Verdana, Arial;background:#ffffff url(images/bg.jpg) repeat-x;}
        .titlecss { background: #D7EDF7; text-align: center; height: 40px; line-height: 40px; font-size: 16px; font-weight: bold; color: #900; margin: 0px; border-radius: 3px; }
        input,textarea,select,button{font-size:14px; box-sizing: border-box;height:30px; width:232px; border:1px #CCC solid; border-radius: 3px; padding-left: 15px;}
        .btnstyle{background:#2d97af;width:160px;}

        .ulprint {
            margin: 0 auto;
            width: 1060px;
            height: 625px;
            border: solid 0px red;
            background: url(images/printwuliudanstonew.jpg)
        }

        .ulprint ul {
            list-style-type: none;
            padding-left: 10px;
        }

        .ulprint li {
            list-style-type: none;
            padding-left: 0px;
            font-size: 17px;
        }

        .fontbig {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="titlecss" align="center">申通物流单打印（套打）</div>
<div id="printfix" class="ulprint">
    <div id="divleft" style="left:60px;top:110px;width:500px;border:0px solid red;position:relative;float:left;">
        <ul>
            <li class="fontbig" style="margin-left:70px;margin-bottom:20px;">
                赵四　　　　　　　　　　　
                <?php echo $fdatenow; ?></li>
            <li style="margin-left:60px;margin-bottom:18px;">河南省郑州市测试售后中心　　　　　　　　郑州</li>
            <li style="margin-left:80px;margin-bottom:12px;">河南　　　　　　郑州</li>
            <li style="margin-left:1px;margin-bottom:13px;">郑州市人民路和金水路交叉口紫金山大厦2楼</li>
            <li class="fontbig" style="height:40px;margin-bottom:25px;">　　　　　　　0371-10000000</li>
            <li style="margin-left:75px;margin-bottom:180px;">√　　　　电子产品<br/>(务必送货上门,务必先验货，再签收)</li>

            <li style="margin-left:20px;margin-bottom:10px;">赵四</li>
            <li style="margin-left:100px;">&nbsp;</li>
        </ul>
    </div>
    <div id="divcenter" style="left:100px;top:50px;width:420px;border:0px solid red;position:relative;float:left">
        <ul>
            <li style="margin-left:0px;margin-bottom:30px;font-size:18px;">&nbsp;
                <input type="text" class="no-print" id="text_sendoutlogisticsno"
                       style="width:200px;font-size:18px;border:1px solid #e1e1e1;"/>
            </li>
            <li class="fontbig" style="margin-left:60px;margin-bottom:80px;"><?php echo $sendman; ?>&nbsp;　　　　　　　　　
                <input type="text" name="fdestaddr" id="fdestaddr" value="" style="width:100px;border:none;"/>
            </li>
            <li style="margin-left:40px;margin-bottom:17px;"><?php echo $address; ?></li>
            <li class="fontbig" style="margin-left:100px;margin-bottom:40px;"><?php echo $mobile; ?></li>
            <li style="margin-left:0px;margin-bottom:70px;">
                <div id="stag"><b>√　　　　　　　０</b></div>
            </li>
            <li style="margin-left:200px;;margin-bottom:50px;font-size:26px;">
                <b>√</b>
            </li>
            <li style="text-align:right;;margin-bottom:50px;font-size:70px;font-bold:true;">
                <?php echo $citytag; ?>
            </li>
        </ul>
    </div>
</div>
<br/>
<div align="center">
    <button id="button_print" name="button_print" class="btnstyle">打印申通物流单</button>
</div>

<script src="print/js/jQuery.print.js"></script>
<!--for print-->
<!--[if lt IE 9]>
<script src="print/js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
<![endif]-->
<!--end for print-->
<script type='text/javascript'>
    //物流单打印
    $("#button_print").bind("click", function (event) {
        var strno = $("#text_sendoutlogisticsno").attr("value");
        if (strno == '') {
            alert("请填写物流单号码！");
            $("#text_sendoutlogisticsno").focus();
        }
        else {
            $.post("services.php", {opertype: '1', lno: strno, logis: "申通快递", fixid: "<?php echo $fixid;?>"},
                function (data) {
                    if (data == 'ok')
                        jQuery.print('#printfix');
                    else
                        alert('物流单号保存失败，请稍后重试！');
                });
        }
    });
</script>
</body>
</html>