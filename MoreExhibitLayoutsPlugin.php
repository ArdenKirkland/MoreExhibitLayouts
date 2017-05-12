<?php
class MoreExhibitLayoutsPlugin extends Omeka_Plugin_AbstractPlugin
{

    protected $_filters = array('exhibit_layouts');

    public function filterExhibitLayouts($layouts)
    {
        
        $layouts['file-text-no-wrap'] = array(
            'name' => 'File Text No Wrap',
            'description' => 'A file to the left or right with a caption below and text on the opposite side.'
        );
        
        $layouts['1-across'] = array(
            'name' => '1 Across',
            'description' => 'A single file at full column width, centered.'
        );
        
        $layouts['2-across'] = array(
            'name' => '2 Across',
            'description' => '2 images side by side.'
        );
        
        $layouts['3-across'] = array(
            'name' => '3 Across',
            'description' => 'A gallery layout for exactly 3 images across per block.'
        );
        
        $layouts['4-across'] = array(
            'name' => '4 Across',
            'description' => 'A gallery layout for exactly 4 images across per block.'
        );
        
        $layouts['5-across'] = array(
            'name' => '5 Across',
            'description' => 'A gallery layout for exactly 5 images across per block.'
        );

        return $layouts;
    }

/* comment out these functions to see if they are really necessary
    public static function nal_exhibit_builder_render_exhibit_page ($exhibitPage = null)
{
    if ($exhibitPage === null) {
        $exhibitPage = get_current_record('exhibit_page');
    }
    
    $blocks = $exhibitPage->ExhibitPageBlocks;
    $rawAttachments = $exhibitPage->getAllAttachments();
    $attachments = array();
    foreach ($rawAttachments as $attachment) {
        $attachments[$attachment->block_id][] = $attachment;
    }
    foreach ($blocks as $index => $block) {
        $layout = $block->getLayout();
        if ($layout->id != "nal-sidebar") {
        echo '<div class="exhibit-block layout-' . html_escape($layout->id) . '">';
        echo get_view()->partial($layout->getViewPartial(), array(
            'index' => $index,
            'options' => $block->getOptions(),
            'text' => $block->text,
            'attachments' => array_key_exists($block->id, $attachments) ? $attachments[$block->id] : array()
        ));
        echo '</div>'; }
    }
}

    public static function nal_exhibit_builder_render_exhibit_sidebar ($exhibitPage = null)
{
    if ($exhibitPage === null) {
        $exhibitPage = get_current_record('exhibit_page');
    }
    
    $blocks = $exhibitPage->ExhibitPageBlocks;
    $rawAttachments = $exhibitPage->getAllAttachments();
    $attachments = array();
    foreach ($rawAttachments as $attachment) {
        $attachments[$attachment->block_id][] = $attachment;
    }
    foreach ($blocks as $index => $block) {
        $layout = $block->getLayout();
        if ($layout->id == "nal-sidebar"){
                
                echo get_view()->partial($layout->getViewPartial(), array(
                    'index' => $index,
                    'options' => $block->getOptions(),
                    'text' => $block->text,
                    'attachments' => array_key_exists($block->id, $attachments) ? $attachments[$block->id] : array()
                ));
        }
    }
}
*/


}