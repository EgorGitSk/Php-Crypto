<?php
include "classes/db.classes.php";
include "classes/user.classes.php";
$user = new User();
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_GET['reply_comment'])){
    $comment_id = $_GET['comment_id'];
    $comment_data = $user->Get_Comment($comment_id);
    $comment = $comment_data[0];
    // Do something with the comments
    foreach($comment as $row) {
        $date = $row['date'];
        $comment = $row['comment'];
        $name = $row['name'];
        $surname = $row['surname'];
    }
}else{
    header("Location: ../index.php");
}
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        body {
            background-color: black;

        }

        .bdge {
            height: 21px;
            background-color: orange;
            color: #fff;
            font-size: 11px;
            padding: 8px;
            border-radius: 4px;
            line-height: 3px;
        }

        .comments {
            text-decoration: underline;
            text-underline-position: under;
            cursor: pointer;
        }

        .dot {
            height: 7px;
            width: 7px;
            margin-top: 3px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }

        .hit-voting:hover {
            color: blue;
        }

        .hit-voting {
            cursor: pointer;
        }
    </style>
</head>
<body>
<h3><a href="courses.php" style=" display: inline-block;position: sticky;left: 20px ;margin-top: 20px; color: white;">Go back</a></h3>
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-8">
            <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                <div class="d-flex flex-column ml-3">
                    <div class="d-flex flex-row post-title">
                        <?php
                            echo '<h5>'.$comment.'</h5><span class="ml-2">('.$name . " ". $surname.')</span></div>';
                            echo '<div class="d-flex flex-row align-items-center align-content-center post-title"><span>'.$date.'</span></div>'
                        ?>


                </div>
            </div>
            <div class="coment-bottom bg-white p-2 px-4">
                <form action="includes/comments.inc.php" id="align-form" class="form-comments" method="post">
                    <input type="hidden" name="add_reply">
                    <?php
                    echo '<input type="hidden" name="comment_id" value = "'.$comment_id.'">';
                    echo '<input type="hidden" name="user_id" value = "'.$_SESSION['id'].'">';
                    ?>
                    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                        <input type="text" name="reply" class="form-control mr-3" placeholder="Add comment">
                        <input type="submit" class="btn btn-primary" type="button" value="Comment"></div>
                </form>

                <?php
                $replies = $user->Get_Replies($comment_id);
                $reply = $replies[0];
                $sql = $replies[1];
                for($i = 0; $i < $sql->rowCount(); $i++){
                    echo '<div class="commented-section mt-2">
                        <div class="d-flex flex-row align-items-center commented-user">';
                    echo '<h5 class="mr-2">' . $reply[$i]["name"] ." ". $reply[$i]["surname"] . '</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">'.$reply[$i]["date"].'</span></div>';
                    echo '<div class="comment-text-sm"><span>'.$reply[$i]["reply"].'</span></div>';
                    if($_SESSION['id'] == $reply[$i]["user_id"] || $_SESSION['admin'] == 1){
                        echo '<form action="includes/comments.inc.php" method="post" style="display: inline;">';
                        echo '<input type="hidden" name="delete_reply">';
                        echo '<input type="hidden" name="reply_id" value = "'.$reply[$i]["reply_id"].'">';
                        echo '<input type="hidden" name="comment_id" value = "'.$reply[$i]["comment_id"].'">';
                        echo '<input type="submit"  value="Delete Reply" class="btn" style="background-color: white; display: inline; margin-right: 20px;">';
                        echo '</form>';
                    }
                        echo '<form action="includes/comments.inc.php" method="post" style="display: inline;>';
                        echo '<input type="hidden" name="report_reply">';
                        echo '<input type="hidden" name="reply_id" value = "'.$reply[$i]["reply_id"].'">';
                        echo '<input type="hidden" name="comment_id" value = "'.$reply[$i]["comment_id"].'">';
                        echo '<input type="submit"  value="Report Comment" class="btn" style="background-color: white; display: inline; margin-right: 20px;">';
                        echo '</form>';

               echo '</div>  ';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>