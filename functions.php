<?php
// this is needed for dynamic sidebar widget support
if ( function_exists('register_sidebar') )
    register_sidebar();
    
function yui_doc ()
{
	echo 'doc1';
}
   
function yui_secondary_column ()
{
	echo 'yui-t4';
}
?>