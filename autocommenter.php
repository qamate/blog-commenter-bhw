
<?PHP




$urladdresses = file("addresslist.txt");

foreach($urladdresses as $urladdresse)

{
    $urladdresse = trim($urladdresse);
    $murl = $urladdresse.'/wp-comments-post.php';

    
    $anchort = $_POST['anchortext'];
    $email = $_POST['emailid'];
    $urlid= $_POST['urlid'];
    $commentis= $_POST['comment'];
   
	$comment_post_ID = mt_rand(5,40);
    
    $postdata="author=$anchort&email=$email&url=$urlid&comment=$commentis&submit=Submit+Comment&comment_post_ID=$comment_post_ID ";
    
    echo "Comment has been posted to $urladdresse (post no $comment_post_ID)<br />";
    
    post($murl, $postdata);
    print $proxy;
   }

function post($url, $postdata){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.8.0.4) Gecko/20060508 Firefox/1.5.0.4'); 
   

	
	curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT,0);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    
    return curl_exec($ch);
}

?>
