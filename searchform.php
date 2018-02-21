<?php 
/**
 *  Template for calling the search form
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
	<label>
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" placeholder="Search …" value="" name="s"><i class="fa fa-search"></i>
	</label>
</form>