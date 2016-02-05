<div class="callout callout-danger">
    <h4>
        <?=$message?>
    </h4>
    <? if(isset($errors)) { ?>
        <ul>
            <? foreach ($errors as $error) { ?>
                <ul><?=$error[0]?></ul>
            <? } ?>
        </ul>
    <? } ?>
</div>
