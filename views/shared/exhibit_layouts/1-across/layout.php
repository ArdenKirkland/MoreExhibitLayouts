<?php
$showMetadata = isset($options['metadata-display'])
    ? ($options['metadata-display'])
    : '';
    
?>

<div class="gallery">
	<div style="text-align:left;"><?php echo $this->shortcodes($text); ?></div>
	<?php foreach ($attachments as $attachment): ?>
	<?php $item = $attachment->getItem(); 
        $collection = get_collection_for_item($item);
        
    ?>
    
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
                            
                            echo "<div class='exhibit-item-title'>".metadata($item, array('Dublin Core', 'Creator'), array('snippet'=>100))."</div>";
                            
                        }    
                        if (in_array("show-title", $showMetadata)) { 
                            
                            if ($URL = metadata($item, array('Item Type Metadata', 'URL'))) {
                                
                                if (in_array("show-date", $showMetadata)) {
                                    if (!empty(metadata($item, array("Dublin Core", "Date")))) {
                                
                                        echo "<div class='exhibit-item-title'><a href=".$URL.">".metadata($item, array("Dublin Core", "Title"), array('snippet'=>100))."</a>, ";
                                    }
                                    else {
                                        echo "<div class='exhibit-item-title'><a href=".$URL.">".metadata($item, array("Dublin Core", "Title"), array('snippet'=>100))."</a>";
                                    }
                                }
                                else {
                                    echo "<div class='exhibit-item-title'><a href=".$URL.">".metadata($item, array("Dublin Core", "Title"), 
                                    array('snippet'=>100))."</a>";
                                }
                            }

                            else {
                                if (in_array("show-date", $showMetadata)) {
                                    if (!empty(metadata($item, array("Dublin Core", "Date")))) {
                                        echo "<div class='exhibit-item-title'>".metadata($item, array("Dublin Core", "Title"), array('snippet'=>100)).", ";
                                    }
                                    else {
                                        echo "<div class='exhibit-item-title'>".metadata($item, array("Dublin Core", "Title"), array('snippet'=>100))."";
                                    }
                                }
                                else {
                                    echo "<div class='exhibit-item-title'>".metadata($item, array("Dublin Core", "Title"), 
                                array('snippet'=>100))."";
                                }
                            }
                        }                 
                        else {
                            echo "<div class='exhibit-item-title'>";
                        }
                        if (in_array("show-date", $showMetadata)) { 
                            echo "<span class='exhibit-item-description'>"
                            .metadata($item, array("Dublin Core", "Date"), array('snippet'=>100))."</span></div>";
                        }
                        else {
                            echo "</div>";
                        }
                        if (in_array("show-medium", $showMetadata)) { 
                                echo '<div class="exhibit-item-description">'.metadata($item, array("Dublin Core", "Medium"), array('snippet'=>150))."</div>";
                        }
                        if (in_array("show-type", $showMetadata)) { 
                                echo '<div class="exhibit-item-description">'.metadata($item, array("Dublin Core", "Type"), array('snippet'=>150))."</div>";
                        }
                        if (in_array("show-extent", $showMetadata)) { 
                            echo "<div class='exhibit-item-description'>"
                            .metadata($item, array("Dublin Core", "Extent"),array('snippet'=>150))."</div>"; 
                        }
                        if (in_array("show-holding", $showMetadata)) { 
                            if (in_array("show-credit", $showMetadata)) {
                                if (!empty(metadata($item, array("Item Type Metadata", "Credit Line")))) {
                                
                                    echo "<div class='exhibit-item-description'>".metadata($item, array("Item Type Metadata", "Holding Institution"),array('snippet'=>150))."; ";
                                    }
                                else {
                                    echo "<div class='exhibit-item-description'>".metadata($item, array("Item Type Metadata", "Holding Institution"),array('snippet'=>150))."";
                                }
                            }
                            else {
                                echo "<div class='exhibit-item-description'>".metadata($item, array("Item Type Metadata", "Holding Institution"),array('snippet'=>150))."";
                                    }
                        }                 
                        else {
                            echo "<div class='exhibit-item-description'>";
                        }
                        if (in_array("show-credit", $showMetadata)) { 
                            echo "<span class='exhibit-item-description'>"
                            .metadata($item, array("Item Type Metadata", "Credit Line"),array('snippet'=>150))."</span></div>"; 
                        }
                        else {
                            echo "</div>";
                        }
                        if (in_array("show-collection", $showMetadata)) {
                            if (!empty($collection)) {
                            $collectionID = metadata($collection, 'id');
                                if ($collectionID === 1) {
                                    $collnick = 'CPW';}
                                elseif ($collectionID === 2){
                                    $collnick = 'Dorsky';}
                                elseif ($collectionID === 3){
                                    $collnick = 'WSW';}
                                elseif ($collectionID === 4){
                                    $collnick = 'WAAM';}
                                elseif ($collectionID === 5){
                                    $collnick = 'WBG';}
                                else $collnick='other';
                            
                            if (in_array("show-provenance", $showMetadata)) {
                                if (!empty(metadata($item, array("Dublin Core", "Provenance")))) {
                                
                                    echo "<div class='exhibit-item-description'>".$collnick."; ";
                                    }
                                else {
                                    echo "<div class='exhibit-item-description'>".$collnick."";
                                }
                            }
                            else {
                                echo "<div class='exhibit-item-description'>".$collnick."";
                                    }
                            }
                            else {
                                echo "<div class='exhibit-item-description'>";
                                }
                        }                 
                        else {
                            echo "<div class='exhibit-item-description'>";
                        }
                        if (in_array("show-provenance", $showMetadata)) { 
                            echo "<span class='exhibit-item-description'>"
                            .metadata($item, array("Dublin Core", "Provenance"),array('snippet'=>150))."</span></div>"; 
                        }
                        else {
                            echo "</div>";
                        }
                        if (in_array("show-identifier", $showMetadata)) { 
                            echo "<div class='exhibit-item-description'>"
                            .metadata($item, array("Dublin Core", "Identifier"),array('snippet'=>150))."</div>"; 
                        }
                        unset($collection, $collectionID, $collnick);
                    }

                ; ?>
            </div>

            <?php endif; ?>
        	</div>
         </div>
        <?php endforeach; ?>   

</div>

