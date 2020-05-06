<?php
$formStem = $block->getFormStem();
$options = $block->getOptions();
?>

<div class="block-text">
    <h4><?php echo __('Text - left column'); ?></h4>
    <?php echo $this->exhibitFormText($block); ?>
</div>

<div class="block-text">
    <h4><?php echo __('Text - right column'); ?></h4>
    <?php echo $this->exhibitFormText($block); ?>
</div>
