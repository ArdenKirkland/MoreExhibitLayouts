<?php
$formStem = $block->getFormStem();
$options = $block->getOptions();
?>
<div class="selected-items">
    <h4><?php echo __('Items'); ?></h4>
    <?php echo $this->exhibitFormAttachments($block); ?>
</div>

<div class="block-text">
    <h4><?php echo __('Text'); ?></h4>
    <?php echo $this->exhibitFormText($block); ?>
</div>

<div class="layout-options">
    <div class="block-header">
        <h4><?php echo __('Layout Options'); ?></h4>
        <div class="drawer"></div>
    </div>
    
    <div class="file-position">
        <?php echo $this->formLabel($formStem . '[options][file-position]', __('File position')); ?>
        <?php
        echo $this->formSelect($formStem . '[options][file-position]',
            @$options['file-position'], array(),
            array('left' => __('Left'), 'right' => __('Right')));
        ?>
    </div>
    
     <div class="image-width">
        <?php echo $this->formLabel($formStem . '[options][img-width]', __('Image Width')); ?>
        <?php
        echo $this->formSelect($formStem . '[options][img-width]',
            @$options['img-width'], array(),
            array(
                '50%' => __('50%'),
                '33%' => __('33%'),
                '25%' => __('25%')
                ));
                ?>
    </div>
    
    <div class="metadata-display">
        <?php echo $this->formLabel($formStem . '[options][metadata-display]', __('Display these elements:')). '<br />'; ?>
        <?php
        echo $this->formMultiCheckbox($formStem . '[options][metadata-display]',
            @$options['metadata-display'], array('listsep' => '&nbsp;'),
            array(
                "show-creator" => " Creator",
                "show-title" => " Title",
                "show-date" => " Date",
                "show-medium" => " Medium",
                "show-type" => " Type",
                "show-extent" => " Extent",
                "show-holding" => " Holding Institution",
                "show-credit" => " Credit Line",
                "show-collection" => " Collection",
                "show-provenance" => " Provenance",
                "show-identifier" => " Identifier",
                ));
                ?>
         
            <p class="instructions"><?php echo __('Check the boxes next to the elements you want to display in the caption area for elements in this block.'); ?></p>
    </div>

</div>
