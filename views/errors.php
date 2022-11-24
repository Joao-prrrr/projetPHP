<div class="errors-container">
<?php
    global $errors;
    foreach ($errors as $key => $err) {?>
    <div class="errors">
        <p> <?= $err ?> </p>
    </div>
   <?php }?>
</div>