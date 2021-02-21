
<?php
/********************************************************

	sNews 1.6
	Release date: May 16, 2007
	Developers version: 1.6.0 Stable
	Copyright (C) Solucija.com
	sNews is licensed under a Creative Commons License

  PATCHES & FIXES - applied to this file - Oct.08.07:
  ---------------
  All patches and fixes posted as of this date, in the
  "sNews 1.6 >> Patches & Fixes Forum at
  - http://snewscms.com/forum/index.php?board=51.0
  - Search for - Patch/fix - to find all patch locations.
	
*********************************************************/
error_reporting(0);

/*** CONFIGURATION VARIABLES ***/

// DATABASE VARIABLES
function db($variable) {

	$db = array();
	$db['ip'] = '192.168.13.37'; //IP server
	$db['path'] = 'wms/'; //WMS path end with slash, example=:'wms/'
	$db['dbhost'] = 'localhost'; //MySQL Host
	$db['dbname'] = 'stream'; //Database Name
	$db['dbuname'] = 'root'; //Database Username
	$db['dbpass'] = ''; //Database password
	$db['prefix'] = ''; //Database prefix

	$db['website'] = 'http://'.$db['ip'].'/'.$db['path']; //ip+path
	$db['dberror'] = '<strong>There was an error while connecting to the database.</strong> <br /> Check your database settings.'; //Database error message

	$db['webcam'] = '/dev/video0'; //webcam device
	$db['motion'] = '/usr/local/bin/motion'; //path to motion
	$db['port'] = '18081'; //Motion port
	$db['ccw'] = '/usr/local/sbin/ccw'; //path to ccw
	$db['cw'] = '/usr/local/sbin/cw'; //path to cw

	return $db[$variable];
}

// LANGUAGE VARIABLES
function l($variable) {
	if (s('language') != 'EN' && file_exists('snews_'.s('language').'.php')) {include('snews_'.s('language').'.php');} else {
	$l = array();

	#SITE LANGUAGE VARIABLES
	$l['home'] = 'Home';
	$l['home_sef'] = 'home'; //default value is used only if "home_SEF" is not set in the database - allowed characters are [a-z] [A-Z] [0-9] [-] [_]
	$l['archive'] = 'Archive';
	$l['rss_feed'] = 'RSS Feed';
	$l['contact'] = 'Contact';
	$l['sitemap'] = 'Site Map';
	#categories
	$l['month_names'] = 'January, February, March, April, May, June, July, August, September, October, November, December';
	#search
	$l['search_keywords'] = 'Search..';
	$l['search_button'] = 'Search';
	$l['search_results'] = 'Search results';
	$l['charerror'] = 'At least 4 characters are needed to perform the search.';
	$l['noresults'] = 'There are no results for query ';
	$l['resultsfound'] = 'results were found for query';
	#comments
	$l['addcomment'] = 'Write a comment';
	$l['comment'] = 'Comment';
	$l['comment_info'] = 'Comment posted in';
	$l['page'] = 'Page';
	$l['on'] = 'on'; // preposition word used in comments infoline
	#paginator
	$l['first_page'] = 'First';
	$l['last_page'] = 'Last';
	$l['previous_page'] = 'Previous';
	$l['next_page'] = 'Next';
	$l['name'] = 'Name';
	#comments
	$l['comment_sent'] = 'Your comment has been sent';
	$l['comment_sent_approve'] = 'Your comment is waiting moderation.';
	$l['comment_error'] = 'Your comment was not sent';
	$l['comment_back'] = 'Back to your comment';
	$l['no_comment'] = 'This article hasn\'t been commented yet.';
	$l['no_comments'] = 'No comments at the moment';
	$l['ce_reasons'] = '<strong>Possible reasons:</strong> You left blank column, comment is too short or you haven\'t entered the right math captcha code.';
	$l['url'] = 'Website URL';
	#contact
	$l['required'] = '* = required field';
	$l['email'] = 'Email';
	$l['message'] = 'Message';
	$l['math_captcha'] = 'Perform an addition of two integers to avoid spam';
	$l['contact_sent'] = 'Thank you, your message has been sent.';
	$l['contact_not_sent'] = 'Your message was not sent';
	$l['message_error'] = '<strong>Possible reasons:</strong> You left name or message field blank, or email address does not exist.';
	#generic links
	$l['backhome'] = 'Back home';
	$l['backarticle'] = 'Back to article';
	$l['read_more'] = 'Continue reading';
	#contents error
	$l['article_not_exist'] = 'No contents yet';
	$l['category_not_exist'] = 'Requested category does not exist';
	$l['not_found'] = 'Content not found';
	#rss links
	$l['rss_articles'] = 'RSS Articles';
	$l['rss_pages'] = 'RSS Pages';
	$l['rss_comments'] = 'RSS Comments';
	$l['rss_comments_article'] = 'RSS Comments for this article';

	#ADMINISTRATION LANGUAGE VARIABLES
	#administration
	$l['administration'] = 'Admin';
	$l['articles'] = 'Articles';
	$l['extra_contents'] = 'Extra contents';
	$l['pages'] = 'Pages';
	#basic buttons
	$l['view'] = 'View';
	$l['add_new'] = 'Add new';
	$l['admin_category'] = 'New Category';
	$l['article_new'] = 'New Article';
	$l['extra_new'] = 'New Extra Contents';
	$l['page_new'] = 'New Page';
	$l['edit'] = 'Edit';
	$l['delete'] = 'Delete';
	$l['save'] = 'Save';
	$l['submit'] = 'Submit';
	#settings
	$l['settings'] = 'Settings';
	$l['site_settings'] = 'Site';
	#login
	$l['login_status'] = 'Login status';
	$l['login'] = 'Login';
	$l['username'] = 'Username';
	$l['password'] = 'Password';
	$l['login_limit'] = 'User/pass limitations: 4-8 alphanumeric characters only';
	$l['logged_in'] = 'You are Logged In';
	$l['log_out'] = 'Logging out';
	$l['logout'] = 'Logout';
	#categories
	$l['categories'] = 'Categories';
	$l['category'] = 'Category';
	$l['appear_category'] = 'Appear only on Category';
	$l['appear_page'] = 'Appear only on Page';
	$l['add_category'] = 'New category';
	$l['category_order'] = 'Category order';
	$l['order_category'] = 'Reorder';
	$l['description'] = 'Description';
	$l['publish_category'] = 'Publish category';
	$l['status'] = 'Status:';
	$l['published'] = 'Published';
	$l['unpublished'] = '<span style="color: #FF0000">Unpublished</span>';
	#articles
	$l['article'] = 'Article';
	$l['article_date'] = 'Article date (enter a higher date for future posting)';
	$l['preview'] = 'Preview';
	$l['no_articles'] = 'No articles at the moment';
	#customize article
	$l['customize'] = 'Customize';
	$l['display_title'] = 'Display title';
	$l['display_info'] = 'Display info line (read more/ comments/ date)';
	$l['server_time'] = 'Time on Server';
	$l['future_posting'] = '<span style="color: #FF9900;">Future posting</span>';
	$l['publish_date'] = 'Publish Date';
	$l['day'] = 'Day';
	$l['month'] = 'Month';
	$l['year'] = 'Year';
	$l['hour'] = 'Hour';
	$l['minute'] = 'Minute';
	$l['publish_article'] = 'Publish article';
	$l['operation_completed'] = 'Operation completed successfully!';
	$l['deleted_success'] = 'Succesfully deleted';
	#files
	$l['files'] = 'Files';
	$l['upload'] = 'Upload';
	$l['view_files'] = 'View files in';
	$l['file_error'] = 'File could not be copied!';
	$l['deleted'] = 'File deleted!';
	#comments
	$l['comments'] = 'Comments';
	$l['enable_commenting'] = 'Enable comments';
	$l['edit_comment'] = 'Edit comment';
	$l['freeze_comments'] = 'Freeze comments';
	$l['unfreeze_comments'] = 'Unfreeze comments';
	$l['enable'] = 'Enable';
	$l['approved'] = 'Approved';
	$l['enabled'] = 'Enabled';
	$l['disabled'] = 'Disabled';
	$l['unapproved'] = 'Unapproved comments';
	$l['wait_approval'] = 'comments waiting approval';
	#article structure
	$l['title'] = 'Title';
	$l['sef_title'] = 'Search engine friendly title (will be used as link to the article)';
	$l['sef_title_cat'] = 'Search engine friendly title (will be used as link to the category)';
	$l['text'] = 'Text';
	$l['position'] = 'Position';
	$l['display_page'] = 'Page';
	$l['center'] = 'Center';
	$l['contents'] = 'Contents';
	$l['side'] = 'Extra contents';
	#errors
	$l['error_404'] = 'Requested contents could not be found. Please go back or use the search feature.';
	$l['error_not_logged_in'] = 'You are not currently logged in and so are not allowed to do that.';
	$l['admin_error'] = 'Error';
	$l['back'] = 'Back';
	$l['err_TitleEmpty'] = 'The Title cannot be empty.';
	$l['err_TitleExists'] = 'The Title already exists.';
	$l['err_SEFEmpty'] = 'The SEF Title cannot be empty.';
	$l['err_SEFExists'] = 'The SEF Title already exists.';
	$l['err_SEFIllegal'] = 'The SEF title you entered contains illegal characters.<br />You can only use <strong>a-z 0-9_-</strong><br />A new SEF url has been selected from the title. Please check it.';
	$l['errNote'] = '<br /><strong>Be careful:</strong> Due to the fact that when something goes wrong most posting options are lost, please check them before posting again.';
	$l['warning_delete'] = 'Are you sure you want to delete this?';
	$l['image_url'] = 'Enter Image URL';
	$l['image_alt'] = 'Enter Image Alt';
	$l['file_url'] = 'Enter File URL';
	$l['link_url'] = 'Enter Link URL';
	$l['link_title'] = 'Enter Link Title';
	#settings form
	$l['none'] = 'None';
	$l['change_up'] = 'Change Username and Password';
	$l['newer_top'] = 'Newer on top';
	$l['newer_bottom'] = 'Newer on bottom';
	$l['err_Login'] = 'Wrong username and/or password and/or sum entered.';
	$l['pass_mismatch'] = 'Passwords are outside length limit or do not match';
	$l['a_username'] = 'Username';
	$l['a_password'] = 'Password';
	$l['a_password2'] = 'Repeat password';
	$l['a_display_page'] = 'Use Page as Home Page';
	$l['a_display_new_on_home'] = 'Display new Articles on home';
	$l['a_display_pagination'] = 'Display Pagination on articles';
	$l['a_website_title'] = 'Website Title';
	$l['a_home_sef'] = 'Home SEF (used as link to <em>Home</em>)';
	$l['a_website_email'] = 'Email';
	$l['a_description'] = 'Default description META Tag (for search engines)';
	$l['a_keywords'] = 'Default keywords META Tag (keywords separated by comma)';
	$l['a_contact_info'] = 'Contact info';
	$l['a_contact_subject'] = 'Contact Form Subject';
	$l['a_word_filter_file'] = 'Badwords filter file';
	$l['a_word_filter_change'] = 'Badwords replacement word';
	$l['a_word_filter_enable'] = 'Enable Badwords filter';
	$l['error_file_name'] = '<br /><span style="color: #FF0000; font-weight: bold;">Include Error: Forbidden file name</span><br />';
	$l['error_file_exists'] = '<br /><span style="color: #FF0000; font-weight: bold;">Include Error: File doesn\'t exists</span><br />';
	$l['a_num_categories'] = 'Display number of articles next to a category';
	$l['charset'] = 'Default charset';
	$l['a_time_settings'] = 'Time and Locale settings';
	$l['a_date_format'] = 'Date Format';
	$l['a_comments_order'] = 'Comments Order';
	$l['a_comment_limit'] = 'Comment results per page';
	$l['a_rss_limit'] = 'RSS Articles Limit';
	$l['a_approve_comments'] = 'Approve comments before publishing';
	$l['a_article_limit'] = 'Articles per page limit';
	$l['a_language'] = 'sNews Language';
	$l['description_meta'] = 'Description META Tag (for search engines)';
	$l['keywords_meta'] = 'Keywords META Tag (keywords separated by comma)';
	$l['all'] = 'All';
	
	#SYSTEM VARIABLES (not to be translated)
	$l['home_sef'] = s('home_sef') == '' ? $l['home_sef'] : s('home_sef'); //reassign $l['home_sef'] to system home_sef if system is set.
	$l['cat_listSEF'] = $l['home_sef'].',archive,contact,sitemap,rss-articles,rss-pages,rss-comments,login,administration,admin_category,admin_article,article_new,extra_new,page_new,categories,articles,extra_contents,pages,settings,files,logout,left,right,start,kill,restart'; //SEF links of the hardcoded categories
	$l['divider'] = '&middot;'; //divider character
	$l['paginator'] = 'p_'; // used in article pagination links
	$l['file_include_extensions'] = 'php,txt,inc,htm,html'; // list of file types available for inclusion routine
	$l['allowed_files'] = 'php,htm,html,txt,inc,css,js,swf,avi'; // list of file types available for upload/file list routine
	$l['allowed_images'] = 'gif,jpg,jpeg,png'; // list of image types available for upload/file list routine
	$l['ignored_items'] = '.,..,cgi-bin,.htaccess,Thumbs.db,snews.php,index.php,style.css,webcam.jpg,webcam.png,small.gif,cambozola.jar'; // list of files&folders ignored by upload/file list routine

	} return $l[$variable];
}
/*** END OF SETTINGS & VARIABLES, EDIT BELOW THIS LINE ONLY IF YOU KNOW WHAT YOU'RE DOING ***/

// INFO LINE TAGS (readmore, comments, date)
# same as 1.5.31
function tags($tag) {
	$tags = array(); $tags['infoline'] = '<p class="date">,readmore,comments,date,edit,</p>';
	$tags['comments'] = '<div class="comment">,<p class="date">,name, '.l('on').' ,date,edit,</p>,<p>,comment,</p>,</div>';
	return $tags[$tag];
}

// SITE SETTINGS - grab site settings from database
# same as 1.5.31
function s($variable) {
	$query = "SELECT value FROM ".db('prefix')."settings WHERE name = '$variable'";
	$result = mysql_query($query);
	while ($r = mysql_fetch_array($result)) {$value = $r['value'];}
	return $value;
}

// SESSION TOKEN
# 1.6.0 - new first line only
function token() {
	$a =  md5(substr(session_id(), 2, 7));
	$b = $_SERVER['HTTP_USER_AGENT'];
	$c = db('website');
	$token = md5($a.$b.$c);
	return $token;
}

// STARTUP
# 1.60 - completely revised
function snews_startup() {
	connect_to_db();
	$categorySEF = get_id('category');
	$articleSEF = get_id('article');
	if (false !== strpos($categorySEF, 'rss-')) {rss_contents($categorySEF, $articleSEF);}
	$homeSEF = l('home_sef');
	$categoryID = $categorySEF == $homeSEF ? 0 : retrieve('id', 'categories', 'seftitle', $categorySEF);
	$articleCatID = retrieve('category', 'articles', 'seftitle', $articleSEF);
	if (!empty($categorySEF) && $categorySEF != '404') {
		switch(true) {
			case ((!$categoryID || !is_numeric($categoryID)) && check_category($categorySEF) == false):
			# Patch/fix applied - Oct.08.07
			case (!empty($articleSEF) && false === strpos($articleSEF,l('paginator'))  && (!is_numeric($articleCatID)||$articleCatID!=$categoryID)):
			# un-patched string
			//case (!empty($articleSEF) && false === strpos($articleSEF,l('paginator')) && !is_numeric($articleCatID)):
			header('Location: '.db('website').'404/'); exit;
    	break;
		}
	}
	if ($categorySEF == '404') {header('HTTP/1.1 404 Not Found');}
	update_articles();
	if (isset($_POST['Loginform'])) {
		$user = checkUserPass($_POST['uname']);
		$pass = checkUserPass($_POST['pass']);
		if (md5($user) === s('username') && md5($pass) === s('password') && mathCaptcha($_POST['calc'], $_POST['sum'])) {
			$_SESSION[db('website').'Logged_In'] = token();
}}}
snews_startup();

// 404 ERROR PAGE
# 1.6.0 - new function
function error404() {echo l('error_404');}

// TITLE
# same as 1.5.31
function title() {
	echo '<base href="'.db('website').'" />';
	$categorySEF = get_id('category'); $articleSEF = get_id('article');
	$categoryName = retrieve('name', 'categories', 'seftitle', $categorySEF);
	$articleTitle = retrieve('title', 'articles', 'seftitle', $articleSEF);
	if (!empty($articleTitle)) {$title = $articleTitle.' - ';}
	if (!empty($categoryName)) {$title .= $categoryName.' - ';}
	$title .= s('website_title');
	echo '<title>'.$title.'</title>';
	echo '<meta http-equiv="Content-Type" content="text/html; charset='.s('charset').'" />';
	if (!empty($articleSEF)) {
		$query = "SELECT * FROM ".db(prefix)."articles WHERE seftitle = '$articleSEF'";
		$result = mysql_query($query);
		while ($r = mysql_fetch_array($result)) {$dmeta = $r['description_meta']; $kmeta = $r['keywords_meta'];}
	}
	echo '<meta name="description" content="'.(!empty($dmeta) ? $dmeta : s('website_description')).'" />';
	echo '<meta name="keywords" content="'.(!empty($kmeta) ? $kmeta : s('website_keywords')).'" />';
	if ($_SESSION[db('website').'Logged_In'] == token()) {js();}
}

//BREADCRUMBS
# same as 1.5.31
function breadcrumbs() {
	$link = '<a href="'.db('website').'';
	if ($_SESSION[db('website').'Logged_In'] == token()) {echo $link.'administration/" title="'.l('administration').'">'.l('administration').'</a> '.l('divider').' ';}
	$categorySEF = get_id('category'); $articleSEF = get_id('article'); $home = l('home_sef');
	echo (!empty($categorySEF) || $categorySEF == $home || !empty($articleSEF)) ? $link.'" title="'.l('home').'">'.l('home').'</a>' : l('home');
	$categoryName = retrieve('name', 'categories', 'seftitle', $categorySEF);
	if (!empty($categoryName)) {
		echo ' '.l('divider').' '.(!empty($articleSEF) ? $link.$categorySEF.'/" title="'.$categoryName.'">'.$categoryName.'</a>' : $categoryName);
	}
	$articleTitle = retrieve('title', 'articles', 'seftitle', $articleSEF);
	if (!empty($articleTitle)) {echo ' '.l('divider').' '.$articleTitle;}
	if (check_category($categorySEF) == true && $categorySEF != $home && $categorySEF != 'administration') {echo ' '.l('divider').' '.l($categorySEF);}
}

// LOGIN LOGOUT LINK
# same as 1.5.31
function login_link() {
	$login = '<a href="'.db('website');
	$login .= $_SESSION[db('website').'Logged_In'] == token() ? 'administration/" title="'.l('administration').'">'.l('administration') : 'login/" title="'.l('login').'">'.l('login').'';
	$login .= '</a>';
	echo $login;
}

// DISPLAY CATEGORIES
# same as 1.5.31
function categories() {
	$categorySEF = get_id('category');
	$class = $category_title == $categorySEF ? ' class="current"' : '';
	echo '<li><a'.$class.' href="'.db('website').'" title="'.l('home').'">'.l('home').'</a></li>';
	$query = "SELECT * FROM ".db('prefix')."categories WHERE published = 'YES' ORDER BY catorder ASC"; 
	$result = mysql_query($query);
	while ($r = mysql_fetch_array($result)) {
		$calc_num_query = "SELECT * FROM ".db('prefix')."articles WHERE position = 1 AND category = $r[id] AND published = 1"; 
		$cm_result = mysql_query($calc_num_query);
		$num_rows = mysql_num_rows($cm_result);
		$category_title = $r['seftitle'];
		$class = $category_title == $categorySEF ? ' class="current"' : '';
		echo '<li><a'.$class.' href="'.db('website').$category_title.'/" title="'.$r['description'].'">'.$r['name'];
		echo (s('num_categories') == 'on' ? ' ('.$num_rows.')' : '').'</a></li>';
}}

// DISPLAY PAGES
# 1.6.0 - 2 lines changed, see comments.
function pages() {
	$categorySEF = get_id('category'); $pageSEF = get_id('article'); $home = l('home_sef');
	$class = (empty($categorySEF) || $categorySEF == $home && empty($pageSEF)) ? ' class="current"' : '';
	echo '<li><a'.$class.' href="'.db('website').'" title="'.l('home').'">'.l('home').'</a></li>';
	$class = ($categorySEF == 'archive') ? ' class="current"' : '';
	echo '<li><a'.$class.' href="'.db('website').'archive/" title="'.l('archive').'">'.l('archive').'</a></li>';
	$query = "SELECT * FROM ".db('prefix')."articles WHERE position = 3 ORDER BY id"; 
	$result = mysql_query($query);
	while ($r = mysql_fetch_array($result)) {
	        # 1.6.0 - new variable, used in 3rd string below
		$title = $r['title'];
		$class = ($pageSEF == $r['seftitle'])? ' class="current"' : '';
		if ($r['id'] != s('display_page')) {
		# 1.6.0 - new variable in 2 places
		echo '<li><a'.$class.' href="'.db('website').l('home_sef').'/'.$r['seftitle'].'/" title="'.$title.'">'.$title.'</a></li>';
		}
	}
	$class = ($categorySEF == 'contact') ? ' class="current"': '';
	echo '<li><a'.$class.' href="'.db('website').'contact/" title="'.l('contact').'">'.l('contact').'</a></li>';
	$class = ($categorySEF == 'sitemap') ? ' class="current"': '';
	echo '<li><a'.$class.' href="'.db('website').'sitemap/" title="'.l('sitemap').'">'.l('sitemap').'</a></li>';
	
	$login = '<a href="'.db('website');
	$login .= $_SESSION[db('website').'Logged_In'] == token() ? 'administration/" title="'.l('administration').'">'.l('administration'): 'login/" title="'.l('login').'">'.l('login').'';
	$login .= '</a>';
	echo '<li>'.$login.'</li>';
	if ($_SESSION[db('website').'Logged_In'] != token()) { echo''; }else {echo '<a href="'.db('website').'logout/" title="'.l('logout').'">'.l('logout').'</a>';}
}

//EXTRA CONTENT
# 1.6.0 - new section added for print-style container.
function extra($styleit = 0, $classname = '', $idname= '') {
	$categorySEF = get_id('category');
	$categoryId = (check_category($categorySEF) == true || empty($categorySEF) || $categorySEF == l('home_sef')) ? 0 : retrieve('id', 'categories', 'seftitle', $categorySEF);
	$pageSEF = get_id('article');
	$pageId = (empty($categorySEF)) ? 0 : retrieve('id', 'articles', 'seftitle', $pageSEF);
	$query = "SELECT * FROM ".db('prefix')."articles WHERE SUBSTRING(position, 1, 1) = '2' AND published = 1 ORDER BY id DESC";
	$result = mysql_query($query);
	while ($r = mysql_fetch_array($result)) {
		$pos = $r['position']; $pos_depend = substr($pos, 1, 1); $pos_artID = substr($pos, 2);
		switch (true) {
			case ($pos_depend == 0 && $categoryId == 0): $print = true; break;
			case ($pos_depend == 1 && $categoryId == $pos_artID): $print = true; break;
			case ($pos_depend == 2 && $pageId == $pos_artID): $print = true; $category = -1; break;
			case ($pos_depend != '2' && $r['category'] == -1): $print = true; break; default: $print = false;
		}
		if ($print == true) {
		        # 1.6.0 - new variable in 2 places
			if ($styleit == 1) {
				$container ='<div';
				$container .= !empty($classname) ? ' class="'.$classname.'"' : '';
				$container .= !empty($idname) ? ' id="'.$idname.'"' : '';
				$container .= '>';
				echo $container;
			}
			echo $r['displaytitle'] == 'YES' ? '<h3>'.$r['title'].'</h3>' : '';
			file_include($r['text'], 9999000);
			echo $_SESSION[db('website').'Logged_In'] == token() ? '<p><a href="'.db('website').'index.php?action=admin_article&amp;id='.$r['id'].'" title="'.l('edit').' '.$r['seftitle'].'">'.l('edit').'</a></p>' : '';
			if ($styleit == 1) {echo '</div>';}
}}}

// PAGINATOR
# 1.6.0 - only 2 lines re-worked as noted.
function paginator($category, $pageNum, $maxPage, $article, $pagePrefix) {
	$link = ' <a href="'.db('website').$category.'/';
	if (!empty($article)) {$link .= $article.'/';}
	$prefix = !empty($pagePrefix) ? $pagePrefix : '';
	if ($pageNum > 1) {
	        # 1.6.0 - next 2 lines re-worked.
		$goTo = (!empty($article) || (!empty($category) && $category != l('home_sef'))) ? $link : '<a href="'.db('website');
		$prev = (($pageNum-1)==1 ? $goTo : $link.$prefix.($pageNum - 1).'/').'" title="'.l('page').' '.($pageNum - 1).'">&lt; '.l('previous_page').'</a> ';
		$first = $goTo.'" title="'.l('first_page').' '.l('page').'">&lt;&lt; '.l('first_page').'</a>';
    }
	else {$prev = '&lt; '.l('previous_page'); $first = '&lt;&lt; '.l('first_page');}
	if ($pageNum < $maxPage) {
		$next = $link.$prefix.($pageNum + 1).'/" title="'.l('page').' '.($pageNum + 1).'">'.l('next_page').' &gt;</a> ';
		$last = $link.$prefix.$maxPage.'/" title="'.l('last_page').' '.l('page').'">'.l('last_page').' &gt;&gt;</a> ';
	}
	else {$next = l('next_page').' &gt; '; $last = l('last_page').' &gt;&gt;';}
	echo '<div class="paginator">'.$first.' '.$prev.' <strong>  ['.$pageNum.'</strong> / <strong>'.$maxPage.']  </strong> '.$next.' '.$last.'</div>';
}

// CENTER
# 1.6.0 - 10 minor changes, all noted by numbered comments.
function center() {
	switch(true) {
		case isset($_GET['category']): $id = $action = get_id('category'); break;
		case isset($_GET['action']): $action = clean(cleanXSS($_GET['action'])); break;
		case isset($_GET['articleid']): $articleid = get_id('articleid'); break;
	}
	switch(true) {
		case isset($_POST['search_query']): search(); return; break;
		case isset($_POST['comment']): comment('comment_posted'); return; break;
		case isset($_POST['contactform']): contact(); return; break;
		case isset($_POST['Loginform']): administration(); return; break;
		case isset($_POST['submit_text']):
			if ($_SESSION[db('website').'Logged_In'] == token()) {processing(); return;}
        # 1. 1.6.0 - "1," added before start of language variable.
			else {echo notification(1,l('error_not_logged_in'),'home');} break;
	}
	if ($_SESSION[db('website').'Logged_In'] == token()) {
		switch ($action) {
			case 'administration': administration(); return; break;
			case 'settings': settings(); return; break;
			case 'categories': admin_categories(); return; break;
			case 'admin_category': form_categories(); return; break;
			case 'articles': admin_articles('article_view'); return; break;
			case 'extra_contents': admin_articles('extra_view'); return; break;
			case 'pages': admin_articles('page_view'); return; break;
			case 'admin_article': form_articles(''); return; break;
			case 'article_new': form_articles('article_new'); return; break;
			case 'extra_new': form_articles('extra_new'); return; break;
			case 'page_new': form_articles('page_new'); return; break;
			case 'editcomment': edit_comment(); return; break;
			case 'files': files(); return; break;
			case 'process': processing(); return; break;	
/***webcam controller********************************************************************/
			case 'left': left(); return; break;
			case 'right': right(); return; break;
			case 'start': start(); return; break;
			case 'kill': kill(); return; break;
			case 'restart': restart(); return; break;
/****************************************************************************************/
			case 'logout': session_destroy();
			echo '<meta http-equiv="refresh" content="1; url='.db('website').'">';
			echo l('log_out').'...';return; break;
		}
	}
	switch ($action) {
	case 'archive': archive(); break;
	case 'sitemap': sitemap(); break;
	case 'contact': contact(); break;
	case 'login': login(); break;
/***webcam controller********************************************************************/
	case 'left': echo'<font color="red">Login required.</font>'; echo '<meta http-equiv="refresh" content="1; url='.db('website').'">';break;
	case 'right': echo'<font color="red">Login required.</font>'; echo '<meta http-equiv="refresh" content="1; url='.db('website').'">';break;
	case 'start': echo'<font color="red">Login required.</font>'; echo '<meta http-equiv="refresh" content="1; url='.db('website').'">';break;
	case 'kill': echo'<font color="red">Login required.</font>'; echo '<meta http-equiv="refresh" content="1; url='.db('website').'">';break;
	case 'restart': echo'<font color="red">Login required.</font>'; echo '<meta http-equiv="refresh" content="1; url='.db('website').'">';break;
	case 'kill': echo'<font color="red">Login required.</font>'; echo '<meta http-equiv="refresh" content="1; url='.db('website').'">';break;
/****************************************************************************************/
	# 2. 1.6.0 - new line added for error 404 function.
	case '404': error404(); break;
	default:
		$article = get_id('article');
	# 3. 1.6.0 - new line, replaces lang def with variable in echo string at comments # 4, 5
		$title_not_found = '<h2>'.l('not_found').'</h2>';
		$currentPage = strpos($article, l('paginator')) === 0 ? str_replace(l('paginator'), '', $article) : '';
		$home = l('home_sef'); $categorySEF = get_id('category');
		$categorySEF = empty($categorySEF) ? $home : $categorySEF;
		$use_cat_id = $categorySEF == $home ? 0 : retrieve('id', 'categories', 'seftitle', $categorySEF);
		$query_articles = "SELECT * FROM ".db('prefix')."articles WHERE published = 1 AND SUBSTRING(position, 1, 1) != '2'";
  		if (!empty($article) && empty($currentPage)) {$query_articles .= " AND seftitle = '$article'";}
		else if ($categorySEF == $home && s('display_page') <> 0) {$id_page = s('display_page'); $query_articles .= " AND id = '$id_page'";}
  		else {
			if (s('display_new_on_home') == 'on') {$query_articles .= $use_cat_id != 0 ? " AND category = $use_cat_id" : '';}
			else {$query_articles .= " AND category = $use_cat_id";}
			$query_articles .= " AND position <> 3 ORDER BY date DESC";
			$result_articles = mysql_query($query_articles);
			$numrows_articles = mysql_num_rows($result_articles);
			if (!$result_articles || !$numrows_articles) {
	# 4. 1.6.0 - new variable in echo string replaces lang def.
				echo $title_not_found; return;
				} else {
				$articleCount = s('article_limit');
				$article_limit = (empty($articleCount) || $articleCount < 1) ? 100 : $articleCount;
				$totalPages = ceil($numrows_articles/$article_limit);
				if (!isset($currentPage) || !is_numeric($currentPage) || $currentPage < 1) {$currentPage = 1;}
				else if ($currentPage > $totalPages) {$currentPage = $totalPages;}
				$query_articles .= " LIMIT ".($currentPage - 1) * $article_limit.", ".$article_limit;
			}
		}
		$result = mysql_query($query_articles);
		$numrows = mysql_num_rows($result);
		if (!$result || !$numrows) {
        # 5. 1.6.0 - variable in echo string replaces lang def.
		echo $title_not_found;
		} else {
	# 6. 1.6.0 - new variable added.
		$link = '<a href="'.db('website');
			while ($r = mysql_fetch_array($result)) {
				$infoline = $r['displayinfo'] == 'YES' ? true : false;
				$text = stripslashes($r['text']);
				if (!empty($currentPage)) {$short_display = strpos($text, '[break]'); $shorten = $short_display == 0 ? 9999000 : $short_display;}
				else {$shorten = 9999000;}
				$comments_query = "SELECT * FROM ".db('prefix')."comments WHERE articleid = $r[id] AND approved = 'True'";
				$comments_result = mysql_query($comments_query);
				$comments_num = mysql_num_rows($comments_result);
				$a_date_format = date(s('date_format'), strtotime($r['date']));
      			$position = $r['position'];
				$category = $r['category'] == 0 ? $home : retrieve('seftitle', 'categories', 'id', $r['category']);
	# 7. 1.6.0 - variable added.
				$title = $r['title'];
	if ($r['displaytitle'] == 'YES') {
	# 8. 1.6.0 - $title variable added in 3 places, next string
	echo '<h2>'.(strlen($text) > $shorten ? $link.$category.'/'.$r['seftitle'].'/" title="'.$title.'">'.$title.'</a>' : $title).'</h2>';
	}
				file_include(str_replace('[break]', '', $text), $shorten);
				$commentable = $r['commentable'];
	# 9. 1.6.0 - Order of next 4 lines has changed.
	$edit_link = '';//$link.'index.php?action=admin_article&amp;id='.$r['id'].'" title="'.l('edit').' '.$title.'">'.l('edit').'</a>';
	if (!empty($currentPage)) {
	if ($infoline == true) {
	$tag = explode(',', tags('infoline'));
	# --------------------------------------
	foreach ($tag as $tag) {
	switch (true) {
		case ($tag == 'date'): echo $a_date_format; break;
		case ($tag == 'readmore' && strlen($r['text']) > $shorten):
		echo $link.$category.'/'.$r['seftitle'].'/" title="'.l('read_more').'">'.l('read_more').'</a> '; break;
		case ($tag == 'comments' && ($commentable == 'YES' || $commentable == 'FREEZ')):
		echo $link.$category.'/'.$r['seftitle'].'/#'.l('comment').'1" title="'.l('comments').'">'.l('comments').' ('.$comments_num.')</a> '; break;
		case ($tag == 'edit' && $_SESSION[db('website').'Logged_In'] == token()): echo ' '.$edit_link; break;
		case ($tag != 'readmore' && $tag != 'comments' && $tag != 'edit'): echo $tag; break;
							}
						}
					}
					else if ($_SESSION[db('website').'Logged_In'] == token()) {echo '<p>'.$edit_link.'</p>';}
				}
		else if (substr($position, 0, 1) != '2' && empty($currentPage)) {
	# 10. 1.6.0 - $edit_link string in 1.5.31 has been removed from here.
		if ($infoline == true) {
		$tag = explode(',', tags('infoline'));
		foreach ($tag as $tag ) {
		switch ($tag) {
			case 'date': echo $a_date_format; break;
			case 'readmore':
			case 'comments': ; break;
			case 'edit': if ($_SESSION[db('website').'Logged_In'] == token()) {echo ' '.$edit_link;} break;
			default: echo $tag;
				}
			    }
			}
			else if ($_SESSION[db('website').'Logged_In'] == token()) {echo '<p>'.$edit_link.'</p>';}
				}
			}
			if (!empty($currentPage) && ($numrows_articles > $article_limit) && s('display_pagination') == 'on') {
				paginator($categorySEF, $currentPage, $totalPages, '', l('paginator'));
			}
			if (!empty($article) && empty($currentPage) && $infoline == true) {
				if ($commentable == 'YES') {comment('unfreezed');}
				else if ($commentable == 'FREEZ') {comment('freezed');}
}}}}

// COMMENTS
# 1.6.0 - 5 changes, noted with numbered comments.
function comment($freeze_status) {
	$categorySEF = get_id('category'); $articleSEF = get_id('article');
	if (strpos($articleSEF, l('paginator')) === 0) {$articleSEF = str_replace(l('paginator'), '', $articleSEF);}
	$query = "SELECT id FROM ".db('prefix')."articles WHERE seftitle = '$articleSEF'";
	$result = mysql_query($query);
  	while ($r = mysql_fetch_array($result)) {$articleId = $r['id'];}
	$commentsPage = get_id('commentspage');
	if (!isset($commentsPage) || !is_numeric($commentsPage) || $commentsPage < 1) {$commentsPage = 1;}
	$comments_order = s('comments_order');
	# 1. 1.6.0 - This section has changed. ---------------------
	if (isset($_POST['comment'])) {
		$comment = cleanWords(trim($_POST['text']));
		$comment = strlen($comment) > 4 ? clean(cleanXSS($comment)) : null;
		$name = trim($_POST['name']);
		$name = strlen($name) > 1 ? clean(cleanXSS($name)) : null;
		$url = trim($_POST['url']);
		$url = (strlen($url) > 8 && strpos($url, '?') === false) ? clean(cleanXSS($url)) : null;
		$now = is_numeric($_POST['time']) ? $_POST['time'] : null;
		$post_article_id = (is_numeric($_POST['id']) && $_POST['id'] > 0) ? $_POST['id'] : null;
		$ip = (strlen($_POST['ip']) < 16) ? clean(cleanXSS($_POST['ip'])) : null;
		$doublecheck = retrieve('id', 'comments', 'comment', $comment);
		if ($ip == $_SERVER['REMOTE_ADDR'] && (time() - $now) > 4 && $comment && $name && $post_article_id && is_numeric($_POST['calc']) && mathCaptcha($_POST['calc'], $_POST['sum']) && !isset($doublecheck)) {
	# end of changed section #1 ----------------------------------
			$url = preg_match('/((http)+(s)?:(\/\/)|(www\.))([a-z0-9_\-]+)/', $url) ? $url : '';
			$url = substr($url, 0, 3) == 'www' ? 'http://'.$url : $url;
			$time = date("Y-m-d H:i:s");
			if(s('approve_comments') != 'on') {$approved = 'True';}
			$query = "INSERT INTO ".db('prefix')."comments(articleid, name, url, comment, time, approved) VALUES('$post_article_id', '$name', '$url', '$comment', '$time', '$approved')";
			mysql_query($query);
			$commentStatus = s('approve_comments') == 'on' ? l('comment_sent_approve') : l('comment_sent');
		}
		else {$commentStatus = l('comment_error'); $commentReason = l('ce_reasons');}
		echo '<h2>'.$commentStatus.'</h2>';
		if (!empty($commentReason)) {echo '<p>'.$commentReason.'</p>';}
		$postCat = clean(cleanXSS($_POST['category']));
		$postArt = clean(cleanXSS($_POST['article']));
		$back_link = db('website').$postCat.'/'.$postArt.'/';
	# 2. 1.6.0 - new string replaces 5 strings in 1.5.31, refreshes content.
		echo '<meta http-equiv="refresh" content="1; url='.db('website').$postCat.'/'.$postArt.'/">';
	}
	else {
		$commentCount = s('comment_limit');
		$comment_limit = (empty($commentCount) || $commentCount < 1) ? 100 : $commentCount;
		if(isset($commentsPage)) {$pageNum = $commentsPage;}
		$offset = ($pageNum - 1) * $comment_limit;
		$totalrows = "SELECT id FROM ".db('prefix')."comments WHERE articleid = $articleId AND approved = 'True'";
		$rowsresult = mysql_query($totalrows);
		$numrows = mysql_num_rows($rowsresult);
		if (!$numrows || !$rowsresult) {
			if ($freeze_status != 'freezed') {echo '<p>'.l('no_comment').'</p>';}
		}
		else {
			$query = "SELECT * FROM ".db('prefix')."comments WHERE articleid = $articleId AND approved = 'True' ORDER BY id $comments_order LIMIT $offset, $comment_limit";
			$result = mysql_query($query) or die(db('dberror'));
			$ordinal = 1;
			$date_format = s('date_format');
	# 3. 1.6.0 - variable string re-located, was 5 lines down in 1.5.31, after # 3 - note.
			$edit_link = ' <a href="'.db('website').'index.php?action=';
			while ($r = mysql_fetch_array($result)) {
				$date = date($date_format, strtotime($r['time']));
				$commentNum = $offset + $ordinal;
				$tag = explode(',', tags('comments')); # 3- note.
				foreach ($tag as $tag) {
		switch (true) {
		case ($tag == 'date'):
		  echo '<a id="'.l('comment').$commentNum.'" name="'.l('comment').$commentNum.'" title="'.l('comment').' '.$commentNum.'"></a>'.$date;
		break;
		case ($tag == 'name'): $name = $r['name'];
	# 4. 1.6.0 - new, variable (above) replaces lang defs in next line.
		  echo !empty($r['url']) ? '<a href="'.$r['url'].'" title="'.$r['url'].'" rel="nofollow">'.$name.'</a> ' : $name;
		break;
		case ($tag == 'comment'): echo $r['comment']; break;
		case ($tag == 'edit' && $_SESSION[db('website').'Logged_In'] == token()):
		  echo $edit_link.'editcomment&amp;commentid='.$r['id'].'" title="'.l('edit').' '.l('comment').'">'.l('edit').'</a> ';
		  echo $edit_link.'process&amp;task=deletecomment&amp;articleid='.$r['articleid'].'&amp;commentid='.$r['id'].'" title="'.l('delete').' '.l('comment').'" onclick="return pop()">'.l('delete').'</a>';
		break;
		case ($tag == 'edit'): ; break;

		default: echo $tag;
					}
				}
				$ordinal++;
			}
			$maxPage = ceil($numrows / $comment_limit); $back_to_page = ceil(($numrows + 1) / $comment_limit);
			if ($maxPage > 1) {paginator($categorySEF, $pageNum, $maxPage, $articleSEF, '');}
		}
		if ($freeze_status != 'freezed') {
		echo '<div class="commentsbox"><h2>'.l('addcomment').'</h2>';
	# 5. 1.6.0 - New lang definition, and "echo" added to all html_input strings.
		echo '<p>'.l('required').'</p>';
		echo html_input('form', '', 'post', '', '', '', '', '', '', '', '', '', 'post', db('website'), '');
		echo html_input('text', 'name', 'name', '', '* '.l('name'), 'text', '', '', '', '', '', '', '', '', '');
		echo html_input('text', 'url', 'url', '', l('url'), 'text', '', '', '', '', '', '', '', '', '');
		echo html_input('textarea', 'text', 'text', '', '* '.l('comment'), '', '', '', '', '', '5', '5', '', '', '');
		echo mathCaptcha();
		echo '<p>';
		echo html_input('hidden', 'category', 'category', $categorySEF, '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('hidden', 'id', 'id', $articleId, '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('hidden', 'article', 'article', $articleSEF, '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('hidden', 'commentspage', 'commentspage', $back_to_page, '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('hidden', 'ip', 'ip', $_SERVER['REMOTE_ADDR'], '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('hidden', 'time', 'time', time(), '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('submit', 'comment', 'comment', l('submit'), '', 'button', '', '', '', '', '', '', '', '', '');
		echo '</p></form></div>';
}}}

// ARCHIVE
# 1.6.0 - 2 changes
function archive() {
	echo '<h2>'.l('archive').'</h2>';
	$query = "SELECT * FROM ".db('prefix')."articles WHERE position = 1 AND published = 1 ORDER BY date DESC"; 
	$result = mysql_query($query);
	echo '<p>';
	# 1. 1.6.0 - if / else - 2 lines added, not in 1.5.31
	if (!$result || !mysql_num_rows($result)) {echo l('article_not_exist');}
	else {
		$home = l('home_sef');
		$home_name = l('home');
		$month_names = explode(', ', l('month_names'));
		while ($r = mysql_fetch_array($result)) {
			$year = substr($r['date'], 0, 4);
			$month = substr($r['date'], 5, 2) -1;
			$month_name = (substr($month, 0, 1) == 0) ? $month_names[substr($month, 1, 1)] : $month_names[$month];
			$categorySEF = $r['category'] != 0 ? find_cat_sef($r['category']) : $home;
			$articleSEF = retrieve('seftitle', 'articles', 'id', $r['id']);
			$cat_name = $r['category'] != 0 ? retrieve('name', 'categories', 'seftitle', $categorySEF) : $home_name;
        # 2. 1.6.0 - title variable added, replacing 2 instances in last echo string, not in 1.5.31
			$title = $r['title'];
			if ($last <> $year.$month) {echo '<strong>'.$month_name.', '.$year.'</strong><br />';}
			echo l('divider').' <a href="'.db('website').$categorySEF.'/'.$articleSEF.'/" title="'.$title.'">'.$title.'</a> ('.$cat_name.')<br />';
			$last = $year.$month;
		}
	}
	echo '</p>';
}

//SITEMAP
# 1.6.0 - 2 variables added, several tag changes - more use of <ul> and <li>.
function sitemap() {
	echo '<h2>'.l('sitemap').'</h2>';
	echo '<p><strong>'.l('pages').'</strong></p>';
	echo '<ul>';
	$link = '<li><a href="'.db('website');
	echo $link.'" title="'.l('home').'">'.l('home').'</a></li>';
	echo $link.'archive/" title="'.l('archive').'">'.l('archive').'</a></li>';
	$query = "SELECT * FROM ".db('prefix')."articles WHERE position = 3 AND published = '1' ORDER BY date";
	$result = mysql_query($query);
	$home = l('home_sef');
	while ($r = mysql_fetch_array($result)) {
	# 1. 1.6.0 - $page_title variable added, for use in "if" string below.
        $page_title = $r['title'];
        if ($r['id'] != s('display_page')) {echo $link.$home.'/'.$r['seftitle'].'/" title="'.$page_title.'">'.$page_title.'</a></li>';}
    }
    echo $link.'contact/">'.l('contact').'</a></li>';
    echo $link.'sitemap/">'.l('sitemap').'</a></li>';
    rss_links();
    echo '</ul>';
    echo '<p><strong>'.l('articles').'</strong></p>';
    echo '<ul>';
    $art_query = "SELECT * FROM ".db('prefix')."articles WHERE position = 1 AND published = '1'";
    $query = $art_query." AND category = 0 ORDER BY date DESC";
    $result = mysql_query($query);
    echo '<li><strong><a href="'.db('website').'" title="'.l('home').'">'.l('home').'</a></strong></li>';
    while ($r = mysql_fetch_array($result)) {
	# 2. 1.6.0 - $art_title variable added, for use in "echo" string below.
        $art_title = $r['title'];
        echo $link.l('home_sef').'/'.$r['seftitle'].'/" title="'.$art_title.'">'.$art_title.'</a></li>';
    }
    echo '</ul>';
    $cat_query = "SELECT * FROM ".db('prefix')."categories WHERE published = 'YES' ORDER BY catorder";
    $cat_result = mysql_query($cat_query);
    while ($c = mysql_fetch_array($cat_result)) {
        echo '<p><strong><a href="'.db('website').$c['seftitle'].'/" title="'.$c['description'].'">'.$c['name'].'</a></strong></p>';
        $catid = $c['id'];
        $query = $art_query." AND category = $catid ORDER BY id DESC";
        $result = mysql_query($query);
        echo '<ul>';
        while ($r = mysql_fetch_array($result)) {
            $date = date(s('date_format'), strtotime($r['date']));
            echo $link.$c['seftitle'].'/'.$r['seftitle'].'/" title="'.$r['title'].'">'.$r['title'].'</a></li>';
        }
        echo '</ul>';
}}

//NOTIFICATION
# 1.6.0 - function is reworked.
function notification($error=0, $note='', $link='') {
	$title = $error== 0 ? l('operation_completed') : l('admin_error');
	$note = (!$note || empty($note)) ? '' : '<p>'.$note.'</p>';
	switch(true){
		case (!$link): $goto = ''; break;
		case ($link == 'home'): $goto = '<p><a href="'.db('website').'" title="'.l('backhome').'">'.l('backhome').'</a></p>'; break;
		case ($link != 'home'): $goto = '<p><a href="'.db('website').$link.'/" title="'.$link.'">'.l('back').'</a></p>'; break;
	}
	$output = '<h2>'.$title.'</h2>'.$note.$goto;
	return $output;
}

// CONTACT FORM
# 3 changes made over 1.5.31
function contact() {
	if (!isset($_POST['contactform'])) {
		echo '<div class="commentsbox"><h2>'.l('contact').'</h2>';
        # 1. 1.6.0 - new lang def. and "echo" added to all html_input strings.
		echo '<p>'.l('required').'</p>';
		echo html_input('form', '', 'post', '', '', '', '', '', '', '', '', '', 'post', db('website'), '');
		echo html_input('text', 'name', 'name', '', '* '.l('name'), 'text', '', '', '', '', '', '', '', '', '');
		echo html_input('text', 'email', 'email', '', '* '.l('email'), 'text', '', '', '', '', '', '', '', '', '');
		echo html_input('text', 'weblink', 'weblink', '', l('url'), 'text', '', '', '', '', '', '', '', '', '');
		echo html_input('textarea', 'message', 'message', '', '* '.l('message'), '', '', '', '', '', '5', '5', '', '', '');
		echo mathCaptcha();
		echo '<p>';
		echo html_input('hidden', 'ip', 'ip', $_SERVER['REMOTE_ADDR'], '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('hidden', 'time', 'time', time(), '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('submit', 'contactform', 'contactform', l('submit'), '', 'button', '', '', '', '', '', '', '', '', '');
		echo '</p></form></div>';
	# 2. 1.6.0 - Session string added.
		$_SESSION[db('website').'contact'] = 0;
	}
	else {
		$to = s('website_email');
		$subject = s('contact_subject');
		$name = trim($_POST['name']);
		# name: min 2 characters
		$name = strlen($name) > 1 ? clean(cleanXSS($name)) : null;
		$mail = trim($_POST['email']);
		# email: min 8 characters
		$mail = trim($_POST['email']);
		$mail = (strlen($mail) > 7 && preg_match( '/^[A-Z0-9._-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z.]{2,6}$/i' , $mail)) ? clean(cleanXSS($mail)) : null;
		# URL: min 9 characters
		$url = trim($_POST['weblink']);
		$url = (strlen($url) > 8 && strpos($url, '?') === false) ? clean(cleanXSS($url)) : null;
		# message: min 10 characters
		$message = trim($_POST['message']);
		$message = strlen($message) > 9 ? stripslashes(cleanXSS($message)) : null;
		// remove the next line if you want to preserve HTML in the message body
		$message = strip_tags($message);
		# time: numeric only
		$now = is_numeric($_POST['time']) ? $_POST['time'] : null;
		# IP: max 15 characters
		$ip = (strlen($_POST['ip']) < 16) ? clean(cleanXSS($_POST['ip'])) : null;
	# 3. 1.6.0 - revised section with math captcha removed.
		if($_SESSION[db('website').'contact'] == 0){
			if ($ip == $_SERVER['REMOTE_ADDR'] && (time() - $now) > 4 && $name && $mail && $message && mathCaptcha($_POST['calc'], $_POST['sum'])) {
				$header = "MIME-Version: 1.0\n";
				$header .= "Content-type: text/plain; charset=".s('charset')."\n";
				$header .= "From: $name <$mail>\r\nReply-To: $name <$mail>\r\nReturn-Path: <$mail>\r\n";
				$addUrl = isset($url) ? l('url').': '.$url."\n\n" : '';
				$body = "Message from: ".$name." <$mail>\n".$addUrl.l('message').":\n".$message;
				mail($to, $subject, $body, $header);
				echo notification(0,l('contact_sent'),'home');
				$_SESSION[db('website').'contact'] = 1;
	# end of #3 revised section. -------------------------------
			}
			else {echo notification(1,l('contact_not_sent'),'contact');}
}}}

// MENU ARTICLES
# 1.6.0 - 1 change, see comment below.
function menu_articles($start, $size) {
	$query = "SELECT * FROM ".db('prefix')."articles WHERE position = 1 AND published = 1 ORDER BY date DESC LIMIT $start, $size";
	$result = mysql_query($query);
	# 1.6.0 - if / echo / else - added.
	if (!$result || !mysql_num_rows($result)) {echo '<li>'.l('no_articles').'</li>';}
	else {
	$home = l('home_sef');
	while ($r = mysql_fetch_array($result)) {
		$date = date(s('date_format'), strtotime($r['date']));
		$categorySEF = find_cat_sef($r['category']);
		$title = $r['category'] == 0 ? $home : retrieve('name', 'categories', 'seftitle', $categorySEF);
		echo '<li><a href="'.db('website').$categorySEF.'/'.$r['seftitle'].'/" title="'.$title.' ('.$date.')">'.$r['title'].'</a></li>';
}}}

// NEW COMMENTS
# 1.6.0 - 1 change in $art_query string, comment noted below.
function new_comments($number, $stringlen) {
	$query = "SELECT * FROM ".db('prefix')."comments WHERE approved = 'True' ORDER BY id DESC LIMIT $number";
	$result = mysql_query($query);
	if (!$result || !mysql_num_rows($result)) {echo '<li>'.l('no_comments').'</li>';}
	else {
	$comment_limit = s('comment_limit') < 1 ? 1 : s('comment_limit');
	$comments_order = s('comments_order');
	while ($r = mysql_fetch_array($result)) {
	# 1.6.0 - select "id" and "AND approved = 'True'" added to next string.
		$art_query = "SELECT id FROM ".db('prefix')."comments WHERE articleid = '$r[articleid]' AND approved = 'True' ORDER BY id $comments_order";
		$art_result = mysql_query($art_query);
		$num = 1;
		while ($r_art = mysql_fetch_array($art_result)) {
			if ($r_art['id'] == $r['id']) {$ordinal = $num;}
			$num++;
		}
		$name = $r['name'];
		$comment = strip_tags($r['comment']);
		$page = ceil($ordinal / $comment_limit);
		$ncom = $name.' ('.$comment;
		$ncom = strlen($ncom) > $stringlen ? substr($ncom, 0, $stringlen - 3).'...' : $ncom;
		$ncom.= strlen($name) < $stringlen ? ')' : '';
		$ncom = str_replace(' ...', '...', $ncom);
		$articleSEF = retrieve('seftitle', 'articles', 'id', $r['articleid']);
		$articleCat = retrieve('category', 'articles', 'seftitle', $articleSEF);
		$categorySEF = find_cat_sef($articleCat);
		if (!empty($articleSEF)) {
			$paging = $page > 1 ? '/'.$page : '';
			echo '<li><a href="'.db('website').$categorySEF.'/'.$articleSEF.$paging.'/#'.l('comment').$ordinal.'" title="'.l('comment_info').' '.retrieve('title', 'articles', 'id', $r['articleid']).'">'.$ncom.'</a></li>';
}}}}

// SEARCH FORM
# same as 1.5.31
function searchform() { ?>
	<form id="search_engine" method="post" action="<?php echo db('website'); ?>" accept-charset="<?php echo s('charset');?>">
		<p><input class="searchfield" name="search_query" type="text" id="keywords" value="<?php echo l('search_keywords'); ?>" onfocus="document.forms['search_engine'].keywords.value='';" onblur="if (document.forms['search_engine'].keywords.value == '') document.forms['search_engine'].keywords.value='<?php echo l('search_keywords'); ?>';" />
		<input class="searchbutton" name="submit" type="submit" value="<?php echo l('search_button')?>" /></p>
	</form>
<?php }

//SEARCH ENGINE
# 1.6.0 - stripslashes added in 2 strings.
function search() {
	$search_query = clean(cleanXSS($_POST['search_query']));
	echo '<h2>'.l(search_results).'</h2>';
	if (strlen($search_query) < 4 || $search_query == l('search_keywords')) {echo '<p>'.l(charerror).'</p>';}
	else {
		$keywords = explode(' ', $search_query);
		$keyCount = count($keywords);
		$query = "SELECT * FROM ".db('prefix')."articles WHERE SUBSTRING(position, 1, 1) != '2' AND published = 1 AND";
		if ($keyCount > 1) {
			for ($i = 0; $i < $keyCount - 1; $i++) {$query = $query." (title LIKE '%$keywords[$i]%' || text LIKE '%$keywords[$i]%') &&";}
			$j = $keyCount - 1;
			$query = $query." (title LIKE '%$keywords[$j]%' || text LIKE '%$keywords[$j]%')";
		}
		else {$query = $query." (title LIKE '%$keywords[0]%' || text LIKE '%$keywords[0]%')";}
		$query = $query." ORDER BY id DESC";
		$result = mysql_query($query);
		$numrows = mysql_num_rows($result);
	# 1.6.0 - stripslashes added.
		if (!$numrows) {echo '<p>'.l('noresults').' <strong>'.stripslashes($search_query).'</strong>.</p>';}
		else {
	# 1.6.0 - stripslashes added.
		echo '<p><strong>'.$numrows.'</strong> '.l('resultsfound').' <strong>'.stripslashes($search_query).'</strong>.</p>';
		while ($r = mysql_fetch_array($result)) {
			$date = date(s('date_format'), strtotime($r['date']));
			echo '<p><a href="'.db('website').find_cat_sef($r['category']).'/'.$r['seftitle'].'/">'.$r['title'].'</a> - '.$date.'</p>';
        	}
		}
	}
	echo '<p><br /><a href="'.db('website').'">'.l('backhome').'</a></p>';
	$searched = true;
}

// RSS FEED - ARTICLES/PAGES/COMMENTS
# 1.6.0 - All new function, replaces function rss() in 1.5.31.
function rss_contents($rss_item, $artSEF=''){
	header('Content-type: text/xml; charset='.s('charset').'');
	$limit = s('rss_limit');
	switch($rss_item) {
		case 'rss-articles':
			$heading = l('articles');
			$query = "articles WHERE position = 1 AND published = 1 ORDER BY date";
		break;
		case 'rss-pages':
			$heading = l('pages');
			$query = "articles WHERE position = 3 AND published = 1 ORDER BY date";
		break;
		case 'rss-comments':
			$heading = l('comments');
			$artId = retrieve('id','articles','seftitle',$artSEF);
			$articleId = ($artId && is_numeric($artId)) ? "AND articleid = $artId" : '';
			$query = "comments WHERE approved = 'True' $articleId ORDER BY id";
		break;
	}
	$header = '<?xml version="1.0" encoding="'.s('charset').'"?>';
	$header .= '<rss version="2.0">';
    $header .= '<channel>';
    $header .= '<title><![CDATA['.s('website_title').']]></title>';
    $header .= '<description><![CDATA['.$heading.']]></description>';
    $header .= '<link>'.db('website').'</link>';
    $header .= '<copyright><![CDATA[Copyright '.s('website_title').']]></copyright>';
    $header .= '<generator>sNews CMS</generator>';
    $footer = '</channel>';
    $footer .= '</rss>';
	echo $header;
	$result = mysql_query("SELECT * FROM ".db('prefix')."$query DESC LIMIT $limit");
	$numrows = mysql_num_rows($result);
	$comments_order = s('comments_order');
	$ordinal = $comments_order == 'DESC' ? 1 : $numrows;
	$comment_limit = s('comment_limit') < 1 ? 1 : s('comment_limit');
	$comments_order = s('comments_order');
	while ($r = mysql_fetch_assoc($result)) {
		switch($rss_item) {
			case 'rss-articles':
			case 'rss-pages':
				$date = date('D, d M Y H:i:s +0000', strtotime($r['date']));
				$categorySEF = find_cat_sef($r['category']);
				$articleSEF = $r['seftitle'];
				$title = $r['title'];
				$text = $r['text'];
			break;
			case 'rss-comments':
				$subquery = "SELECT * FROM ".db('prefix')."comments WHERE articleid = $r[articleid] ORDER BY id $comments_order";
				$subresult = mysql_query($subquery);
				$num = 1;
				while ($subr = mysql_fetch_array($subresult)) {
					if ($subr['id'] == $r['id']) {$ordinal = $num;}
					$num++;
				}
				$page = ceil($ordinal / $comment_limit);
				$articleSEF = retrieve('seftitle', 'articles', 'id', $r['articleid']);
				$articleCat = retrieve('category', 'articles', 'seftitle', $articleSEF);
				$articleTitle = retrieve('title', 'articles', 'id', $r['articleid']);
				$categorySEF = find_cat_sef($articleCat);
				if (!empty($articleSEF)) {
					$paging = $page > 1 ? $page.'/' : '';
					$comment_link = $paging.'#'.l('comment').$ordinal;			
				}
				$date = date('D, d M Y H:i:s +0000', strtotime($r['time']));
				$title = $articleTitle.' - '.$r['name'];
				$text = $r['comment'];
			break;
		}
		$link = db('website').$categorySEF.'/'.$articleSEF.'/'.$comment_link;
		$item  = '<item>';
		$item .= '<title><![CDATA['.strip($title).']]></title>';
		$item .= '<description><![CDATA['.strip($text).']]></description>';
		$item .= '<pubDate>'.$date.'</pubDate>';
		$item .= '<link>'.$link.'</link>';
		$item .= '<guid>'.$link.'</guid>';
		$item .= '</item>';
		echo $item;
	}
	echo $footer;
	exit;
}

// RSS FEED - LINK BUILDER
# 1.6.0 - All new function, wasn't in 1.5.31.
function rss_links(){
	echo '<li>';
	echo '<a href="rss-articles/" title="'.l('rss_articles').'">'.l('rss_articles').'</a>';
	echo '</li>';
	$page_count = retrieve('COUNT(id)','articles','position',3);
	if ($page_count > 0) {
		echo '<li>';
		echo '<a href="rss-pages/" title="'.l('rss_pages').'">'.l('rss_pages').'</a>';
		echo '</li>';
	}
	echo '<li>';
	echo '<a href="rss-comments/" title="'.l('rss_comments').'">'.l('rss_comments').'</a>';
	echo '</li>';
	$articleSEF = get_id('article');
	if ($articleSEF) {
		$articleId = retrieve('id','articles','seftitle',$articleSEF);
		$comment_count = retrieve('COUNT(id)','comments','articleid',$articleId);
		if ($comment_count > 0) {
			echo '<li>';
			echo '<a href="rss-comments/'.$articleSEF.'/" title="'.l('rss_comments_article').'">'.l('rss_comments_article').'</a>';
			echo '</li>';
}}}

// PREPARING ARTICLE FOR XML
# 1.6.0 - All new function, wasn't in 1.5.31.
function strip($text) {
	$search = array('/\[include\](.*?)\[\/include\]/', '/\[break\]/', '/</', '/>/');
	$replace = array('', '', ' <', '> ');
	$output = preg_replace($search, $replace, $text);
	$output = stripslashes(strip_tags($output));
	return $output;
}

// HTML ENTITIES
# 1.6.0 - All new function, wasn't in 1.5.31.
function entity($item) {
	$item = htmlspecialchars($item, ENT_QUOTES, s('charset'));
	return $item;
}

/*** ADMINISTRATIVE FUNCTIONS ***/

// LOGIN
# 1.6.0 - "echo" added to all html_input strings,
function login() {
	if ($_SESSION[db('website').'Logged_In'] != token()) {
		echo '<h2>'.l('login').'</h2>';
	# 1.6.0 - "administration" added to next string.
		echo html_input('form', '', 'post', '', '', '', '', '', '', '', '', '', 'post', db('website').'administration/', '');
		echo '<p>'.l('login_limit').'</p>';
		echo html_input('text', 'uname', 'uname', '', l('username'), 'text', '', '', '', '', '', '', '', '', '');
		echo html_input('password', 'pass', 'pass', '', l('password'), 'text', '', '', '', '', '', '', '', '', '');
		echo mathCaptcha();
		echo '<p>';
		echo html_input('hidden', 'Loginform', 'Loginform', 'True', '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('submit', 'submit', 'submit', l('login'), '', 'button', '', '', '', '', '', '', '', '', '');
		echo '</p></form>';
	}
	else {echo '<h2>'.l('logged_in').'</h2><p><a href="'.db('website').'logout/" title="'.l('logout').'">'.l('logout').'</a></p>';}
}

//CONTENTS COUNTER
# no change, same as 1.5.31.
function stats($field, $position) {
	if (!empty($position)) {$pos = $position == 2 ? " WHERE SUBSTRING(position, 1, 1)= '$position'" :" WHERE position = '$position'";}
	$query = 'SELECT id FROM '.db('prefix').$field.$pos;
	$result = mysql_query($query);
	$numrows = mysql_num_rows($result);
	return $numrows;
}

// FORM GENERATOR
# 1.6.0 - 1 change in last line of this function.
function html_input($type, $name, $id, $value, $label, $css, $script1, $script2, $script3, $checked, $rows, $cols, $method, $action, $legend) {
	$lbl = !empty($label) ? '<label for="'.$id.'">'.$label.'</label>' : '';
	$ID = !empty($id) ? ' id="'.$id.'"' : '';
	$style = !empty($css) ? ' class="'.$css.'"' : '';
	$js1 = !empty($script1) ? ' '.$script1 : '';
	$js2 = !empty($script2) ? ' '.$script2 : '';
	$js3 = !empty($script3) ? ' '.$script3 : '';
	$attribs = $ID.$style.$js1.$js2.$js3;
	$val = ' value="'.$value.'"';
	$input = '<input type="'.$type.'" name="'.$name.'"'.$attribs;
	switch($type) {
		case 'form': $output = (!empty($method) && $method != 'end') ? '<form method="'.$method.'" action="'.$action.'"'.$attribs.' accept-charset="'.s('charset').'">' : '</form>'; break;
		case 'fieldset': $output = (!empty($legend) && $legend != 'end') ? '<fieldset><legend'.$attribs.'>'.$legend.'</legend>' : '</fieldset>'; break;
		case 'text':
		case 'password': $output = '<p>'.$lbl.':<br />'.$input.$val.' /></p>'; break;
		case 'checkbox':
		case 'radio': $check = $checked == 'ok' ? ' checked="checked"' : ''; $output = '<p>'.$input.$check.' /> '.$lbl.'</p>'; break;
		case 'hidden':
		case 'submit':
		case 'reset':
		case 'button': $output = $input.$val.' />'; break;
		case 'textarea': $output = '<p>'.$lbl.':<br /><textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'"'.$attribs.'>'.$value.'</textarea></p>'; break;
	}
	# 1.6.0 - was "echo $output;" in 1.5.31.
	return $output;
}

// ADMINISTRATION FORM
# 1.6.0 - "echo" added to all html_input strings, and 2 others as noted.
function administration() {
	# 1. 1.6.0 - Login added to the end of this string.
	if ($_SESSION[db('website').'Logged_In'] != token()) {echo notification(1,l('err_Login'),'login');}
	else {
		foreach ($_POST as $key) {unset($_POST[$key]);}
		echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '','<a href="http://snewscms.com/" title="sNews CMS">sNews</a> '.l('administration'));
		echo '<p>'.l('categories').': <a href="admin_category/" title="'.l('add_new').'">'.l('add_new').'</a>';
		$link = ' '.l('divider').' <a href="';
		if (stats('categories','') > 0) {echo $link.'categories/" title="'.l('view').'">'.l('view').'</a>';}
		echo '</p>';
		echo '<p>'.l('articles').': <a href="article_new/" title="'.l('add_new').'">'.l('add_new').'</a>';		
		if (stats('articles',1) > 0) {echo $link.'articles/" title="'.l('view').'">'.l('view').'</a>';}
		echo '</p>';
		echo '<p>'.l('extra_contents').': <a href="extra_new/" title="'.l('add_new').'">'.l('add_new').'</a>';
		if (stats('articles',2) > 0) {echo $link.'extra_contents/" title="'.l('view').'">'.l('view').'</a>';}
		echo '</p>';
		echo '<p>'.l('pages').': <a href="page_new/" title="'.l('add_new').'">'.l('add_new').'</a>';
		if (stats('articles',3) > 0) {echo $link.'pages/" title="'.l('view').'">'.l('view').'</a>';}
		echo '</p></fieldset>';
		$query_comm = "SELECT * FROM ".db('prefix')."comments WHERE approved <> 'True'";
		$result_comm = mysql_query($query_comm);
		$unapproved = mysql_num_rows($result_comm);
		if ($unapproved > 0) {
			echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', l('comments'));
			echo '<p><a onclick="toggle(\'sub1\')" style="cursor: pointer;" title="'.l('unapproved').'">'.$unapproved.' '.l('wait_approval').'</a></p>';
			echo '<div id="sub1" style="display: none;">';
			while ($r = mysql_fetch_array($result_comm)) {
	# 2. 1.6.0 - new $articleTITLE string.
		$articleTITLE = retrieve(title, articles, id, $r['articleid']);
				echo '<p>'.$r['name'].' (<strong>'.$articleTITLE.'</strong>) '.l('divider').' <a href="'.db('website').'index.php?action=editcomment&amp;commentid='.$r['id'].'">'.l('edit').'</a></p>';
			}
			echo '</div>';
		}
		if ($unapproved > 0) {echo '</fieldset>';}
		echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', l('site_settings'));
		echo '<p><a href="settings/" title="'.l('settings').'">'.l('settings').'</a></p>';
		echo '<p><a href="files/" title="'.l('files').'">'.l('files').'</a></p></fieldset>';
		echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', l('login_status'));
		echo '<p><a href="logout/" title="'.l('logout').'">'.l('logout').'</a></p></fieldset>';
}}

// SETTINGS FORM
# 1.6.0 - only significant change appears to be addition of "echo" to all html_input strings function-wide.
function settings() {
	echo html_input('form', '', '', '', '', '', '', '', '', '', '', '', 'post', 'index.php?action=process&amp;task=save_settings', '');
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '','<a title="'.l('settings').'" onclick="toggle(\'sub1\')" style="cursor: pointer;">'.l('settings').'</a>');
	echo '<div id="sub1" style="display: none;">';
	echo html_input('text', 'website_title', 'webtitle', s('website_title'), l('a_website_title'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('text', 'home_sef', 'webSEF', s('home_sef') == '' ? l('home_sef') : s('home_sef'), l('a_home_sef'), '', 'onkeypress="return SEFrestrict(event);"', '', '', '', '', '', '', '', '');
	echo html_input('text', 'website_description', 'wdesc', s('website_description'), l('a_description'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('text', 'website_keywords', 'wkey', s('website_keywords'), l('a_keywords'), '', '', '', '', '', '', '', '', '', '');
	echo '</div></fieldset>';
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', '<a title="'.l('a_contact_info').'" onclick="toggle(\'sub2\')" style="cursor: pointer;">'.l('a_contact_info').'</a>');
	echo '<div id="sub2" style="display: none;">';
	echo html_input('text', 'website_email', 'we', s('website_email'), l('a_website_email'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('text', 'contact_subject', 'cs', s('contact_subject'), l('a_contact_subject'), '', '', '', '', '', '', '', '', '', '');
	echo '</div></fieldset>';
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', '<a title="'.l('a_time_settings').'" onclick="toggle(\'sub3\')" style="cursor: pointer;">'.l('a_time_settings').'</a>');
	echo '<div id="sub3" style="display: none;">';
	echo html_input('text', 'language', 'lang', s('language') == '' ? 'EN' : s('language'), l('a_language'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('text', 'charset', 'char', s('charset') == '' ? 'UTF-8' : s('charset'), l('charset'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('text', 'date_format', 'dt', s('date_format'), l('a_date_format'), '', '', '', '', '', '', '', '', '', '');
	echo '</div></fieldset>';
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '','<a title="'.l('contents').'" onclick="toggle(\'sub4\')" style="cursor: pointer;">'.l('contents').'</a>');
	echo '<div id="sub4" style="display: none;">';
	echo html_input('text', 'article_limit', 'artl', s('article_limit'), l('a_article_limit'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('text', 'rss_limit', 'rssl', s('rss_limit'), l('a_rss_limit'), '', '', '', '', '', '', '', '', '', '');
	echo '<p><label for="dp">'.l('a_display_page').':</label> <select name="display_page" id="dp">';
	echo '<option value="0"'.(s('display_page') == 0 ? ' selected="selected"' : '').'>'.l('none').'</option>';
	$query = "SELECT * FROM ".db('prefix')."articles WHERE position = 3 ORDER BY id ASC"; 
	$result = mysql_query($query);
	while ($r = mysql_fetch_array($result)) { 
		echo '<option value="'.$r['id'].'"';
		if (s('display_page') == $r['id']) {echo ' selected="selected"';}					
		echo '>'.$r['title'].'</option>';
	}
	echo '</select></p>';
	echo html_input('checkbox', 'display_new_on_home', 'dnoh', '', l('a_display_new_on_home'), '', '', '', '', (s('display_new_on_home') == 'on' ? 'ok' : ''), '', '', '', '', '');
	echo html_input('checkbox', 'display_pagination', 'dpag', '', l('a_display_pagination'), '', '', '', '', (s('display_pagination') == 'on' ? 'ok' : ''), '', '', '', '', '');
	echo html_input('checkbox', 'num_categories', 'nc', '', l('a_num_categories'), '', '', '', '', (s('num_categories') == 'on' ? 'ok' : ''), '', '', '', '', '');
	echo '</div></fieldset>';
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', '<a title="'.l('comments').'" onclick="toggle(\'sub5\')" style="cursor: pointer;">'.l('comments').'</a>');
	echo '<div id="sub5" style="display: none;">';
	echo html_input('checkbox', 'approve_comments', 'ac', '', l('a_approve_comments'), '', '', '', '', (s('approve_comments') == 'on' ? 'ok' : ''), '', '', '', '', '');
	echo '<p><label for="co">'.l('a_comments_order').':</label><br /><select id="co" name="comments_order">';
	echo '<option value="DESC"'.(s('comments_order') == 'DESC' ? ' selected="selected"' : '').'>'.l('newer_top').'</option>';
	echo '<option value="ASC"'.(s('comments_order') == 'ASC' ? ' selected="selected"' : '').'>'.l('newer_bottom').'</option></select></p>';
	echo html_input('text', 'comment_limit', 'cl', s('comment_limit'), l('a_comment_limit'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('checkbox', 'word_filter_enable', 'wfe', '', l('a_word_filter_enable'), '', '', '', '', (s('word_filter_enable') == 'on' ? 'ok' : ''), '', '', '', '', '');
	echo html_input('text', 'word_filter_file', 'wff', s('word_filter_file'), l('a_word_filter_file'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('text', 'word_filter_change', 'wfc', s('word_filter_change'), l('a_word_filter_change'), '', '', '', '', '', '', '', '', '', '');
	echo '</div></fieldset><p>';
	echo html_input('submit', 'save', 'save', l('save'), '', 'button', '', '', '', '', '', '', '', '', '');
	echo '</p></form>';

	//Change Username & Password sub-panel
	echo html_input('form', '', '', '', '', '', '', '', '', '', '', '', 'post', 'index.php?action=process&amp;task=changeup', '');
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', '<a title="'.l('change_up').'" onclick="toggle(\'sub6\')" style="cursor: pointer;">'.l('change_up').'</a>');
	echo '<div id="sub6" style="display: none;">';
	echo '<p>'.l('login_limit').'</p>';
	echo html_input('text', 'uname', 'uname', '', l('a_username'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('password', 'pass1', 'pass1', '', l('a_password'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('password', 'pass2', 'pass2', '', l('a_password2'), '', '', '', '', '', '', '', '', '', '');
	echo '<p>';
	echo html_input('hidden', 'task', 'task', 'changeup', '', '', '', '', '', '', '', '', '', '', '');
	echo html_input('submit', 'submit_pass', 'submit_pass', l('save'), '', 'button', '', '', '', '', '', '', '', '', '');
	echo '</p></div></fieldset></form>';
}

// CATEGORIES FORM
# 1.6.0 - addition of "echo" to all html_input strings function-wide.
function form_categories() {
	if (isset($_GET['id']) && is_numeric($_GET['id']) && !is_null($_GET['id'])) {
		$categoryid = $_GET['id'];
		$query = mysql_query("SELECT * FROM ".db('prefix')."categories WHERE id='$categoryid'");
		$r = mysql_fetch_array($query);
		$frm_action = db('website').'index.php?action=process&amp;task=admin_category&amp;id='.$categoryid;
		$frm_add_edit = l('edit');
		$frm_name = $r['name'];
		$frm_sef_title = $r['seftitle'];
		$frm_description = $r['description'];
		$frm_publish = $r['published'] == 'YES' ? 'ok' : '';
		$frm_task = 'edit_category';
		$frm_submit = l('edit');
	}
	else {
		$frm_action = db('website').'index.php?action=process&amp;task=admin_category';
		$frm_add_edit = l('add_category');
		$frm_name = $_POST['name'];
		$frm_sef_title = $_POST['name'] == '' ? cleanSEF($_POST['name']) : cleanSEF($_POST['seftitle']);
		$frm_description = '';
		$frm_publish = 'ok';
		$frm_task = 'add_category';
		$frm_submit = l('add_category');
	}
	echo html_input('form', '', 'post', '', '', '', '', '', '', '', '', '', 'post', $frm_action, '');
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', $frm_add_edit);
	echo html_input('text', 'name', 't', $frm_name, l('name'), '', 'onchange="genSEF(this,document.forms[\'post\'].seftitle)"', 'onkeyup="genSEF(this,document.forms[\'post\'].seftitle)"', '', '', '', '', '', '', '');
	echo html_input('text', 'seftitle', 's', $frm_sef_title, l('sef_title_cat'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('text', 'description', 'desc', $frm_description, l('description'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('checkbox', 'publish', 'pub', 'YES', l('publish_category'), '', '', '', '', $frm_publish, '', '', '', '', '');
	echo '</fieldset><p>';
	echo html_input('hidden', 'task', 'task', 'admin_category', '', '', '', '', '', '', '', '', '', '', '');
	echo html_input('submit', $frm_task, $frm_task, $frm_submit, '', 'button', '', '', '', '', '', '', '', '', '');
	if (!empty($categoryid)) {
		echo '&nbsp;&nbsp;';
		echo html_input('hidden', 'id', 'id', $categoryid, '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('submit', 'delete_category', 'delete_category', l('delete'), '', 'button', 'onclick="javascript: return pop()"', '', '', '', '', '', '', '', '');
	}
	echo '</p></form>';
	$query = "SELECT * FROM ".db('prefix')."categories WHERE published = 'YES' ORDER BY catorder ASC"; 
	$result = mysql_query($query);
	$numrows = mysql_num_rows($result);
	if ($numrows > 1) {
		echo html_input('form', '', '', '', '', '', '', '', '', '', '', '', 'post', 'index.php?action=process&amp;task=order_category', '');
		echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', l('category_order'));
		$counter = 0;
		while ($r = mysql_fetch_array($result)) {
			echo '<p><input name="catorder['.$counter.']" type="text" id="cat'.$r['id'].'" value="'.$r['catorder'].'" size="1" /> <label for="cat'.$r['id'].'">'.$r['name'].'</label><input type="hidden" name="counter_id['.$counter.']" value="'.$r['id'].'" /></p>';
			$counter++;
		}
		echo '</fieldset><p>';
		echo html_input('hidden', 'counter', 'counter', $counter, '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('submit', 'order_category', 'order_category', l('order_category'), '', 'button', '', '', '', '', '', '', '', '', '');
		echo '</p></form>';
}}

// ARTICLES - POSTING TIME
# no changes, same as 1.5.31.
function posting_time($time='') {
	echo '<p>'.l('day').':<select name="fposting_day">';
	$thisDay = !empty($time) ? substr($time, 8, 2) : intval(date('d'));
	for($i = 1; $i < 32; $i++) {
		echo '<option value="'.$i.'"';
		if($i == $thisDay) {echo ' selected="selected"';}
		echo '>'.$i.'</option>';
	}
	echo '</select>'.l('month').':<select name="fposting_month">';
	$thisMonth = !empty($time) ? substr($time, 5, 2) : intval(date('m'));
	for($i = 1; $i < 13; $i++) {
		echo '<option value="'.$i.'"';
		if($i == $thisMonth) {echo ' selected="selected"';}
		echo '>'. $i .'</option>';
	}
	echo '</select>'.l('year').':<select name="fposting_year">';
	$thisYear = !empty($time) ? substr($time, 0, 4) : intval(date('Y'));
	for($i = $thisYear; $i < $thisYear + 3; $i++) {
		echo '<option value="'.$i.'"';
		if($i == $thisYear) {echo ' selected="selected"';}
		echo '>'.$i.'</option>';
	}
	echo '</select>'.l('hour').':<select name="fposting_hour">';
	$thisHour = !empty($time) ? substr($time, 11, 2) : intval(date('H'));
	for($i = 0; $i < 24; $i++) {
		echo '<option value="'.$i.'"';
		if($i == $thisHour) {echo ' selected="selected"';}
		echo '>'.$i.'</option>';
	}
	echo '</select>'.l('minute').':<select name="fposting_minute">';
	$thisMinute = !empty($time) ? substr($time, 14, 2) : intval(date('i'));
	for($i = 0; $i < 60; $i++) {
		echo '<option value="'.$i.'"';
		if($i == $thisMinute) {echo ' selected="selected"';}
		echo '>'.$i.'</option>';
	}
	echo '</select></p>';
}

// ARTICLES FORM
# 1.6.0 - addition of "extra" to all html_input strings and a syntax fix applied to 2 strings 24 lines up from function bottom.
function form_articles($contents) {
	if (is_numeric($_GET['id']) && !is_null($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysql_query("SELECT * FROM ".db('prefix')."articles WHERE id='$id'");
		$r = mysql_fetch_array($query);
		$article_category = $r['category'];
		# Patch/fix applied - Oct.08.07
		$edit_option = substr($r['position'], 0, 1) > 0 ? substr($r['position'], 0, 1) : 1;
		# un-patched string
		// $edit_option = substr($r['position'], 0, 1);
		$edit_page = substr($r['position'], 2);
		switch ($edit_option) {
			case 1: $frm_fieldset = l('edit').' '.l('article'); $frm_position1 = 'selected="selected"'; break;
			case 2: $frm_fieldset = l('edit').' '.l('extra_contents'); $frm_position2 = 'selected="selected"'; break;
			case 3: $frm_fieldset = l('edit').' '.l('page'); $frm_position3 = 'selected="selected"'; break;
		}
		$frm_action = db('website').'index.php?action=process&amp;task=admin_article&amp;id='.$id;
		$frm_title = $_SESSION['temp']['title'] ? $_SESSION['temp']['title'] : $r['title'];
		$frm_sef_title = $_SESSION['temp']['seftitle'] ? cleanSEF($_SESSION['temp']['seftitle']) : $r['seftitle'];
		$frm_text = str_replace('&', '&amp;', $_SESSION['temp']['text'] ? $_SESSION['temp']['text'] : $r['text']);
		$frm_meta_desc = $_SESSION['temp']['description_meta'] ? cleanSEF($_SESSION['temp']['description_meta']) : $r['description_meta'];
		$frm_meta_key = $_SESSION['temp']['keywords_meta'] ? cleanSEF($_SESSION['temp']['keywords_meta']) : $r['keywords_meta'];
		$frm_display_title = $r['displaytitle'] == 'YES' ? 'ok' : '';
		$frm_display_info = $r['displayinfo'] == 'YES' ? 'ok' : '';
		$frm_publish = $r['published'] == 1 ? 'ok' : '';
		$frm_commentable = ($r['commentable'] == 'YES' || $r['commentable'] == 'FREEZ') ? 'ok' : '';
		$frm_task = 'edit_article';
		$frm_submit = l('edit');
	} else {
		switch ($contents) {
			case 'article_new': $frm_fieldset = l('article_new'); $pos = 1; $frm_position1 = 'selected="selected"'; break;
			case 'extra_new': $frm_fieldset = l('extra_new'); $pos = 2; $frm_position2 = 'selected="selected"'; break;
			case 'page_new': $frm_fieldset = l('page_new'); $pos = 3; $frm_position3 = 'selected="selected"'; break;
		}
		if (empty($frm_fieldset)) { $frm_fieldset =  l('article_new'); }
		$frm_action = db('website').'index.php?action=process&amp;task=admin_article';
		$frm_title = $_SESSION['temp']['title'];
		$frm_sef_title = cleanSEF($_SESSION['temp']['seftitle']);
		$frm_text = $_SESSION['temp']['text'];
		$frm_meta_desc = cleanSEF($_SESSION['temp']['description_meta']);
		$frm_meta_key = cleanSEF($_SESSION['temp']['keywords_meta']);
		$frm_display_title = 'ok';
		$frm_display_info = ($contents == 'extra_new') ? '' : 'ok';
		$frm_publish = 'ok';
		$frm_commentable = ($contents == 'extra_new' || $contents == 'page_new') ? '' : 'ok';
		$frm_task = 'add_article';
		$frm_submit = l('submit');
	}
	echo '<div>';
	echo html_input('form', '', 'post', '', '', '', '', '', '', '', '', '', 'post', $frm_action, '');
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', $frm_fieldset);
	echo html_input('text', 'title', 'at', $frm_title, l('title'), '', 'onchange="genSEF(this,document.forms[\'post\'].seftitle)"', 'onkeyup="genSEF(this,document.forms[\'post\'].seftitle)"', '', '', '', '', '', '', '');
	if ($contents == 'extra_new' || $edit_option == 2) {
		echo '<div style="display: none;">';
		echo html_input('text', 'seftitle', 'as', $frm_sef_title, l('sef_title'), '', '', '', '', '', '', '', '', '', '');
		echo '</div>';
	} else {
	echo html_input('text', 'seftitle', 'as', $frm_sef_title, l('sef_title'), '', '', '', '', '', '', '', '', '', '');}
	echo html_input('textarea', 'text', 'txt', $frm_text, l('text'), '', '', '', '', '', '2', '100', '', '', '');
	echo '<p>';
	echo html_input('button', 'strong', '', 'B', '', 'button', 'onclick="tag(\'strong\')"', '', '', '', '', '', '', '', '');
	echo html_input('button', 'em', '', 'I', '', 'button', 'onclick="tag(\'em\')"', '', '', '', '', '', '', '', '');
	echo html_input('button', 'del', '', 'Strike', '', 'button', 'onclick="tag(\'del\')"', '', '', '', '', '', '', '', '');
	echo html_input('button', 'p', '', 'P', '', 'button', 'onclick="tag(\'p\')"', '', '', '', '', '', '', '', '');
	echo html_input('button', 'br', '', 'BR', '', 'button', 'onclick="tag(\'br\')"', '', '', '', '', '', '', '', '');
	echo html_input('button', 'break', '', 'Break', '', 'button', 'onclick="tag(\'break\')"', '', '', '', '', '', '', '', '');
	echo html_input('button', 'img', '', 'Image', '', 'button', 'onclick="tag(\'img\')"', '', '', '', '', '', '', '', '');
	echo html_input('button', 'link', '', 'Link', '', 'button', 'onclick="tag(\'link\')"', '', '', '', '', '', '', '', '');
	echo html_input('button', 'include', '', 'Include', '', 'button', 'onclick="tag(\'include\')"', '', '', '', '', '', '', '', '');
	echo '</p>';
	if ($contents == 'article_new' || $edit_option == 1) {
		echo html_input('checkbox', 'publish_article', 'pu', 'YES', l('publish_article'), '', '', '', '', $frm_publish, '', '', '', '', '');
	}
	echo '</fieldset>';
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', '<a title="'.l('preview').'" onclick="toggle(\'preview\')" style="cursor: pointer;">'.l('preview').'</a>');
	echo '<div id="preview" style="display: none;"></div></fieldset>';
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', '<a title="'.l('customize').'" onclick="toggle(\'customize\')" style="cursor: pointer;">'.l('customize').'</a>');
	echo '<div id="customize" style="display: none;">';
	if ($contents != 'page_new' && $edit_option != 3) {
		echo '<p><label for="cat">';
		echo ($contents == 'extra_new' || $edit_option == 2) ?  l('appear_category') : l('category');
		$dependancy = $contents == 'extra_new' ? 'onchange="dependancy();"' : '';
		echo ':</label><br /><select name="define_category" id="cat" '.$dependancy.'>';
		if ($contents == 'extra_new' || $edit_option == 2) {echo '<option value="-1"'.($article_category == -1 ? ' selected="selected"' : '').'>'.l('all').'</option>';}
		echo '<option value="0"'.(($article_category == 0 && $contents != 'extra_new') ? ' selected="selected"' : '').'>'.l('home').'</option>';
		$category_query = "SELECT * FROM ".db('prefix')."categories WHERE published = 'YES' ORDER BY catorder ASC"; 
		$category_result = mysql_query($category_query);
		while ($cat = mysql_fetch_array($category_result)) { 
			echo '<option value="'.$cat['id'].'"';
			if ($article_category == $cat['id']) {echo ' selected="selected"';}					
			echo '>'.$cat['name'].'</option>';
		}
		echo '</select></p>';
		if ($contents == 'extra_new' || $edit_option == 2) {
			echo '<p id="def_page"><label for="dp">'.l('appear_page').':</label><br /><select name="define_page" id="dp">';
			echo '<option value="0"'.($edit_option != '2' ? ' selected="selected"' : '').'>'.l('all').'</option>';
			$query = "SELECT * FROM ".db('prefix')."articles WHERE position = 3 ORDER BY id ASC"; 
			$result = mysql_query($query);
			while ($r = mysql_fetch_array($result)) { 
				echo '<option value="'.$r['id'].'"';
				if ($edit_page == $r['id']) {echo ' selected="selected"';}					
				echo '>'.$r['title'].'</option>';
			}
			echo '</select></p>';
		}	
	}
	if (!empty($id)) {
		echo '<p><label for="pos">'.l('position').':</label><br /><select name="position" id="pos">';
		echo '<option value="1"'.$frm_position1.'>'.l('center').'</option>';
		echo '<option value="2"'.$frm_position2.'>'.l('side').'</option>';
		echo '<option value="3"'.$frm_position3.'>'.l('display_page').'</option>';
		echo '</select></p>';
	}
	else {echo html_input('hidden', 'position', 'position', $pos, '', '', '', '', '', '', '', '', '', '', '');}
	if ($contents != 'extra_new' && $edit_option != '2') {
		echo html_input('text', 'description_meta', 'dm', $frm_meta_desc, l('description_meta'), '', '', '', '', '', '', '', '', '', '');
		echo html_input('text', 'keywords_meta', 'km', $frm_meta_key, l('keywords_meta'), '', '', '', '', '', '', '', '', '', '');
	}
	echo html_input('checkbox', 'display_title', 'dt', 'YES', l('display_title'), '', '', '', '', $frm_display_title, '', '', '', '', '');
	if ($contents != 'extra_new' && $edit_option != '2') {
		echo html_input('checkbox', 'display_info', 'di', 'YES', l('display_info'), '', '', '', '', $frm_display_info, '', '', '', '', '');
		echo html_input('checkbox', 'commentable', 'ca', 'YES', l('enable_commenting'), '', '', '', '', $frm_commentable, '', '', '', '', '');
		if (!empty($id)) {
			echo '<p><input name="freeze" type="checkbox" id="fc"';
	# 1.6.0 - syntax fix at ends of next 2 strings.
			if ($r['commentable'] == 'FREEZ') {echo ' checked="checked" />';}
			else if ($r['commentable'] == 'YES') {echo ' />';}
			else{echo ' />';} // Patch/fix - Oct.08.07
			echo ' <label for="fc"> '.l('freeze_comments').'</label></p>';
		}
	}
	echo '</div></fieldset>';
	if ($contents == 'article_new' || $edit_option == 1) {
		echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', '<a title="'.l('publish_date').'" onclick="toggle(\'admin_publish_date\')" style="cursor: pointer;">'.l('publish_date').'</a>');
		echo '<div id="admin_publish_date" style="display: none;">';
		echo html_input('checkbox', 'fposting', 'fp', 'YES', l('enable'), '', '', '', '', '', '', '', '', '', '');
		echo '<p>'.l('server_time').': '.date('d.m.Y. H:i:s').'</p>';
		echo '<p>'.l('article_date').'</p>';
		!empty($id) ? posting_time($r['date']) : posting_time();
		echo '</div></fieldset>';
	}
	echo '<p>';
	echo html_input('hidden', 'task', 'task', 'admin_article', '', '', '', '', '', '', '', '', '', '', '');
	echo html_input('submit', $frm_task, $frm_task, $frm_submit, '', 'button', '', '', '', '', '', '', '', '', '');
	if (!empty($id)) {
		echo html_input('hidden', 'id', 'id', $id, '', '', '', '', '', '', '', '', '', '', '');
		echo html_input('submit', 'delete_article', 'delete_article', l('delete'), '', 'button', 'onclick="javascript: return pop()"', '', '', '', '', '', '', '', '');
	}
	echo '</p></form></div>';
}

// ARTICLES - ADMIN LIST
# no changes, same as 1.5.31.
function admin_articles($contents) {
	switch ($contents) {
	        # Patch/fix applied - Oct.08.07
	        case 'article_view': $title = l('articles'); $subquery = "WHERE position < 2 AND position >-1 "; break;
	        # un-patched string
		// case 'article_view': $title = l('articles'); $subquery = "WHERE position = 1"; break;
		case 'extra_view': $title = l('extra_contents'); $subquery = "WHERE SUBSTRING(position,1,1) = '2'"; break;
		case 'page_view': $title = l('pages'); $subquery = "WHERE position = 3"; break;
	}
	echo '<fieldset><legend>'.$title.'</legend>';
	$query = "SELECT * FROM ".db('prefix')."articles $subquery ORDER BY date DESC";
	$result = mysql_query($query);
	if (!$result || !mysql_num_rows($result)) {echo '<p>'.l('article_not_exist').'</p>';}
	else {
		$i = 0;
  		while ($r = mysql_fetch_array($result)) {
			$articleSEF = $contents != 'extra_view' ? $r['seftitle'].'/' : '';
			echo '<p>'.date(s('date_format'), strtotime($r['date'])).' <strong>'.$r['title'].'</strong> '.l('divider').' <a href="'.db('website').find_cat_sef($r['category']).'/'.$articleSEF.'">'.l('view').'</a> ';
			echo  l('divider').' <a href="'.db('website').'index.php?action=admin_article&amp;id='.$r['id'].'">'.l('edit').'</a> ';
    		if ($r['published'] == 2) {echo  l('divider').' ['.l('status').' '.l('future_posting').']';}
			if ($r['published'] == 0) {echo  l('divider').' ['.l('status').' '.l('unpublished').']';}
			echo '</p>';
			$i++;
		}
		echo '</fieldset>';
}}

//CATEGORIES - ADMIN LIST
# no changes, same as 1.5.31.
function admin_categories() {
	echo '<fieldset><legend>'.l('categories').'</legend>';
	$query = "SELECT * FROM ".db('prefix')."categories ORDER BY catorder ASC";
	$result = mysql_query($query);
	if (!$result || !mysql_num_rows($result)) {echo '<p>'.l('category_not_exist').'</p>';}
	else {
		while ($r = mysql_fetch_array($result)) {
			echo '<p><strong>'.$r['name'].'</strong> '.l('divider').' <a href="'.db('website').'index.php?action=admin_category&amp;id='.$r['id'].'" title="'.$r['description'].'">'.l('edit').'</a> ';
    		echo $r['published'] != 'YES' ? ' '.l('divider').' ['.l('status').' '.l('unpublished').']' : '';
			echo '</p>';
		}
	}
	echo '</fieldset>';
}

// COMMENTS - EDIT
# 1.6.0 - Only 1 new string and "echo" on all html_input strings.
function edit_comment() {
	echo '<h2>'.l('edit_comment').'</h2>';
	$commentid = $_GET['commentid'];
	$query = mysql_query("SELECT * FROM ".db('prefix')."comments WHERE id='$commentid'");
	$r = mysql_fetch_array($query);
	# 1.6.0 - variable added for use in 2nd html_input string.
	$articleTITLE = retrieve(title, articles, id, $r['articleid']);
	echo html_input('form', '', 'post', '', '', '', '', '', '', '', '', '', 'post', 'index.php?action=process&amp;task=editcomment&amp;id='.$commentid, '');
	echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', l('edit_comment').' (<strong>'.$articleTITLE.'</strong>)');
	echo html_input('textarea', 'editedcomment', 'ec', stripslashes($r['comment']), l('comment'), '', '', '', '', '', '2', '100', '', '', '');
	echo html_input('text', 'name', 'n', $r['name'], l('name'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('text', 'url', 'url', $r['url'], l('url'), '', '', '', '', '', '', '', '', '', '');
	echo html_input('checkbox', 'approved', 'a', '', l('approved'), '', '', '', '', $r['approved'] == 'True' ? 'ok' : '', '', '', '', '', '');
	echo '<p>';
	echo html_input('hidden', 'id', 'id', $r['articleid'], '', '', '', '', '', '', '', '', '', '', '');
	echo html_input('submit', 'submit_text', 'submit_text', l('edit'), '', 'button', '', '', '', '', '', '', '', '', '');
	echo html_input('hidden', 'commentid', 'commentid', $r['id'], '', '', '', '', '', '', '', '', '', '', '');
	echo html_input('submit', 'delete_text', 'delete_text', l('delete'), '', 'button', 'onclick="javascript: return pop()"', '', '', '', '', '', '', '', '');
	echo '</p></fieldset></form>';
}

/*** PROCESSING (CATEGORIES, CONTENTS, COMMENTS) ***/
# 7 changes noted, plus several minor syntax fixes.
function processing() {
	# 1) 1.6.0 - "1," added before the lang def. in next string.
	if ($_SESSION[db('website').'Logged_In'] != token()) {echo notification(1,l('error_not_logged_in'),'home');}
	else {
	$action = clean(cleanXSS($_GET['action']));
  	$id = clean(cleanXSS($_GET['id']));
  	$commentid = $_POST['commentid'];
  	$approved = $_POST['approved'] == 'on' ? 'True' : '';
  	# 2) 1.6.0 - next string shortened.
  	$name = clean(entity($_POST['name']));
  	$category = $_POST['define_category'];
  	# 3) 1.6.0 - minor change next string.
  	$description = clean(entity($_POST['description']));
  	# 4) 1.6.0 - next string shortened.
  	$title = clean(entity($_POST['title']));
  	$seftitle = $_POST['seftitle'];
	$url = cleanXSS($_POST['url']);
	$comment = str_replace("\'", "&#39;", $_POST['editedcomment']);
	# Patch/fix applied - Oct.08.07
	$text = clean($_POST['text']);
	# un-patched string
	//$text = $_POST['text'];
  	$date = date('Y-m-d H:i:s');
  	# 5) 1.6.0 - next 2 strings shortened.
  	$description_meta = entity($_POST['description_meta']);
	$keywords_meta = entity($_POST['keywords_meta']);
  	$display_title = $_POST['display_title'] == 'on' ? 'YES' : 'NO';
	$display_info = $_POST['display_info'] == 'on' ? 'YES' : 'NO';
  	$commentable = $_POST['commentable'] == 'on' ? 'YES' : 'NO';
	$freez = $_POST['freeze'] == 'on' ? 'YES' : 'NO';
  	if ($freez == 'YES' && $commentable == 'YES') {$commentable = 'FREEZ';}
	$position = $_POST['position'];
	if ($position == 2) {$position = $_POST['cat_dependant'] == 'on' ? 21 : 2;}
  	$publish_article = ($_POST['publish_article'] == 'on' || $position > 1) ? 1 : 0;
  	$publish_category = $_POST['publish'] == 'on' ? 'YES' : 'NO';
  	$fpost_enabled = false;
    if($_POST['fposting'] == 'on') {
		$fpost_enabled = true;
		$publish_article = 2;
		$date = $_POST['fposting_year'].'-'.$_POST['fposting_month'].'-'.$_POST['fposting_day'].' '.$_POST['fposting_hour'].':'.$_POST['fposting_minute'].':00';
    }
    $task = clean(cleanXSS($_GET['task']));
	switch ($task) {
		case 'save_settings':
			if (isset($_POST['save'])) {
				$website_title = $_POST['website_title'];
	    		$home_sef = $_POST['home_sef'];
				$website_description = $_POST['website_description'];
				$website_keywords = $_POST['website_keywords'];
				$website_email = $_POST['website_email'];
	    		$contact_subject = $_POST['contact_subject'];
				$language = $_POST['language'];
				$charset = $_POST['charset'];
				$date_format = $_POST['date_format'];
				$article_limit = $_POST['article_limit'];
				$rss_limit = $_POST['rss_limit'];
				$display_page = $_POST['display_page'];
				$display_new_on_home = $_POST['display_new_on_home'];
				$display_pagination = $_POST['display_pagination'];
				$num_categories = $_POST['num_categories'];
				$approve_comments = $_POST['approve_comments'];
				$comments_order = $_POST['comments_order'];
				$comment_limit = $_POST['comment_limit'];
				$word_filter_enable = $_POST['word_filter_enable'];
				$word_filter_file = $_POST['word_filter_file'];
				$word_filter_change = $_POST['word_filter_change'];				
				$ufield = array('website_title' => $website_title,'home_sef' => $home_sef,'website_description' => $website_description,'website_keywords' => $website_keywords,'website_email' => $website_email,'contact_subject' => $contact_subject,'language' => $language,'charset' => $charset,'date_format' => $date_format,'article_limit' => $article_limit,'rss_limit' => $rss_limit,'display_page' => $display_page,'comments_order' => $comments_order,'comment_limit' => $comment_limit,'word_filter_file' => $word_filter_file,'word_filter_change' => $word_filter_change,'display_new_on_home' => $display_new_on_home,'display_pagination' => $display_pagination,'num_categories' => $num_categories,'approve_comments' => $approve_comments,'word_filter_enable' => $word_filter_enable,);
	/* # 6) 1.6.0 -  Five - mysql_query($query_begin."
		 strings in 1.5.31 have now been incorporated in the $ufield array string above.
	------------------------------------------------------------------------------------------ */
				while (list($key, $value) = each($ufield)) {
				mysql_query("UPDATE ".db('prefix')."settings SET VALUE = '$value' WHERE name = '$key' LIMIT 1;");}
				$query_begin = "UPDATE ".db('prefix')."settings SET VALUE = ";
				echo notification(0,'','settings');
			}
		break;
		case 'changeup':
			if (isset($_POST['submit_pass'])) {
				$user = checkUserPass($_POST['uname']);
				$pass1 = checkUserPass($_POST['pass1']);
				$pass2 = checkUserPass($_POST['pass2']);
	# 7) 1.6.0 - $secret = checkUserPass($_POST['secret']); in 1.5.31 is replaced here with next 3 strings:
				if ($user && $pass1 && $pass2 && $pass1 === $pass2) {
					$uname = md5($user);
					$pass = md5($pass2);
					$query = "UPDATE ".db('prefix')."settings SET VALUE=";
					mysql_query($query."'$uname' WHERE name='username' LIMIT 1;");
					mysql_query($query."'$pass' WHERE name='password' LIMIT 1;");
					echo notification(0,'','administration');
        		}
				else {echo notification(1,l('pass_mismatch'),'settings');}
			}
		break;
		case 'admin_category':
			switch(true) {
				case(empty($name)): echo notification(1,l('err_TitleEmpty').l('errNote')); form_categories(); break;
				case(empty($seftitle)): echo notification(1,l('err_SEFEmpty').l('errNote')); form_categories(); break;
				case(check_if_unique('category_name', $name, $id)): echo notification(1,l('err_TitleExists').l('errNote')); form_categories(); break;
				case(check_if_unique('category_seftitle', $seftitle, $id)): echo notification(1,l('err_SEFExists').l('errNote')); form_categories(); break;
				case(cleancheckSEF($seftitle) == 'notok'): echo notification(1,l('err_SEFIllegal').l('errNote')); form_categories(); break;
				default:
					switch(true) {
						case(isset($_POST['add_category'])):
						mysql_query("INSERT INTO ".db('prefix')."categories(name, seftitle, description, published) VALUES('$name', '$seftitle', '$description', '$publish_category')");
						break;
						case(isset($_POST['edit_category'])):
						mysql_query("UPDATE ".db('prefix')."categories SET name = '$name', seftitle = '$seftitle', description = '$description', published = '$publish_category' WHERE id = $id LIMIT 1;");
						break;
						case(isset($_POST['delete_category'])):
						mysql_query("DELETE FROM ".db('prefix')."categories WHERE id = $id LIMIT 1;");
						break;
					}
					echo notification(0,'','categories');
				}
		break;
		case 'order_category':
			if (isset($_POST['order_category'])) {
				$counter = $_POST['counter'];
				for($i = 0; $i < $counter; $i++) {
					$category_order = $_POST['catorder'][$i];
					$counter_id = $_POST['counter_id'][$i];
					if (empty($category_order) || !is_numeric($category_order)) {$category_order = 0;}
					mysql_query("UPDATE ".db('prefix')."categories SET catorder = '$category_order' WHERE id = '$counter_id' LIMIT 1;");
				}
				echo notification(0,'','categories');
			}
		break;
		case 'admin_article':
			if (substr($position, 0, 1) == 2) {
				$category = $_POST['define_category'];
				$page = $_POST['define_page'];
				if ($category != -1) {$position = '21'.$category;}
				else if ($page != 0) {$position = '22'.$page; $category = -1;}
			}
			$_SESSION['temp']['title'] = $title; $_SESSION['temp']['seftitle'] = $seftitle; $_SESSION['temp']['text'] = $text;
			switch(true) {
				case(empty($title)): echo notification(1,l('err_TitleEmpty').l('errNote')); form_articles(''); unset($_SESSION['temp']); break;
				case(empty($seftitle)): echo notification(1,l('err_SEFEmpty').l('errNote')); $_SESSION['temp']['seftitle'] = $_SESSION['temp']['title']; form_articles(''); unset($_SESSION['temp']); break;
				case(cleancheckSEF($seftitle) == 'notok'): echo notification(1,l('err_SEFIllegal').l('errNote')); form_articles(''); unset($_SESSION['temp']); break;
				case(check_if_unique('article_title', $title, $id)): echo notification(1,l('err_TitleExists').l('errNote')); form_articles(''); unset($_SESSION['temp']); break;
				case(check_if_unique('article_seftitle', $seftitle, $id)): echo notification(1,l('err_SEFExists').l('errNote')); form_articles(''); unset($_SESSION['temp']); break;
				default:
					$pos = substr($position, 0, 1);
					switch ($pos) {case 1: $link = 'articles'; break; case 2: $link = 'extra_contents'; break; case 3: $link = 'pages'; break;}
					switch(true) {
						case(isset($_POST['add_article'])):
						mysql_query("INSERT INTO ".db('prefix')."articles(title, seftitle, text, date, category, position, displaytitle, displayinfo, commentable, published, description_meta, keywords_meta) VALUES('$title', '$seftitle', '$text', '$date', '$category', '$position', '$display_title', '$display_info', '$commentable', '$publish_article', '$description_meta', '$keywords_meta')");
						break;	
						case(isset($_POST['edit_article'])):
						if ($fpost_enabled == true) {$future = " date = '$date',";}
						mysql_query("UPDATE ".db('prefix')."articles SET title='$title', seftitle = '$seftitle', text = '$text',".$future." category = '$category', position = '$position', displaytitle = '$display_title', displayinfo = '$display_info', commentable = '$commentable', published = '$publish_article', description_meta = '$description_meta', keywords_meta = '$keywords_meta' WHERE id = '$id' LIMIT 1;");
						break;
						case(isset($_POST['delete_article'])):
						mysql_query("DELETE FROM ".db('prefix')."articles WHERE id = $id LIMIT 1;");
						mysql_query("DELETE FROM ".db('prefix')."comments WHERE articleid = $id LIMIT 1;");
						break;
					}
				echo notification(0,'',$link); unset($_SESSION['temp']);
			}
		break;
		case 'editcomment':
			if (isset($_POST['submit_text'])) {
				mysql_query("UPDATE ".db('prefix')."comments SET name = '$name', url = '$url', comment = '$comment', approved = '$approved' WHERE id = '$commentid' LIMIT 1;");
			}
			else if (isset($_POST['delete_text'])) {
				mysql_query("DELETE FROM ".db('prefix')."comments WHERE id = $commentid LIMIT 1;");
			}
			$articleid = retrieve('articleid', 'comments', 'id', $commentid);
			$link = find_cat_sef($categoryid).'/'.retrieve('seftitle', 'articles', 'id', $articleid);
			echo notification(0,'',$link);
		break;
		case 'deletecomment':
      		$commentid = $_GET['commentid'];
    		$articleid = $_GET['articleid'];
       		mysql_query("DELETE FROM ".db('prefix')."comments WHERE id = $commentid LIMIT 1;");
			$link = find_cat_sef($categoryid).'/'.retrieve('seftitle', 'articles', 'id', $articleid);
			echo notification(0,'', $link);
		break;
	}
}}

/*** FILES ***/
# 1.6.0 - First section revised, plus "echo" added to all html_input strings.
function files() {
	# 1. Revised section over 1.5.31 ---------------------------------------
	$upload_file = isset($_POST['upload']) ? $_POST['upload'] : null;
	$ip = (isset($_POST['ip']) && $_POST['ip'] == $_SERVER['REMOTE_ADDR']) ? $_POST['ip'] : null;
	$time = (isset($_POST['time']) && (time() - $_POST['time']) > 4) ? $_POST['time'] : null;
	if ($ip && $time && $upload_file && $_SESSION[db('website').'Logged_In'] == token()) {
		$ignore = explode(',', l('ignored_items'));
		$file_types = explode(',', l('allowed_files'));
		$image_types = explode(',', l('allowed_images'));
		$extension = array_merge($file_types, $image_types);
		if ($_FILES['imagefile']['type']) {
			$filetemp = $_FILES['imagefile']['tmp_name'];
			$filename = $_FILES['imagefile']['name'];
			$filetype = $_FILES['imagefile']['type'];
			if (!in_array(substr(strrchr($filename, '.'), 1), $extension) || in_array($filename, $ignore)) {echo notification(1,l('file_error'),'files');}
			else {
				$upload_dir = $_POST['upload_dir'].'/';
				copy ($filetemp, $upload_dir.$filename) or die (l('file_error')); echo notification(0,'','files');
				$kb_size = round(($_FILES['imagefile']['size'] / 1024), 1);
				echo '<p><a href="'.$upload_dir.$filename.'" title="'.$filename.'">'.$filename.'</a> ['.$kb_size.' KB] ['.$filetype.']</p>';
			}
		}
		else {echo notification(1,l('file_error'),'files');}
	# end of # 1. revised section ------------------------------------------
	} else {
		if (isset($_GET['task']) == 'delete') {
			$file_to_delete = $_GET['folder'].'/'.$_GET['file'];
			@unlink($file_to_delete);
			echo notification(0,'','files');
		} else {
			echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', l('upload'));
			echo '<form method="post" action="files/" enctype="multipart/form-data">';
			echo '<p><select name="upload_dir" id="ud1" onchange="goto(this.form);">';
			echo '<option value=".">..</option>';
			filelist('option',".", 0);
			echo '</select> <input type="file" name="imagefile" />';
			echo html_input('hidden', 'ip', 'ip1', $_SERVER['REMOTE_ADDR'], '', '', '', '', '', '', '', '', '', '', '');
			echo html_input('hidden', 'time', 'time1', time(), '', '', '', '', '', '', '', '', '', '', '');
			echo html_input('submit', 'upload', 'upload', l('upload'), '', 'button', '', '', '', '', '', '', '', '', '');
			echo '</p></form></fieldset>';
			echo html_input('fieldset', '', '', '', '', '', '', '', '', '', '', '', '', '', l('view_files').' '.(!isset($_POST['upload_dir']) ? ' root' : ' '.str_replace('.', 'root', $_POST['upload_dir'])));
			echo '<form method="post" action="files/" enctype="multipart/form-data">';
			echo '<p><select name="upload_dir" id="ud2"><option value=".">..</option>';
			filelist('option',".");
			echo '</select>';
			echo html_input('hidden', 'file', 'file', $file, '', '', '', '', '', '', '', '', '', '', '');
			echo html_input('hidden', 'ip', 'ip2', $_SERVER['REMOTE_ADDR'], '', '', '', '', '', '', '', '', '', '', '');
			echo html_input('hidden', 'time', 'time2', time(), '', '', '', '', '', '', '', '', '', '', '');
			echo html_input('submit', 'show', 'show', l('view'), '', 'button', '', '', '', '', '', '', '', '', '');
			$handle = (isset($_POST['upload_dir']) && strlen($_POST['upload_dir']) > 2) ? substr($_POST['upload_dir'], 2) : ".";
			echo '</p><p>';
			filelist('list', $handle);
			echo '</p></form></fieldset>';
}}}

// FILELIST FUNCTION
# 1.6.0 - completely revised.
function filelist($mode, $path, $depth = 0) {
	$ignore = explode(',', l('ignored_items'));
	$file_types = explode(',', l('allowed_files'));
	$image_types = explode(',', l('allowed_images'));
	$types = array_merge($file_types, $image_types);
	$dh = @opendir($path);
	while (false !== ($file = readdir($dh))) {
		$target = $path.'/'.$file;
		if(!in_array($file, $ignore)) {
			$spaces = str_repeat(l('divider').' ', ($depth));
			switch(true) {
				case ($mode == 'option' && is_dir($target)):
					$selected = $_POST['view_dir'] == $target ? ' selected="selected"' : '';
					echo '<option value="'.$target.'"'.$selected.'>'.$spaces.$file.'</option>';
			  		filelist('option', $target, ($depth + 1));
			  	break;
			  	case ($mode == 'list' && is_file($target) && in_array(substr(strrchr($target, '.'), 1), $types)):
			  		echo '<a href="'.$target.'" title="'.l('view').' '.$file.'">'.$file.'</a> '.l('divider').' <a href="index.php?action=files&amp;task=delete&amp;folder='.$path.'&amp;file='.$file.'" title="'.l('delete').' '.$file.'" onclick="return pop()">'.l('delete').'</a><br />';
			  	break;
			}
		}
	}
	closedir($dh);
}

// CONNECT TO DATABASE
# same as 1.5.31.
function connect_to_db() {
	$db = mysql_connect(db('dbhost'), db('dbuname'), db('dbpass'));
	mysql_select_db(db('dbname')) or die(db('dberror'));
   if (mysql_num_rows(mysql_query("SHOW TABLES LIKE '".db('prefix')."articles'")) != 1) {
      die(db('db_tables_error'));
   }
}

// SMART RETRIEVE FUNCTION
# same as 1.5.31.
function retrieve($column, $table, $field, $value) {
	$query = "SELECT $column FROM ".db('prefix')."$table WHERE $field = '$value'";
	$result = mysql_query($query);
	while ($r = mysql_fetch_array($result)) {$retrieve = $r[$column];}
	return $retrieve;
}

// FIND CATEGORY'S SEF TITLE THROUGH ARTICLE'S CATEGORY ID
# 1.6.0 - revised.
function find_cat_sef($categoryid) {
	$SEF = retrieve('seftitle','categories','id',$categoryid);
	$cat_sef_title = isset($SEF) ? $SEF : l('home_sef');
	return $cat_sef_title;
}

// CLEAN - cleaning query
# same as 1.5.31.
function clean($query) {
	if (get_magic_quotes_gpc()) {$query = stripslashes($query);}
	$query = mysql_real_escape_string($query);
	return $query;
}

// USER/PASS CHECK
# same as 1.5.31.
function checkUserPass($input) {
	$output = clean(cleanXSS($input));
	$output = strip_tags($output);
	# user and pass: non-english characters and numbers only, min 4/ max 8
	if (ctype_alnum($output) === true && strlen($output) > 3 && strlen($output) < 9) {return $output;}
	else {return null;}
}

// MATH CAPTCHA
# 1.6.0 - completely revised.
function mathCaptcha($input='', $sum='') {
    $length = 4;
	if (isset($_POST['calc'])) {
	    if (is_numeric($input) && strlen($sum) == $length) {$math = substr(md5($input),0,$length) === $sum ? $input : null;}
	}
    else {
        $x = rand(1, 9); $y = rand(1, 9);
        $sum = substr(md5($x+$y),0,$length);
        $math = '<p><label for="calc">* '.l('math_captcha').':</label><br />';
        $math .= $x.' + '.$y.' = ';
        $math .= '<input type="text" name="calc" id="calc" /></p>';
        $math .= '<p><input type="hidden" name="sum" value="'.$sum.'" /></p>';
    }
    return $math;
}

// XSS CLEAN
# same as 1.5.31
function cleanXSS($val) {
	# source from http://quickwired.com/kallahar/smallprojects/php_xss_filter_function.php
	$val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);
	$search = 'abcdefghijklmnopqrstuvwxyz';
	$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$search .= '1234567890!@#$%^&*()';
	$search .= '~`";:?+/={}[]-_|\'\\';
	for ($i = 0; $i < strlen($search); $i++) {
		$val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val);
		$val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val);
	}
	$ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
	$ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
	$ra = array_merge($ra1, $ra2);
	$found = true;
	while ($found == true) {
		$val_before = $val;
		for ($i = 0; $i < sizeof($ra); $i++) {
			$pattern = '/';
			for ($j = 0; $j < strlen($ra[$i]); $j++) {
				if ($j > 0) {
					$pattern .= '(';
					$pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
					$pattern .= '|(&#0{0,8}([9][10][13]);?)?';
					$pattern .= ')?';
				}
				$pattern .= $ra[$i][$j];
			}
			$pattern .= '/i';
			$replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2);
			$val = preg_replace($pattern, $replacement, $val);
			if ($val_before == $val) {$found = false;}
		}
	}
	$allowedtags = "<strong><em><ul><li><pre><hr><blockquote><span>";
	$cstring = strip_tags($val, $allowedtags);
	$cstring = nl2br($cstring);
	return $cstring;
}

// CLEAN - WORD FILTER
# 1.6.0 - revised.
function cleanWords($text) {
    if ((strtolower(s('word_filter_enable')) == 'on') && (file_exists(s('word_filter_file')))) {
        $bad_words_from_what = preg_replace('/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/', '', file(s('word_filter_file')));
        $bad_words_from_what = preg_replace('/^(.*)$/', '/\\1/i', $bad_words_from_what);
        $bad_words_to_what = s('word_filter_change');
        $text = preg_replace($bad_words_from_what, $bad_words_to_what, $text);
        return $text;
    } else {return $text;}
}

// CHECK IF UNIQUE
# same as 1.5.31.
function check_if_unique($what, $text, $not_id = 'x') {
	switch ($what) {
		case 'article_seftitle': $sql = "articles WHERE seftitle = '".clean($text)."' AND id != '".$not_id."'"; break;
		case 'article_title': $sql = "articles WHERE title = '".clean($text)."' AND id != '".$not_id."'"; break;
		case 'category_seftitle': $sql = "categories WHERE seftitle = '".clean($text)."' AND id != '".$not_id."'"; break;
		case 'category_name': $sql = "categories WHERE name = '".clean($text)."' AND id != '".$not_id."'"; break;
	}
	$rows = mysql_num_rows(mysql_query("SELECT id FROM ".db('prefix').$sql));
	if ($rows == 0) {return false;} else {return true;}
}

// GET ID
# same as 1.5.31
function get_id($parameter) {
	$url = array();
	$url = explode('/', clean(cleanXSS($_GET['category'])));
  	$get_id = array();
	$get_id['category'] = clean(cleanXSS($url['0']));
	if (isset($url['1'])) {$get_id['article'] = clean(cleanXSS($url['1']));}
	if (isset($url['2'])) {$get_id['commentspage'] = clean(cleanXSS($url['2']));}
	if (isset($get_id[$parameter])) {return clean(cleanXSS($get_id[$parameter]));}
}

//CATEGORY CHECK
# same as 1.5.31
function check_category($category) {
	$main_menu = explode(',', l('cat_listSEF'));
	if (in_array($category, $main_menu)) {return true;}
	else {return false;}
}

//FILE INCLUSION
# 1.6.0 - 1 revised string, see comment.
function file_include($text, $shorten) {
	$fulltext = substr($text, 0, $shorten);
	$inc = strpos($fulltext, '[/include]');
	if ($inc > 0) {
		$text = str_replace('[include]', '|&|', $fulltext);
		$text = str_replace('[/include]', '|&|', $text);
		$text = explode('|&|', $text); 
		$num = count($text);
		$extension = explode(',', l('file_include_extensions'));
		for ($i = 0; ; $i++) {
			if ($i == $num) {break;}
	# 1.6.0 - revised string.
			if (!in_array(substr(strrchr($text[$i], '.'), 1), $extension)) {echo substr($text[$i], 0);}
			else {
				if (preg_match("/^[a-z0-9_\-.\/]+$/i", $text[$i])) {
					$filename = $text[$i];
					file_exists($filename) ? include($filename) : print l('error_file_exists');
				} else {echo l('error_file_name');}
			}
		}
	} else {echo $fulltext;}
}
				
// ARTICLES - FUTURE POSTING
# same as 1.5.31
function update_articles() {mysql_query("UPDATE ".db('prefix')."articles SET published=1 WHERE published=2 AND date <= '".date("Y-m-d H:i:s")."'");}

// MAKE A CLEAN SEF URL
# same as 1.5.31
function cleanSEF($string) {
	$string = str_replace(' ', '-', $string);
	$string = preg_replace('/[^0-9a-zA-Z-_]/', '', $string); 
	$string = str_replace('-', ' ', $string);
	$string = preg_replace('/^\s+|\s+$/', '', $string);
	$string = preg_replace('/\s+/', ' ', $string);
	$string = str_replace(' ', '-', $string);
	return strtolower($string);
}

# same as 1.5.31
function cleancheckSEF($string) {
    $ret = !preg_match('/^[a-z0-9-_]+$/i', $string) ? 'notok' : 'ok';
    return $ret;
}




// Webcam Controller
# same as 1.5.31
function webcam() {
$fp = fsockopen(db('ip'), db('port'), $errno, $errstr, 10);
if (!$fp) {
    echo "<div id=\"webcam\" align='center' height='250px'><img src='". db('website'). "webcam.png'>";
} else { 
$browser=$_SERVER['HTTP_USER_AGENT'];
if(eregi('MSIE',$browser)) {
     echo "<div id=\"webcam\" align='center'><applet code='com.charliemouse.cambozola.Viewer' archive='cambozola.jar' width='330' height='240'>
    <param name='accessories' value='none'/><param name='url' value='http://". db('ip').":". db('port')."/stream.mjpg'>
  </applet>";}
else{
echo "<div id=\"webcam\" align='center' height='250px'><img src='http://". db('ip').":". db('port')."/stream.mjpg'>";}
}

echo"</div><div align='center';>";

if ($_SESSION[db('website').'Logged_In'] != token()) {
	echo '<p><b>Login required to control webcam.</b></p></center></div>';
	}
		else {echo '<p>'; 
			if($fp) {echo '<a onclick="ajaxleft();" title="Left" href="#"><<</a>&nbsp;&nbsp;<a href="'.db('website').'kill/" title="Stop monitoring">Kill</a>&nbsp;&nbsp;';}
			else {echo '<a href="'.db('website').'start/" title="Start monitoring">Start</a>&nbsp;&nbsp;';}
		echo '<a href="'.db('website').'restart/" title="Restart monitoring">Restart</a>&nbsp;&nbsp;';
		if($fp) {echo '<a onclick="ajaxright();" title="Right" href="#">>></a>';}
		echo '</p></center></div>';}

}

function left() {
$fp = fsockopen(db('ip'), db('port'), $errno, $errstr, 10);
if($fp) {
	system('sudo '. db('ccw'), $retval);
}
else {echo '<script>alert("Webcam currently offline.");</script><meta http-equiv="refresh" content="0; url='.db('website').'">';}
}

function right() {
$fp = fsockopen(db('ip'), db('port'), $errno, $errstr, 10);
if($fp) {
	system('sudo '. db('cw'), $retval);
}
else {echo '<script>alert("Webcam currently offline.");</script><meta http-equiv="refresh" content="0; url='.db('website').'">';}
}

function start() {
if (file_exists(db('webcam'))) {
system('sudo '.db('motion'), $retval);
if (!$retval) {echo'<img  height="10" width="10" src="'.db('website').'small.gif" > <b>Starting webcam... </b>';} else {echo '<b>Failed!</b>';}
echo '<meta http-equiv="refresh" content="3; url='.db('website').'">';
} else {
echo "<b>Webcam not found, please connect your webcam.</b>";
echo '<meta http-equiv="refresh" content="2; url='.db('website').'">';
}}

function kill() {
system('sudo killall motion', $retval);
if (!$retval) {echo'<img height="10" width="10" src="'.db('website').'small.gif"> <b>Shutting down webcam...</b>';} else {echo '<b>Failed!</b>';}
echo '<meta http-equiv="refresh" content="1; url='.db('website').'">';
}

function restart() {
$fp = fsockopen(db('ip'), db('port'), $errno, $errstr, 10);
if($fp) {
	system('sudo killall motion', $retval);
	echo'<img height="10" width="10" src="'.db('website').'small.gif"> <b>Shutting down webcam...</b>';
	echo '<meta http-equiv="refresh" content="1; url='.db('website').'start/">';}
else {echo '<b>Webcam currently offline.</b>';echo '<meta http-equiv="refresh" content="2; url='.db('website').'">';}
}


// JAVASCRIPT FUNCTIONS
function js() { ?>
	<script type="text/javascript">
	//<![CDATA[
	var allowsef = /new|add|_ar|_ca/.test("<?php echo get_id('category').$_GET['action']; ?>");
	var allowpreview = /new|_add|_ar|/.test("<?php echo get_id('category').$_GET['action']; ?>");
	
        // copy title in the sef url field
	// 1.6.0 - revised string.
	if (allowpreview == true) {window.onload = function() {window.self.setInterval("updatePreview()", 1500);};}
		
	// generate SEF urls
	// 1.6.0 - A-Z removed from 4th string, after a-z within square brackets.
	function genSEF(from,to) { 
		if (allowsef == true) {
			var str = from.value.toLowerCase();
			str = str.replace(/[^a-z 0-9]+/g,'');
			str = str.replace(/\s+/g, "-");		
			to.value = str;
		}
	}
	 
	// generate preview - same as 1.5.31.
	function updatePreview() {
		if (document.getElementById('txt')) {					
			var body = document.getElementById('txt').value;
			document.getElementById('preview').innerHTML = body;
		}
	}
	
	// settings home SEF restrict to alphanumeric
	// 1.6.0 - completely revised.
	function SEFrestrict(x) {
		if (window.event) {var key = window.event.keyCode;}
		else if (x) {key = x.which;}
		else {return true;}
		var keychar = String.fromCharCode(key);
		keychar.toLowerCase();
	// Patch/fix applied to next 2 strings - Oct.08.07
	if(key == (null || 0 || 8 || 13 || 27) || ("abcdefghijklmnopqrstuvwxyz0123456789-_").indexOf(keychar) > -1) {return true;}
	if(key == ("9").indexOf(keychar) > -1) {return true;}
		// default string, no patch
		// if(key == (null || 0 || 8 || 9 || 13 || 27) || ("abcdefghijklmnopqrstuvwxyz0123456789-_").indexOf(keychar) > -1) {return true;}
		else {return false;}
	}
	// delete warnings
	// 1.6.0 - revised.
	function pop() {
		var agree=confirm("<?php echo l('warning_delete'); ?>");
		if (agree) {return true;} else {return false;}
	}
	
	// basic html textarea editor
	// 1.6.0 - completely revised, else-if strings replaced with case statements.
	function tag(tag) {
		var src = document.getElementById('txt');
    	var start, end, url, alt, title='';
    	switch(tag) {
    		case 'break': start = '[break]'; end = ''; break;
    		case 'include':
				url = prompt("<?php echo l('file_url'); ?>", '');
				start = url !=null ? '[include]'+url+'[\/include]' : '';
				end = '';
			break;
    		case 'br': start = ''; end = '<br \/>'; break;
    		case 'img':
    			url = prompt("<?php echo l('image_url'); ?>", '');
				alt = prompt("<?php echo l('image_alt'); ?>", '');
				start = url != null ? '<img src="'+url+'" alt="'+alt+'" \/>' : '';
				end = '';
			break;
			case 'link':
				url = prompt("<?php echo l('link_url'); ?>", '');
				title = prompt("<?php echo l('link_title'); ?>", '');
				if(url != null) {start = '<a href="'+url+'" title="'+title+'">'; end = '<\/a>';}
				else {start = end = '';}
			break;
			default: start = '<'+tag+'>'; end = '<\/'+tag+'>';
    	}
		if(!src.setSelectionRange) {
			var selected = document.selection.createRange().text;
			if(selected.length <= 0) {src.value += start + title + end;}
			else {
				var codetext = start + selected + end;
				document.selection.createRange().text = codetext;
			}
		} else {
			var pretext = src.value.substring(0, src.selectionStart);
			var codetext = start + src.value.substring(src.selectionStart, src.selectionEnd) + end;
			var posttext = src.value.substring(src.selectionEnd, src.value.length);
			if(codetext == start + end) {codetext = start + title + end;}
			src.value = pretext + codetext + posttext;
		}
		src.focus();
	}
	 // toggle dynamic divs
	 // 1.6.0 - revised.
    function toggle(div) {
    	var elem = document.getElementById(div);
    	if (elem.style.display=='') {elem.style.display='none'; return;}
    	elem.style.display='';
    }
	// dependancy limiter
	// 1.6.0 - revised.
	function dependancy() {
		var category = document.forms['post']['define_category'];
		var page = document.getElementById('def_page');
		page.style.display = category.options[category.selectedIndex].value == '-1' ? 'inline' : 'none';
	}
	//]]>
	</script>


<script language=javascript>
var objekxhr;
function buatxhr() {
	//ini untuk membuat objek XMLHTTPRequest
    if (window.ActiveXObject) {
		//ini kode untuk membuat objek XHR jika user pake IE
        objekxhr = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    else if (window.XMLHttpRequest) {
		//ini kode untuk membuat objek XHR untuk non-IE
        objekxhr = new XMLHttpRequest();
    } else {
	alert("Sorry, your browser doesn't support AJAX");
	}
}
  
function ajaxleft() {
	/*untuk mengambil data dari server
	kode ini akan dipecah menjadi beberapa fungsi terpisah
	*/
    buatxhr();
	objekxhr.open("GET", "./left");
	objekxhr.send(null);
	objekxhr.onreadystatechange=handleRequestStateChange;
}

function ajaxright() {
	/*untuk mengambil data dari server
	kode ini akan dipecah menjadi beberapa fungsi terpisah
	*/
    buatxhr();
	objekxhr.open("GET", "./right");
	objekxhr.send(null);
	objekxhr.onreadystatechange=handleRequestStateChange;
}

</script>

<?php } ?>
