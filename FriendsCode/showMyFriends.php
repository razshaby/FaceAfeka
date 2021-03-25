$.ajax({
    type: "POST",
    url: '../FriendsCode/myFriends_code.php',
    data: {username: "<?php echo $_SESSION['username']; ?>"},
    success: function(data){
        $('#myFriends').fadeIn();
        $('#myFriends').html(data);
    }
});
