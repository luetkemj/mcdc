<?php 
/* =============================================================================
   MCE FILTERS 
   ========================================================================== */

/**
http://wp.tutsplus.com/tutorials/theme-development/adding-custom-styles-in-wordpress-tinymce-editor/
*
inline      
Name of the inline element to produce for example “span”. The current text selection will be wrapped in this inline element.
*
block       
Name of the block element to produce for example “h1″. Existing block elements within the selection gets replaced with the new block element.
*
selector    
CSS 3 selector pattern to find elements within the selection by. This can be used to apply classes to specific elements or complex things like odd rows in a table.
*
classes     
Space separated list of classes to apply the the selected elements or the new inline/block element.
*
styles      
Name/value object with CSS style items to apply such as color etc.
*
attributes  
Name/value object with attributes to apply to the selected elements or the new inline/block element.
*
exact       
Disables the merge similar styles feature when used. This is needed for some CSS inheritance issues such as text-decoration for underline/strikethough.
*
wrapper  Boolean  
'wrapper' => true   
State that tells that the current format is a container format for block elements. For example a div wrapper or blockquote.
*/


add_editor_style('style-editor.css');

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
        array(  
            'title' => 'Callout',  
            'block' => 'div',  
            'classes' => 'mce-callout',  
            'wrapper' => true  
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}