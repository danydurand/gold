<div class="col-md-6">
    <?= $_ITEM->__toHtml(); ?>
</div>
<?php
if ((($_CONTROL->CurrentItemIndex % 1) != 0) ||
    ($_CONTROL->CurrentItemIndex == count($_CONTROL->DataSource) - 1)) {
    _p('<br style="clear:both;"/>', false);
}
?>

