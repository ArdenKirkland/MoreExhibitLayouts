<?php
$position = isset($options['file-position'])
    ? html_escape($options['file-position'])
    : 'left';
$size = isset($options['file-size'])
    ? html_escape($options['file-size'])
    : 'thumbnail';
$width = isset($options['img-width'])
    ? html_escape($options['img-width'])
    : '';
$showMetadata = isset($options['metadata-display'])
    ? ($options['metadata-display'])
    : '';
?>
<div class="exhibit-item-col <?php echo $position; ?>" style=<?php echo '"width:' . $width . '"' ;?>>
	<div class="exhibit-items">
		<?php foreach ($attachments as $attachment): ?>
			<?php $item = $attachment->getItem(); ?>
        	<?php $file = $attachment->getFile(); ?>
			<?php $altText = "Thumbnail for item, linking to full sized image."; ?>
            <?php if  ($description = (metadata($item, array("Dublin Core", "Description")))): ?>
            <?php $altText =  $description; ?>
            <?php endif; ?> 
        
        <div class="item-file">
            <?php echo "<a href=".metadata($item, array("Item Type Metadata", "URL")).">".file_image("$size", array('alt' => "$altText", 'title' => metadata($item, array("Dublin Core", "Title"))), $file)."</a>"; ?>
        </div>

		<?php endforeach; ?>
	</div>
	<div class="exhibit-item-caption">
            <?php 
                    if ($attachment['caption']) {echo $attachment['caption']; }

                    if (!empty($showMetadata)) {

                        if (in_array("show-creator", $showMetadata)) { 
                            echo "<div class='exhibit-item-title'>"
                            .metadata($item, array("Dublin Core", "Creator"), array('snippet'=>100))."</div>"; 
                        }    
                        if (in_array("show-title", $showMetadata)) { 
                            echo "<div class='exhibit-item-title'><a href="
                            .metadata($item, array("Item Type Metadata", "URL")).">".metadata($item, array("Dublin Core", "Title"), 
                                array('snippet'=>100))."</a></div>"; 
                        }                   
                        if (in_array("show-date", $showMetadata)) { 
                            echo "<div class='exhibit-item-description'>"
                            .metadata($item, array("Dublin Core", "Date"), array('snippet'=>100))."</div>";
                        }
                        if (in_array("show-medium", $showMetadata)) { 
                            echo '<div class="exhibit-item-description">'
                            .metadata($item, array("Dublin Core", "Medium"), array('snippet'=>150))."</div>";
                        }
                        if (in_array("show-extent", $showMetadata)) { 
                            echo "<div class='exhibit-item-description'>"
                            .metadata($item, array("Dublin Core", "Extent"),array('snippet'=>150))."</div>"; 
                        }
                        if (in_array("show-holding", $showMetadata)) { 
                            echo "<div class='exhibit-item-description'>"
                            .metadata($item, array("Item Type Metadata", "Holding Institution"),array('snippet'=>150))."</div>"; 
                        }
                    }

                ; ?>
            </div>
	</div>
<div class="no-wrap-text">
<?php echo $text; ?>
</div>