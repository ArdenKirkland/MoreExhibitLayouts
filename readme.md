Plugin for Omeka that adds custom exhibit layouts to Exhibit Builder 3.x. 
All layouts are somewhat responsive (galleries will be one item per row for smaller screens).

Adapted from NALLyouts plugin by Rachel Donahue (@sheepeeh on GitHub)

All layouts include an option of automatically including item metadata in the caption (look for checkboxes to select what will be included in automatic caption). 

To link to an item record/display in another system, such as CONTENTdm, use the URL element in Item Type Metadata to record the full URL. This element can be added to any item type. With the layouts listed below, the image and title will link to that URL. Beware - using the original Omeka exhibit layouts will NOT link to your URL, they will link to the item's record in Omeka. Also, if a URL is not provided, the image and title will NOT link to anything. 
	
**1-across**	A single file at full column width.

**2-across**	A layout for exactly 2 images across per block.

**3-across**	A gallery grid layout for exactly 3 images across per block.

**4-across**	A gallery grid layout for exactly 4 images across per block.

**5-across**	A gallery grid layout for exactly 5 images across per block.

**file-text-no-wrap**	A file to the left or right with a caption below and text on the opposite side, not wrapping under the file.

**file-text-external-link**	A file to the left or right with a caption below and text wrapping around.

**VR-text-no-wrap**	An embedded iframe to the left or right (for a VR file) with a caption below and text on the opposite side, not wrapping under the file.
