<?php if($msg = flash('sucess')): ?>
    <div class="flash">
        <?=e($msg)?>
    </div>
<?php endif; ?>

<?php if($err = flash('error')): ?>
    <div class="error">
        <?=e($err)?>
    </div>
<?php endif; ?>