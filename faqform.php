<?php
session_start();
$username=$_SESSION["username"];
$password=$_SESSION["password"];
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <title>FAQ</title>
        <style>
            
            h1{
                font-size:300%;
                text-align: center;
                font-family:verdana;
            }
            div{
                text:white;
                background-color:#f2f2f2;
                padding: 20px;
                border-radius:5px;
                width: 1000px;
            }
            input[type=text]{
                width: 500px;
                padding:10px;
                display: inline-block;
                box-sizing:border-box;
            }
            input[type=submit]{
                background-color:#45a049;
            }
            #ajax-data{
            text-align: left;
            font-size: 20px;
            }

        </style>
    </head>
    <body>
        <h1>FAQ</h1>
        <center><div>
        <form method="POST" id="formData"  onsubmit="return validateForm()">
                <table>                       
                    <tr>
                        <td><label for="question">Question</label></td>
                        <td><input type="text" name="question" id="question" required>
                        <span id="questionError" style="color:red;"></span></td>
                    </tr>
                    <tr>
                        <td><label for="answer">Answer</label></td>
                        <td><input type="text"  name="answer" id="answer" placeholder="Enter answer" required>
                        <span id="answerError" style="color:red;"></span></td>
                    </tr>

                    <tr>
                        <td> <input type="button" id="submit" value="Submit"></td>
                    </tr>
                </table>
               
            </form>
        <div id="ajax-data">

        </div>
     </div></center>
       
    </body>
    </html>
    
    <script>
 $('#submit').on('click',function(){
            $.ajax({
                type : 'post',
                url : "submitfaq.php",
                data : $('#formData').serialize(),
                success : function(response){
                    $("#ajax-data").html(response);
                },
                error:function(){
                    alert("error");
                }
            });
        });
        // function validateForm() {
        // var question=  $("#question").val();
        // var questionError = document.getElementById("questionError");
        // var answer=  $("#answer").val();
        // var answerError = document.getElementById("answerError");
        // var check = 0;

        // if (question == null || question == "" ) {
        //     check = 1;
        //     questionError.innerHTML = "This is a required field";
        //         return false;
        // } 
        // if ( answer == null || answer == "" ) {
        //     check = 1;
        //     answerError.innerHTML = "This is a required field";
        //     return false;
        // }  
        // // if (check == 0 ) {
           
        // // }
        // }
    </script>