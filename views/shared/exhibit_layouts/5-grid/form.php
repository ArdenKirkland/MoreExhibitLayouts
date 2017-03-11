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
    <h4><?php echo __('Choose 2 portrait images, followed by 3 landscape images'); ?></h4>
    <?php echo $this->exhibitFormAttachments($block); ?>
</div>

<div class="layout-options">
    <div class="block-header">
        <h4><?php echo __('Layout Options'); ?></h4>
        <div class="drawer"></div>
    </div>

    <div class="gallery-position">
        <?php echo $this->formLabel($formStem . '[options][gallery-position]', __('Gallery position')); ?>
        <?php
        echo $this->formSelect($formStem . '[options][gallery-position]',
            @$options['gallery-position'], array(),
            array(
                'left' => __('Left'),
                'right' => __('Right')
            )
        );
        ?>
        <p class="instructions"><?php echo __('The gallery will use the full width of the page. Choosing left will place the vertical images on the left, choosing right will place the vertical images on the right.'); ?></p>
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
                "show-extent" => " Extent",
                ));
                ?>
         
            <p class="instructions"><?php echo __('Check the boxes next to the elements you want to display in the caption area for elements in this block.'); ?></p>
    </div>

</div>
