<?php

require 'Mysql.php';

class Membership
{

	
function service_city_names()
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_city_names();
		return $ensure_credentials;
						
 }
	
function service_city_areas($city_id)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_city_areas($city_id);
		return $ensure_credentials;
						
 }

function service_city_areas_restaurant_types($area_id)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_city_areas_restaurant_types($area_id);
		return $ensure_credentials;
						
 }
 
function service_restaurant_details($restaurant_type_id)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_restaurant_details($restaurant_type_id);
		return $ensure_credentials;
						
 }
 
function service_menu_items($restaurant_id)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_menu_items($restaurant_id);
		return $ensure_credentials;
						
 }
 
function service_order_details($redeemedPoints,$customerName,$email,$mobile,$addressline,$pincode,$landmark,$hotel_id,$item_info,$i)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_order_details($redeemedPoints,$customerName,$email,$mobile,$addressline,$pincode,$landmark,$hotel_id,$item_info,$i);
		return $ensure_credentials;
						
 }
 
function service_items_to_process($restaurant_id)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_items_to_process($restaurant_id);
		return $ensure_credentials;
						
 }
 
function service_order_items_list($order_id)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_order_items_list($order_id);
		return $ensure_credentials;
						
 }
 
function service_order_process_updation($order_info,$i)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_order_process_updation($order_info,$i);
		return $ensure_credentials;
						
 }
 
function service_contacts($email,$category,$message)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_contacts($email,$category,$message);
		return $ensure_credentials;
						
 }
 
function service_user_details($name,$email,$picture,$verified_email,$auth_method)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_user_details($name,$email,$picture,$verified_email,$auth_method);
		return $ensure_credentials;
						
 }
 
function service_view_orders()
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_view_orders();
		return $ensure_credentials;
						
 }
 
function service_order_status($order_id)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_order_status($order_id);
		return $ensure_credentials;
						
 }
 
function service_order_status_update($order_id,$order_status)
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_order_status_update($order_id,$order_status);
		return $ensure_credentials;
						
 }
 
 function service_payback_points()
 {
	
		$mysql = New Mysql();
		$ensure_credentials = $mysql->service_payback_points();
		return $ensure_credentials;
						
 }
 
 function xss_data_clean($data)
{
// Fix &entity\n;
$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

// Remove any attribute starting with "on" or xmlns
$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

// Remove javascript: and vbscript: protocols
$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

// Remove namespaced elements (we do not need them)
$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

do
{
	// Remove really unwanted tags
	$old_data = $data;
	$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
}
while ($old_data !== $data);

// we are done...
return $data;
}
	
}

?>