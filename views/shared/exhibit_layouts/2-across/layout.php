<?php
$showMetadata = isset($options['metadata-display'])
    ? ($options['metadata-display'])
    : '';
    
?>

<div class="gallery">
<div style="text-align:left;"><?php echo $this->shortcodes($text); ?></div>
<?php $counter = 0; ?>
  <?php foreach ($attachments as $attachment): ?>
        <?php $item = $attachment->getItem(); ?>
        <?php $file = $attachment->getFile(); ?>
      <?php if ($counter == 0): ?>
        <div id="2-across-row">
    <?php endif; ?>
            <?php $counter++; ?>
             <div class="exhibit-item exhibit-gallery-item">
             <?php $altText = "image for item in a row of 2, linking to full sized image."; ?>
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
                        if (in_array("show-extent", $showMetadata)) { 
                            echo "<div class='exhibit-item-description'>"
                            .metadata($item, array("Dublin Core", "Extent"),array('snippet'=>150))."</div>"; 
                        }
                        if (in_array("show-holding", $showMetadata)) { 
                            if (in_array("show-credit", $showMetadata)) {
                                if (!empty(metadata($item, array("Item Type Metadata", "Credit")))) {
                                
                                    echo "<div class='exhibit-item-description'>".metadata($item, array("Item Type Metadata", "Holding Institution"),array('snippet'=>150))."; ";
                                    }
                                else {
                                    echo "<div class='exhibit-item-description'>";
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
                            .metadata($item, array("Item Type Metadata", "Credit"),array('snippet'=>150))."</span></div>"; 
                        }
                        else {
                            echo "</div>";
                        }
                        if (in_array("show-identifier", $showMetadata)) { 
                            echo "<div class='exhibit-item-description'>"
                            .metadata($item, array("Dublin Core", "Identifier"),array('snippet'=>150))."</div>"; 
                        }
                    }


                ; ?>
            </div>

            <?php endif; ?>
            </div>
         
            <?php if ($counter % 2 == 0 && $attachment != end($attachments)): ?>
                </div>
                <span class="break-row"></span>
                <div id="2-across-row">
            <?php endif; ?>


        <?php endforeach; ?>
    </div>
</div>

