<?php

$direct_path =  get_bloginfo('wpurl')."/wp-content/plugins/wp-newsticker";

?>

<style>

.news_wrapper {
display: block;
width: 100%;
background-color: #<?php $wp_news_bg_color = get_option('wp_news_bg_color'); if(!empty($wp_news_bg_color)) {echo $wp_news_bg_color;} else {echo "EEE";}?>;
height: 30px;
border: 1px solid #<?php $wp_news_border_color = get_option('wp_news_border_color'); if(!empty($wp_news_border_color)) {echo $wp_news_border_color;} else {echo "CCC";}?>;
}

.news_wrapper p.label {
display: inline;
float: left;
background-color: #<?php $wp_news_label_bg_color = get_option('wp_news_label_bg_color'); if(!empty($wp_news_label_bg_color)) {echo $wp_news_label_bg_color;} else {echo "C33944";}?>;
color: #<?php $wp_news_label_color = get_option('wp_news_label_color'); if(!empty($wp_news_label_color)) {echo $wp_news_label_color;} else {echo "FFF";}?>;
height: 25px;
font-size: 11px;
font-weight: bold;
text-transform: uppercase;
padding-top: 5px;
padding-left: 7px;
padding-right: 7px;
}

#scroll-h {
height: 30px;
}

#scroll-h div {
padding-top: 3px;
margin-left: 10px;
}


</style>


        <?php
        
        wp_reset_query();

        global $post;
        
        $wp_news_slide_max = get_option('wp_news_slide_max');
        
        if(empty($wp_news_slide_max)) {
                
                $wp_news_slide_max = 10;
                
        }
        
        $wp_news_slide_sort = get_option('wp_news_slide_sort');
        
        if(empty($wp_news_slide_sort)) {
                
                $wp_news_slide_sort = "post_date";
                
        }
        
        $wp_news_slide_order = get_option('wp_news_slide_order');
        
        if(empty($wp_news_slide_order)) {
                
                $wp_news_slide_order = "DESC";
                
        }
        
        $wp_news_slide_categories = get_option('wp_news_slide_categories');
        
        if(empty($wp_news_slide_categories)) {
                
                $wp_news_slide_categories = 0;
                
        }
	
	$wp_news_label_name = get_option('wp_news_label_name');
        
        if(empty($wp_news_label_name)) {
                
                $wp_news_label_name = "Latest";
                
        }

	$args = array('suppress_filters' => 0, 'post_type' => array('post', 'page'), 'post_status' => 'publish', 'numberposts' => $wp_news_slide_max, 'orderby' => $wp_news_slide_sort, 'order' => $wp_news_slide_order, 'category' => $wp_news_slide_categories);
		
	$wp_news_myposts = get_posts($args);
        
        if($wp_news_myposts) {
                
                ?>
                <div class="news_wrapper">
                        <p class="label"><?php echo $wp_news_label_name;?></p>
                        <div id="scroll-h">
                                <div>
                
                <?php
                
                foreach( $wp_news_myposts as $post ) :	setup_postdata($post);
                
        ?>
        
                               
                                        <strong><?php the_time(get_option("date_format")) ?></strong> - <a href="<?php the_permalink(); ?>"><strong><?php the_title();?></strong></a> <?php echo wp_news_cut_content_feat(get_the_excerpt(), 35, "...");?> +++ 
                           
                
        
        <?php

                endforeach;
                
        ?>
                            
                                        <a href="http://www.iwebix.de" target="_blank" title="webdesign">webdesign</a>
                              
                                   </div>
                
                        </div>
                </div>
                        
                       
                
        
        <?php

        }
        
        wp_reset_query();
        
?>
