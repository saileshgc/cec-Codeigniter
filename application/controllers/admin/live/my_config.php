<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI = &get_instance();
$CI->config->load();

$config['site_title'] = 'CRC';
$config['project_title'] = 'CRC';
$config['site_path'] = $CI->config->item('base_url');	
$config['admin_dir'] = 'admin';
$config['admin_path'] = $config['site_path'].$config['admin_dir'].'/';
$config['site_root'] = $_SERVER['DOCUMENT_ROOT'].'crc/';

// Define assets path
$config['assets'] = $config['site_path'].'assets/';
$config['uploads'] = $config['site_path'].'uploads/';
$config['library'] = $config['site_root'].'libraries/';

$config['uploadify'] = $config['assets'].'uploadify/';


$config['xml_path'] = $config['site_root'].'uploads/xml_files/';


// Error page
$config['css'] = $config['assets'].'css/';
$config['js'] = $config['assets'].'js/';
$config['images'] = $config['assets'].'images/';
$config['plugins'] = $config['assets'].'plugins/';


$config['admin_asset'] = $config['assets'].'admin/';
$config['admin_css'] = $config['admin_asset'].'css/';
$config['admin_js'] = $config['admin_asset'].'js/';
$config['admin_images'] = $config['admin_asset'].'images/';

$config['site_asset'] = $config['assets'].'site/';
$config['site_css'] = $config['site_asset'].'css/';
$config['site_js'] = $config['site_asset'].'js/';
$config['site_images'] = $config['site_asset'].'images/';
$config['captcha_images_root'] = $config['site_root'].'assets/site/images/captcha/';
// path to jquery Uploadify
$config['uploadify'] = $config['assets'].'uploadify/';

//path to Ckeditor
$config['ckeditor'] = $config['assets'].'editor/ckeditor/';
$config['ckfinder'] = $config['assets'].'editor/ckfinder/';


$config['home_images_root'] = $config['site_root'].'uploads/home_images/';
$config['home_images_path'] = $config['uploads'].'home_images/';

//Uploads Files
$config['event_images_root'] = $config['site_root'].'uploads/event_images/';
$config['event_images_path'] = $config['uploads'].'event_images/';

$config['banner_images_root'] = $config['site_root'].'uploads/banner_images/';
$config['banner_images_path'] = $config['uploads'].'banner_images/';

$config['deal_images_root'] = $config['site_root'].'uploads/deal_images/';
$config['deal_images_path'] = $config['uploads'].'deal_images/';

$config['charity_images_root'] = $config['site_root'].'uploads/charity_info_images/';
$config['charity_images_path'] = $config['uploads'].'charity_info_images/';

$config['member_images_root'] = $config['site_root'].'uploads/member_images/';
$config['member_images_path'] = $config['uploads'].'member_images/';


$config['rows_per_page'] = '10';

$config['events_per_cell'] = '3';

$config['admin_id'] = '1';

