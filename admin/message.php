<?php
if(isset($_SESSION['message'])){
    ?>
        <div class="alert alert-primary" role="alert">
            <?= $_SESSION['message']; ?>
        </div>
    <?php
    unset($_SESSION['message']);    
}

?>