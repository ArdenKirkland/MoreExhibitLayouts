<?php
$showMetadata = isset($options['metadata-display'])
    ? ($options['metadata-display'])
    : '';
    
?>

<div class="gallery">
	<div style="text-align:left;"><?php echo $this->shortcodes($text); ?></div>
	<?php foreach ($attachments as $attachment): ?>
	<?php $item = $attachment->getItem(); ?>
	<?php $file = $attachment->getFile(); ?>
		<div id="1-across-row">
		<div class="exhibit-item exhibit-gallery-item">
        	<?php $altText = "Image for item"; ?>
        	<?php if  ($description = (metadata($item, array("Dublin Core", "Description")))): ?>
        		<?php $altText =  $description; ?>
        	<?php endif; ?> 
        <div class="item-file">
    
            <?php if ($URL = metadata($item, array('Item Type Metadata', 'URL'))): ?>
            
                <?php echo "<a href=".metadata($item, array("Item Type Metadata", "URL")).">".file_image('fullsize', array('class' => 'full', 'alt' => "$altText", 'title' => metadata($item, array("Dublin Core", "Title"))), $file)."</a>"; ?>
            
            <?php else : ?>
    
                <?php echo file_image('fullsize', array('class' => 'full', 'alt' => "$altText", 'title' => metadata($item, array("Dublin Core", "Title"))), $file) ; ?>
            
             <?php endif; ?>
        </div>

           	<?php if ($attachment['caption'] || !empty($showMetadata)): ?>
            	<div class="exhibit-item-caption">
            <?php 
                    if ($attachment['caption']) {echo $attachment['caption']; }

                    if (!empty($showMetadata)) {

                        if (in_array("show-creator", $showMetadata)) { 
                            echo "<div class='exhibit-item-title'>"
                            .metadata($item, array("Dublin Core", "Creator"), array('snippet'=>100))."</div>"; 
                        }    
                        if (in_array("show-title", $showMetadata)) { 
                            
                            if ($URL = metadata($item, array('Item Type Metadata', 'URL'))) {
            
                            echo "<div class='exhibit-item-title'><a href="
                            .metadata($item, array("Item Type Metadata", "URL")).">".metadata($item, array("Dublin Core", "Title"), 
                                array('snippet'=>100))."</a></div>";
                            }

                            else {
                                
                            echo "<div class='exhibit-item-title'>".metadata($item, array("Dublin Core", "Title"), 
                                array('snippet'=>100))."</a></div>";
                            }

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

            <?php endif; ?>
        	</div>
         </div>
        <?php endforeach; ?>   

</div>

