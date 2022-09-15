
<?php
// TEMPLATE NAME: ʵʱ����
include ( "wp-config.php" ) ; 
require_once (ABSPATH.'wp-blog-header.php'); 
global $wpdb; 
$sql="SELECT ID FROM wp_posts WHERE post_type = 'post' AND post_status =  'publish' order by rand() limit 2000"; 
$myrows = $wpdb->get_results($sql);
$urlarr = array();
foreach ($myrows as $b) {
    $link = 'https://www.changchenghao.cn/n/'.$b->ID.'.html';// 填写你的网站
    array_push($urlarr, $link);
}
$urls = $urlarr;
$api = 'http://data.zz.baidu.com/urls?site=������д�������&token=������д��Կ'; // 填写你的站长平台密钥
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo $result;
?>

