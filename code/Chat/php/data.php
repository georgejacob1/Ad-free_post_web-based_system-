<?php
while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['login_id']}
                OR outgoing_msg_id = {$row['login_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result = "No message available";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if (isset($row2['outgoing_msg_id'])) {
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    } else {
        $you = "";
    }
    // ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
    ($outgoing_id == $row['login_id']) ? $hid_me = "hide" : $hid_me = "";

    $output .= '<a href="chat.php?user_id=' . $row['login_id'] . '">
                    <div class="content">';
    $sql1 = mysqli_query($conn, "SELECT * FROM tbl_address WHERE login_id = {$row['login_id']}");
    if (mysqli_num_rows($sql1) > 0) {
        $row1 = mysqli_fetch_assoc($sql1);
    }

    if ($row1['profileimg'] == "NILL") {
        $output .= '<img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">';
    } else {
        $output .= '<img src="../user_profile/images/' . $row1['profileimg'] . '" alt="">';
    }
    $output .= '<div class="details">
                        <span>' . $row['user_fname'] . " " . $row['user_lname'] . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>
                     <div class="status-dot "><i class="fas fa-circle"></i></div>
                </a>';
}
