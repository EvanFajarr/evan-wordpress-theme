<?php
get_header();
?>
  <?php if (have_posts()) :
  ?>
   <h5><?php
if (is_category()){
    echo'Category :  ';
    single_cat_title();
 
}elseif (is_tag()) {
    single_tag_title();
}elseif (is_author()){
    the_post();
    echo 'Author :' . get_the_author();
    rewind_posts();
}elseif (is_day()){
    echo 'Daily Archive:' . get_the_date();
}elseif (is_month()){
    echo 'Monthly Archive:' . get_the_date('F Y');
}elseif (is_year()){
    echo 'Yearly Archive:' . get_the_date('Y');
}else {
    echo 'Archives:';
}

?>
</h5>
<link rel="stylesheet" href="style.css">
<?php 
  while(have_posts()) : the_post();?>
  <div class="all">
  <h1><a href="<?php the_permalink();?>"><?php the_title();?></a><h1>
  <p class="post-info"><?php the_time('F jS,Y g:i a');?> | by <a href ="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"> <?php the_author();?> </a>
  | Category
            <?php 
            $categories = get_the_category();
            $separator = ", ";
            $output = '';
            if ($categories){
                foreach($categories as $category) {
                    $output .= '<a href="'. get_category_link($category->term_id) .'"> '. $category->cat_name  .' </a>'. $separator;
                }
                echo trim ($output, $separator);
            }
            ?>
            
            </p>
    <div class="post">
    <?php the_content();?>
  </div>
          </div>
    <?php endwhile;
    else :
      echo'<p>tidak ada postingan disini</p>';
    endif;
    ?>
    </div>
    
<?php
get_footer();
?>
  

