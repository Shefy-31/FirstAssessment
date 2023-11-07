<?php
session_start(); 
?>
<html>
<head>
    <title>FAQ Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        h1{
            font-size:300%;
            text-align: center;
            font-family:verdana;
        }
        div{
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
</style>
</head>
<body>
    <h1>FAQ</h1>
    <center><div>
        <form method="post" id="formData">
        <table>
            <tr>
                <td><input type="text" name="question" id="question" placeholder="Enter your question" >
                <span id="questionError" style="color: red;"></span></td>
            </tr>
            <tr>
                <td><input type="text" name="answer" id="answer" placeholder="Enter your answer">
                <span id="answerError" style="color: red;"></span></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" name="submit" id="submit"></td>
            </tr>
        </table>
        </form>
    </div></center>
    <script>
        $(document).ready(function () {
            $('#formData').submit(function (e) {
                e.preventDefault();

                var question = $('#question').val().trim();
                var answer = $('#answer').val().trim();
                var questionError = document.getElementById("questionError");
                var answerError = document.getElementById("answerError");
                if ( question === "" ) {
                    questionError.innerHTML = "This is a required field";
                } else if ( answer === "" ) {
                    answerError.innerHTML = "This is a required field";
                } else {
                    $.ajax({
                        type: 'post',
                        url: 'faqForm.php',
                        data: $('#formData').serialize(),
                        success: function(response) {
                            alert(response);
                            $('#formData :input:not(:submit)').val('');
                        },
                        error: function() {
                            alert('Error occurred during form submission.');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
