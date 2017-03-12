<?php
$formStem = $block->getFormStem();
$options = $block->getOptions();
?>
<style>
 .metadata-display > label {
    display:inline-block;
 }
 </style>
<div class="selected-items">
    <h4><?php echo __('Items'); ?></h4>
    <?php echo $this->exhibitFormAttachments($block); ?>
</div>

<div class="layout-options">
    <div class="block-header">
        <h4><?php echo __('Layout Options'); ?></h4>
        <div class="drawer"></div>
    </div>

    <div class="metadata-display">
        <?php echo $this->formLabel($formStem . '[options][metadata-display]', __('Display these elements:')). '<br />'; ?>
        <?php
        echo $this->formMultiCheckbox($formStem . '[options][metadata-display]',
            @$options['metadata-display'], array('listsep' => '&nbsp;'),
            array(
                "show-title" => " Title",
                "show-date" => " Date",
                "show-desc" => " Description",
                "show-script" => " Transcription"
                ));
                ?>
         
            <p class="instructions"><?php echo __('Check the boxes next to the elements you want to display in the caption area for elements in this block.'); ?></p>
    </div>

</div>
