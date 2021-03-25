$.ajax({
    type: "POST",
    url: '../gameCode/cancelInviteAFriend_code.php',
    data: {username: "<?php echo $_SESSION['username']; ?>",friendToCancleInvitation: friendToCancleInvitation},
   
});
