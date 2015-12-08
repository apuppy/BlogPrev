<!DOCTYPE html>
<html>
<head>
    <title>生成二维码</title>
</head>
<body>
    <input id="qrsrc" type="text" placeholder="输入要转换为二维码的内容"/>
    <input id="sbmt" type="button" value="生成二维码" /><br/>
    <img id="img" src="https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=so.com&choe=UTF-8&chld=L" alt="">
    <script>
        //绑定事件
        document.querySelector("#sbmt").addEventListener("click",function(){
            var qrValue = document.querySelector("#qrsrc").value;
            document.getElementById("img").src = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&choe=UTF-8&chld=L&chl="+qrValue;
        })
    </script>
</body>
</html>