<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package BuzzKery
*/

?>
<div class="search-wrap">
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

 <input type="search" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search Stories', 'wpbox' ); ?>" />

</form>

</div>