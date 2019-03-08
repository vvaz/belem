<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package BuzzKery
*/

?>
<div class="search-wrap">
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

 <input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search Stories', 'wpbox' ); ?>" />

 <input type="submit" class="search_submit fa fa-search" name="submit" id="searchsubmit" value="&#xf002;" />

 <i id="filtersubmit" class="fa fa-search social-icon"></i>
</form>

</div>