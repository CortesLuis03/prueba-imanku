<?php

session_start();

?>
<div class="home-container">
    <h1>Welcome <?php echo $_SESSION['user_name']; ?>!</h1>
</div>