<?php
?>
<html>
    <head>
        <title>Ajax Calculator</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            .but{
                width: 25px;
                height: 25px;
                font-weight: bold;
                text-align: center;
            }
            .cls{
                width: 25px;
                height: 25px;
                font-weight: bold;
                text-align: center;
                color: #FAEBD7;
                background-color:#FAEBD7;
            }
            .eql{
                width: 100%;
                height: 25px;
                font-weight: bold;
                text-align: center;
                color:#FAEBD7;
                background-color: #FAEBD7;
            }
            .display{
                background-color: #FAEBD7;
                border:1px #666 solid; 
                height: 50px; width: 150px; 
                text-align: right; 
                font-size: 20px;
            }
        </style>
        <script>
            $(document).ready(function(){
                //general
                $('input[type=button]').click(function(){
                    var num = $(this).val();
                    var old = $('#display').html();
                    //this will clear the screen
                    if( num === 'C' ){
                        $('#display').html('');
                        return;
                    }
                    if( num === '=' ){
                        $('#display').html(old);
                        return;
                    }
                    //var str = $('#display').val()+num;
                    $.ajax({
                            url:'ajax.php',
                            type: "POST",
                            data:{'action':'operation','num':num,'old':old},
                            success: function(msg){
                                $('#display').html(msg);
                            }
                        }).error(function(){
                            $('#display').html('Oops! An error occured');}
                           );
                });
                //equal button click
                $('#eql').click(function(){
                    var num = $('#display').html();
                    var old = $('#display').html();
                    $.ajax({
                            url:'ajax.php',
                            type: "POST",
                            data:{'action':'equal', 'num':num, 'old':old},
                            success: function(msg){
                                $('#display').html(msg);
                            }
                        }).error(function(){
                            $('#display').html('Oops! An error occured');}
                           );
                });
            });
        </script>
    </head>
    <body>
<!--        <button id="me">Click Me</button>-->
Simple Calculator Using AJAX/PHP
<form name = "form1">

  <input id = "calc" type ="text" name = "answer"> <br> <br>

  <input type = "button" value = "MC" onclick = "form1.answer.value += 'MC' ">
  <input type = "button" value = "MR" onclick = "form1.answer.value += 'MR' ">
  <input type = "button" value = "M+" onclick = "form1.answer.value += 'M+' ">
  <input type = "button" value = "M-" onclick = "form1.answer.value += 'M-'">
  <input type = "button" value = "MR" onclick = "form1.answer.value += 'MR'">
  <input type = "button" value = "M+" onclick = "form1.answer.value += 'M+'">

 
 
</form>
    </body>
</html>