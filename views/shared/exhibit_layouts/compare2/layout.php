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
        <div id="compare2-row">
    <?php endif; ?>
            <?php $counter++; ?>
             <div class="exhibit-item exhibit-gallery-item">
             <?php $altText = "image for item in a row of 2, linking to full sized image."; ?>
            <?php if  ($description = (metadata($item, array("Dublin Core", "Description")))): ?>
            <?php $altText =  $description; ?>
            <?php endif; ?> 
            <?php echo file_markup($file, array('imageSize'=>'fullsize', 'imgAttributes'=>array('alt' =>  "$altText", 'title' => metadata($item, array("Dublin Core", "Title"))))); ?>

           <?php if ($attachment['caption'] || !empty($showMetadata)): ?>
            <div class="exhibit-item-caption">
            <?php 
                    if ($attachment['caption']) {echo $attachment['caption']; }

                    if (!empty($showMetadata)) {

                        if (in_array("show-title", $showMetadata)) { 
                            echo "<div class='exhibit-item-title'><a href="
                            .exhibit_builder_exhibit_item_uri($item).">".metadata($item, array("Dublin Core", "Title"), 
                                array('snippet'=>100))."</a></div>"; 
                        }                   
                        if (in_array("show-date", $showMetadata)) { 
                            echo "<div class='exhibit-item-date'>"
                            .metadata($item, array("Dublin Core", "Date"), array('snippet'=>100))."</div>";
                        }
                        if (in_array("show-desc", $showMetadata)) { 
                            echo '<div class="exhibit-item-description">'
                            .metadata($item, array("Dublin Core", "Description"), array('snippet'=>150))."</div>";
                        }
                        if (in_array("show-script", $showMetadata)) { 
                            echo "<div class='exhibit-item-transcript'>"
                            .metadata($item, array("Item Type Metadata","Transcription"),array('snippet'=>150))."</div>"; 
                        }
                    }

                ; ?>
            </div>

            <?php endif; ?>
            </div>
         
            <?php if ($counter % 2 == 0 && $attachment != end($attachments)): ?>
                </div>
                <span class="break-row"></span>
                <div id="compare2-row">
            <?php endif; ?>


        <?php endforeach; ?>
    </div>
</div>

