<?php
/**
 * Single view template.
 *
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */
?>

<?php
global $status;
$post = get_post( get_the_ID() );
$post_type = $post->post_type;
?>

<?php $this->load_parts( array( 'header' ) ); ?>

<?php
if($post_type == 'post'){
	get_template_part('single');
}elseif($post_type == 'column'){
	get_template_part('single-column');
}
?>

<?php	$this->load_parts( array( 'footer' ) ); ?>
