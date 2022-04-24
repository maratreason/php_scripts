<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#submit-id").on("click", function(e) {
                e.preventDefault();
                let nickname = $(".nickname").val();
                let content = $(".content").val();
                if ($.trim(nickname) === "") {
                    alert("Пожалуйста заполните поле автор");
                    return false;
                }
                if ($.trim(content) === "") {
                    alert("Пожалуйста заполните поле content");
                    return false;
                }
                $("#submit-id").prop("disabled", true);

                $.ajax({
                    url: "addcom.php",
                    method: 'post',
                    data: {
                        nickname: nickname,
                        content: content,
                    }
                }).done(function(data) {
                    console.log(data);
                    $("#info").html(data);
                    $("#submit-id").prop("disabled", false);
                });
            });
        });
    </script>
</head>
<body>
    <div id="info">
        <?php require("addcom.php"); ?>

        <form id="form" method="POST">
            <p>
                <span class="title">Author:</span>
                <span class="field">
                    <input type="text" name="nickname" class="nickname" />
                </span>
            </p>
            <p>
                <span class="title">Message:</span>
                <span class="field">
                    <textarea name="content" class="content" cols="30" rows="10"></textarea>
                </span>
            </p>
            <p>
                <input id="submit-id" type="submit" value="Отправить" />
            </p>
        </form>
    </div>

</body>
</html>