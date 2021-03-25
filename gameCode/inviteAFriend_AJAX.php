
$.ajax({
    type: "POST",
    url: '../gameCode/inviteAFriend_code.php',
    data: {username: "<?php echo $_SESSION['username']; ?>",friendToInvite: friendToInvite},
   
});
