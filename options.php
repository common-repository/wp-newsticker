<?php
$location = $wp_news_options_page; // Form Action URI
?>

<div class="wrap">
	<h2>WP Newsticker Configurations</h2>
	<p>Adjust settings for WP-Newsticker. By Default, Newsticker shows 10 latest posts/pages</p>
	
    <form method="post" action="options.php"><?php wp_nonce_field('update-options'); ?>
		        <div class="inside">
		<div class="inside">
			<table class="form-table">
				<tr>
					<th><label for="wp_news_bg_color">Wrapper background color</label></th>
					<td><input type="text" name="wp_news_bg_color" value="<?php $wp_news_bg_color = get_option('wp_news_bg_color'); if(!empty($wp_news_bg_color)) {echo $wp_news_bg_color;} else {echo "EEE";}?>"></td>
				</tr>
				<tr>
					<th><label for="wp_news_border_color">Wrapper border color</label></th>
					<td><input type="text" name="wp_news_border_color" value="<?php $wp_news_border_color = get_option('wp_news_border_color'); if(!empty($wp_news_border_color)) {echo $wp_news_border_color;} else {echo "CCC";}?>"></td>
				</tr>
				<tr>
					<th><label for="wp_news_label_bg_color">Label background color</label></th>
					<td><input type="text" name="wp_news_label_bg_color" value="<?php $wp_news_label_bg_color = get_option('wp_news_label_bg_color'); if(!empty($wp_news_label_bg_color)) {echo $wp_news_label_bg_color;} else {echo "C33944";}?>"></td>
				</tr>
				<tr>
					<th><label for="wp_news_label_color">Label color</label></th>
					<td><input type="text" name="wp_news_label_color" value="<?php $wp_news_label_color = get_option('wp_news_label_color'); if(!empty($wp_news_label_color)) {echo $wp_news_label_color;} else {echo "FFF";}?>"></td>
				</tr>
				<tr>
					<th><label for="wp_news_slide_max">Number of posts/pages</label></th>
					<td><input type="text" name="wp_news_slide_max" value="<?php $wp_news_slide_max = get_option('wp_news_slide_max'); if(!empty($wp_news_slide_max)) {echo $wp_news_slide_max;} else {echo "10";}?>"></td>
				</tr>
				<tr>
					<th><label for="wp_news_slide_speed">Ticker Speed (the higher the slower)</label></th>
					<td><input type="text" name="wp_news_slide_speed" value="<?php $wp_news_slide_speed = get_option('wp_news_slide_speed'); if(!empty($wp_news_slide_speed)) {echo $wp_news_slide_speed;} else {echo "40";}?>"></td>
				</tr>
				<tr>
					<th><label for="wp_news_label_name">Label Title</label></th>
					<td><input type="text" name="wp_news_label_name" value="<?php $wp_news_label_name = get_option('wp_news_label_name'); if(!empty($wp_news_label_name)) {echo $wp_news_label_name;} else {echo "Latest";}?>"></td>
				</tr>
				<tr>
					<th><label for="wp_news_slide_sort">Order by</label></th>
					<td>
						<select name="wp_news_slide_sort">
							<option value="post_date" <?php if(get_option('wp_news_slide_sort') == "post_date") {echo "selected=selected";} ?>>Date</option>
							<option value="title" <?php if(get_option('wp_news_slide_sort') == "title") {echo "selected=selected";} ?>>Title</option>
							<option value="rand" <?php if(get_option('wp_news_slide_sort') == "rand") {echo "selected=selected";} ?>>Random</option>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="wp_news_slide_order">Order</label></th>
					<td>
						<select name="wp_news_slide_order">
							<option value="DESC" <?php if(get_option('wp_news_slide_order') == "DESC") {echo "selected=selected";} ?>>Descending</option>
							<option value="ASC" <?php if(get_option('wp_news_slide_order') == "ASC") {echo "selected=selected";} ?>>Ascending</option>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="wp_news_slide_categories">Specific categories (seperate by comma)</label></th>
					<td><input type="text" name="wp_news_slide_categories" value="<?php $wp_news_slide_categories = get_option('wp_news_slide_categories'); if(!empty($wp_news_slide_categories)) {echo $wp_news_slide_categories;} else {echo "0";}?>"></td>
				</tr>
		</table>
	</div>
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="wp_news_bg_color, wp_news_border_color, wp_news_slide_speed, wp_news_label_name, wp_news_label_bg_color, wp_news_label_color, wp_news_slide_max, wp_news_slide_sort, wp_news_slide_order, wp_news_slide_categories" />
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options') ?>" /></p>
	</form>      
</div>