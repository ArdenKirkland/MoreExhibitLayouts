<?php
class MoreExhibitLayoutsPlugin extends Omeka_Plugin_AbstractPlugin
{

    protected $_filters = array('exhibit_layouts');

    public function filterExhibitLayouts($layouts)
    {
        $layouts['full-thumbnail-gallery'] = array(
            'name' => 'Full Thumbnail Gallery',
            'description' => 'A gallery layout with full thumbnails instead of square.'
        );
        
        $layouts['full-width-file'] = array(
            'name' => 'Full Width File',
            'description' => 'A single file at full column width.'
        );
        
        $layouts['compare'] = array(
            'name' => 'Compare',
            'description' => '2 or more images side by side.'
        );
        
        $layouts['5-grid'] = array(
            'name' => '5 Grid',
            'description' => 'A collage type grid with a column of 2 portrait images on one side and a column of 3 landscape images on the other.'
        );
        
        $layouts['nal-titlebar'] = array(
            'name' => 'NAL Titlebar',
            'description' => 'A list layout with titlebars.'
        );
		
		$layouts['nal-imggal'] = array(
            'name' => 'NAL Image Galleries',
            'description' => 'For migrating old Drupal Galleries'
        );
    
        $layouts['nal-moviegal'] = array(
            'name' => 'NAL Movie Gallery',
            'description' => 'Display two moving images per row.'
        );

        $layouts['nal-sidebar'] = array(
            'name' => 'NAL Sidebar List',
            'description' => 'Display a list of items beneath the exhibit navigation.'
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