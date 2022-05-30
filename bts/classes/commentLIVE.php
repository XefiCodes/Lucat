
                <!-- <form class="formComm" action="#">
                    <input hidden text="text" class="pid" name="pid" value="<?php //echo $row["pid"] ?>">
                    <input class="commentperse" type="text" name="ct" placeholder="Write a comment..." autocomplete="off"/>
                    <button class="subCom"></button>
                </form> -->
<?php 
    session_start();

    if(isset($_SESSION['id'])){
        $timezone = date_default_timezone_set("Europe/London");
        $con = mysqli_connect("localhost", "root", "", "lucat");
    
        if(mysqli_connect_errno()) { //Error message if failed connection.
            echo "Connection failed. " . mysqli_connect_errno();
        }
        $userid = $_SESSION['id'];
        $idpost = mysqli_real_escape_string($con, $_POST['identify']);
        $output = "";
        $sql = "SELECT * FROM comments LEFT JOIN users ON users.id = comments.id
                WHERE (id = {$outgoing_id} AND id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="CUser">
                                    <div class="sep">
                                        <b><?php echo '.$roww['username'].'?></b>
                                        <?php
                                            $checkDelP = $roww["username"];
                                            if($checkDelP == $checkDel2){
                                        ?>
                                        <!-- This is trash function, if thy want it -->
                                        <!-- <form style="width: 25px" action="del.php" method="POST">
                                            <input hidden text="text" name="pidd" value="<?php //echo $row["pid"] ?>">
                                            <button type="submit" name="delP" value=""><i class="fa fa-trash-o"></i></button>
                                        </form> -->
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="Ccom"><?php echo .'.$roww['cmt'].'?></div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: signin.php");
    }

?>