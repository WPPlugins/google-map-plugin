<?php 
/**
 * @subpackage	: Wordpress
 * @author		: Jonathon Byrd
 * @copyright	: All Rights Reserved, Byrd Inc. 2009
 * @link		: http://www.jonathonbyrd.com
 * 
 * Jonathon Byrd is a freelance developer for hire. Jonathon has owned many companies and
 * understands the importance of website credibility. Contact Jonathon Today.
 * 
 */ 


// Check to ensure this file is within the rest of the framework
defined('_EXEC') or die();

/**
 * 
 * @param $str
 * @param $length
 * @return unknown_type
 */
if (!function_exists('byrd_substr')){ 
	function byrd_substr($str =false, $length=35){
		if (substr($str,35) != '') $add = '...'; else $add ='';
		return substr($str,0,$length).$add;
	}
}

/**
 *  POST Function
 *  I had to add
 *  if(!empty($_GET)) $_POST = $_GET;
 *  to the wp-comment-post.php file in order to get this to work.
 *  
 */
if (!function_exists('byrd_curl')){ 
	function byrd_curl( $url =false, $data =false ) { 
		$headers[] 	= 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg, pdf/application'; 
		$headers[] 	= 'Connection: Keep-Alive'; 
		$headers[] 	= 'Content-type: application/x-www-form-urlencoded;charset=UTF-8'; 
		$user_agent 	= 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)'; 
		$compression	= 'gzip'; 
		
		$process 			= curl_init(); 
		$query = '';
		foreach ($data as $k => $v){
			$query .= '&'.$k.'='.urlencode($v);
		}
		curl_setopt($process, CURLOPT_URL, $url.'?'.$query);
		curl_setopt($process, CURLOPT_HTTPHEADER, $headers); 
		curl_setopt($process, CURLOPT_HEADER, 0); 
		curl_setopt($process, CURLOPT_USERAGENT, $user_agent); 
		curl_setopt($process, CURLOPT_ENCODING , $compression); 
		curl_setopt($process, CURLOPT_TIMEOUT, 30); 
		curl_setopt($process, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1); 
		curl_setopt($process, CURLOPT_POST, 1);
		curl_setopt($process, CURLOPT_POSTFIELDS, $data); 
		
		$return 			= curl_exec($process); 
		curl_close($process); 
		return $return; 
	}
}

/**
 * manages the checkbox values
 * 
 * @param $property
 * @return unknown_type
 */
if (!function_exists('byrd_checkbox')){ 
	function byrd_checkbox( $property ){
	 	if ($property) echo " checked ";
	 }
}
	
/**
 * manages the select boxes
 * 
 * @param $property
 * @param $value
 * @return unknown_type
 */
if (!function_exists('byrd_select')){ 
	function byrd_select( $property, $value ){
	 	if ($property == $value) echo " selected ";
	 }
}

/**
 * designed to display an active class when the current article is the same as the
 * link parameter
 * 
 * @param $mode
 * @param $extra
 * @return unknown_type
 */
if (!function_exists('byrd_active_link')){ 
	function byrd_active_link($mode =false, $extra=''){
		global $post;
		if ($mode == false && !isset($post)) {
			echo ' class="active '.$extra.'" '; 
			return false;
			
		} elseif (!isset($post)) {
			echo ' class="'.$extra.'" ';
			return false;
		
		} elseif ($mode == $post->ID) 
			echo ' class="active '.$extra.'" ';
		else 
			echo ' class="'.$extra.'" ';
		
		return $post->ID;
	}

}

/**
 * diplays a the current page or requested page
 * 
 * @param $cat
 * @return str
 */
if (!function_exists('byrd_page')){ 
	function byrd_page( $page = false, $conf = array() ){
		$defaults = array(
			'title' => false,
			'more' => false
		);
		
		
		$config = array_merge($defaults, $conf);
		
		// default is controlled by wp
		if ($page) {
			wp_reset_query(); 
			query_posts('page_id='.$page);
		}
		
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		
			if ($config['title']){ echo '<h2>'; the_title(); echo '</h2>'; }
			
			the_content();
			
			if ($config['more']){ ?>
				<strong><a href="<?php the_permalink(); ?>">
				<span><span>Read More</span></span></a></strong>
			<?php }
			
		endwhile; endif; 
		
		//wp_reset_query(); 
	}
}

/**
 * diplays a list of posts
 * 
 * @param $cat
 * @return array
 */
if (!function_exists('byrd_list_posts')){ 
	function byrd_list_posts( $cat = '', $conf = array() ){
		global $more; 
		$more = 0;
		
		$defaults = array(
			'ppp' => 10,
			'more' => true
		);
		
		
		$config = array_merge($defaults, $conf);
		
		wp_reset_query(); 
		query_posts('posts_per_page='.$config['ppp'].'&cat='.$cat);
	
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$content = str_get_html(get_the_content(false));
		?>
		<li class="post" style="padding:0px;">
			<h4> <?php the_title(); ?> </h4>
			<?php 
			if ($content->find('img',0)){
				$content->find('img',0)->align = 'left';
				echo $content->find('img',0)->outertext;
			}
		
			foreach ($content->find('img') as $img) 
				$img->outertext = '';
				
			foreach ($content->find('a') as $a) 
				$a->outertext = '';
				
			foreach ($content->find('pre') as $a) 
				$a->outertext = '';
				
			echo byrd_substr($content, 400);
			
			if ($config['more']){ ?>
				<strong><a href="<?php the_permalink(); ?>">
				<span><span>Read More</span></span></a></strong>
			<?php } ?>
			<div class="clear"></div>
		</li>
		<?php endwhile; endif; 
		
		wp_reset_query(); 
	}
	
}

/**
 * diplays a list of posts
 * 
 * @param $cat
 * @return array
 */
if (!function_exists('byrd_list_titles')){ 
	function byrd_list_titles( $cat = '', $ppp = '10' ){
		global $more; 
		$more = 0;
		$i=0;
		$posts = false;
		
		wp_reset_query(); 
		query_posts('posts_per_page='.$ppp.'&cat='.$cat);
								  
		if ( have_posts() ) : while ( have_posts() ) : the_post(); $i++;
		
			$posts[$i]['title'] = the_title('','',false);
			$posts[$i]['href'] = get_permalink();
									
		endwhile; endif; 
		
		wp_reset_query(); 
		
		return $posts;
	}
}

/**
 * deletes a users account
 * 
 * @return unknown_type
 */
if (!function_exists('byrd_delete_user')){ 
	function byrd_delete_user( $email ){
		$_tbl =& rTable::getInstance('users', 'Table');
		$_tbl->delete( $email );
	}
}

/**
 * 
 * @param $username
 * @param $email
 * @param $password
 * @return unknown_type
 */
if (!function_exists('byrd_new_user')){ 
	function byrd_new_user( $username, $email ){
		$_tbl =& rTable::getInstance('users', 'Table');
		
		$i='';
		while(1==1){
			$username = str_replace(' ','', $username.$i);
			
			$user_id = $_tbl->username_exists( $username );
			if ( !$user_id ) {
				$user_id = byrd_create_user( $username, $email );
				break;
			}
			if(!is_numeric($i))$i=0;$i++;
		}
		
	}
	
}

/**
 * 
 * @param $username
 * @param $password
 * @param $email
 * @return unknown_type
 */
if (!function_exists('byrd_create_user')){ 
	function byrd_create_user( $username, $email, $password = false ){
		
		$_tbl =& rTable::getInstance('users', 'Table');
		
		if (!$password) $password = byrd_generate_password( 12, false );
				
		//save this to the database
		$_tbl->bind( array(
			'user_login' => $username,
			'user_pass' => byrd_hash_password($password),
			'user_nicename' => $username,
			'user_email' => $email,
			'user_registered' => date('Y-m-d H:i:s'),
			'user_status' => 0,
			'display_name' => $username
			
		) );
		$_tbl->store();
		
	}

}
	
/**
 * 
 * @param $length
 * @param $special_chars
 * @return unknown_type
 */
if (!function_exists('byrd_generate_password')){ 
	function byrd_generate_password($length = 12, $special_chars = true) {
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		if ( $special_chars )
			$chars .= '!@#$%^&*()';
	
		$password = '';
		for ( $i = 0; $i < $length; $i++ )
			$password .= substr($chars, rand(0, strlen($chars) - 1), 1);
		return $password;
	}

}

/**
 * 
 * @param $password
 * @return unknown_type
 */
if (!function_exists('byrd_hash_password')){ 
	function byrd_hash_password($password) {
		global $wp_hasher;
	
		if ( empty($wp_hasher) ) {
			require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/class-phpass.php');
			// By default, use the portable hash from phpass
			$wp_hasher = new PasswordHash(8, TRUE);
		}
	
		return $wp_hasher->HashPassword($password);
	}
}

/**
 * This function uses the php mail class to send mail
 * 
 * @param $Sender
 * @param $Recipiant
 * @param $Subject
 * @param $Message
 * @param $Attach
 * @param $SendCopy
 * @return unknown_type
 */
if (!function_exists('byrd_send_mail')){ 
	function byrd_send_mail( $Sender =false, $Recipiant =false, $Subject =false, $Message =false, $Attach =false ,$SendCopy =true ){
		/*
		 * Setting the sender and receipiant to defaults
		 * 
		 */
		$Cc 		= "";
  		$Bcc 		= "";
  		
  		if (!$Sender){
  			//$c 			= new eConfig();
			$Sender 	= 'jonathonbyrd@gmail.com';
			//unset($c);
		}
  		if (!$Recipiant){
			//$c 			= new eConfig();
			$Sender 	= 'jonathonbyrd@gmail.com';
			//unset($c);
		}
		
  		/*
  		 * Building the message
  		 */
  		if(!is_file($Message)){
  			$htmlVersion 	= $Message;
  			
  		} else {
  			ob_start();
  			require $Message;
  			$Message = ob_get_flush();
  			
			/*
			 * replace the variables in the message
			 */			
  			foreach($this->getProperties() as $k => $v){
  				$Message 		= str_replace('_'.$k.'_', $v, $Message);
  			}
  			$htmlVersion 	= $Message;
  		}
  		
  		
  		/*
  		 * Load the class and run its parts
  		 */
  		$msg = new Email($Recipiant, $Sender, $Subject); 
  		$msg->Cc = $Cc;
  		$msg->Bcc = $Bcc;
		
		//** set the message to be text only and set the email content.
		
  		$msg->TextOnly = false;
  		$msg->Content = $htmlVersion;
  		
  		//** attach this scipt itself to the message.
		if (is_file($Attach)){
  			$msg->Attach($Attach, "text/plain");
		}
		//** send the email message.
		
		$SendSuccess = $msg->Send();				
  		unset($msg);
		
		if ($SendCopy){
			/*
			 * Load the class and run its parts
			 */
			$msg 		= new Email($Sender, $Recipiant, $Subject); 
			$msg->Cc 	= $Cc;
			$msg->Bcc 	= $Bcc;
	
			//** set the message to be text only and set the email content.
	
			$msg->TextOnly = false;
			$msg->Content = $htmlVersion;
	  
			//** attach this scipt itself to the message.
			if (is_file($Attach)){
				$msg->Attach($Attach, "text/plain");
			}
			//** send the email message.
			$Send 		= $msg->Send();
			
		}	
		
  		return $SendSuccess ? true : false;
		
	}

}

/**
 * 
 * @param $str
 * @return array
 */
if (!function_exists('base64_unserialize')){ 
	function base64_unserialize($str){
	    $ary = unserialize($str);
	    if (is_array($ary)){
	        foreach ($ary as $k => $v){
	            if (is_array(unserialize($v))){
	                $ritorno[$k]=base64_unserialize($v);
	            }else{
	                $ritorno[$k]=base64_decode($v);
	            }
	        }
	    }else{
	        return false;
	    }
	    return $ritorno;
	}
	
}
	
/**
 * 
 * @param $ary
 * @return string
 */
if (!function_exists('base64_serialize')){ 
	function base64_serialize($ary){
	    if (is_array($ary)){
	        foreach ($ary as $k => $v){
	            if (is_array($v)){
	                $ritorno[$k]=base64_serialize($v);
	            }else{
	                $ritorno[$k]=base64_encode($v);
	            }
	        }
	    }else{
	        return false;
	    }
	    return serialize ($ritorno);
	}
	
}