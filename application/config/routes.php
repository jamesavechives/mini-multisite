<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// admin userdata module
$route['userdata/view'] = 'admin/userdata/view';
// admin media module
$route['media/view'] = 'admin/media/view';
$route['media/photo_list'] = 'admin/media/photo_list';
$route['media/bind_carousel_photo'] = 'admin/media/bind_carousel_photo';
$route['media/upload_media'] = 'admin/media/upload_media';
$route['media/delete_media'] = 'admin/media/delete_media';
// admin coupons module
$route['coupons/delete_coupon'] = 'admin/coupons/delete_coupon';
$route['coupons/view'] = 'admin/coupons/view';
$route['coupons/getcoupondetail'] = 'admin/coupons/getCouponDetail';
$route['coupons/create_coupon'] = 'admin/coupons/create_coupon';
$route['coupons/toggle_status'] = 'admin/coupons/toggle_status';
//admin orders module
$route['transactions/view'] = 'admin/transactions/view';
$route['transactions/details'] = 'admin/transactions/details';
//admin products module
$route['admin/products'] = 'admin/items/view';
$route['admin/productslist'] = 'admin/items/productslist';
$route['admin/create_products'] = 'admin/items/create_products';
$route['admin/delete_products'] = 'admin/items/delete_products';
$route['admin/products_categories'] = 'admin/items/products_categories';
$route['admin/create_category'] = 'admin/items/create_category';
//admin site module
$route['admin/site_detail'] = 'admin/site/site_detail';
$route['admin/sites'] = 'admin/site/view';
$route['admin/create_site'] = 'admin/site/create_site';
$route['admin/update_site'] = 'admin/site/update_site';
$route['admin/about'] = 'admin/site/about';
//admin carousel photos
$route['admin/carousel_photos'] = 'admin/carousel/view';
$route['admin/bind_carousel_product'] = 'admin/carousel/bind_carousel_product';
$route['admin/upload_carousel_photos'] = 'admin/carousel/upload_carousel_photos';
//admin customers
$route['admin/customers'] = 'admin/clients/view';
//admin module
$route['admin/add_session'] = 'admin/add_session';
$route['admin/settings'] = 'admin/settings';
$route['admin/view'] = 'admin/view';
$route['admin/index'] = 'admin/index';

//jisu products
$route['(:num)/products/getassesslist'] = 'products/getAssessList/$1';
$route['(:num)/products/goodsdetails'] = 'products/goodsDetails/$1';
$route['(:num)/products/goodslist'] = 'products/goodsList/$1';
$route['(:num)/products/getcategorybygroup'] = 'products/getCategoryByGroup/$1';
$route['(:num)/products/formdatalist'] = 'products/formDataList/$1';
//products module

$route['(:num)/products/home'] = 'products/home/$1';
$route['(:num)/products/details'] = 'products/details/$1';
$route['(:num)/products/search'] = 'products/search/$1';
$route['(:num)/products/view'] = 'products/view/$1';
$route['(:num)/products/index'] = 'products/index/$1';
$route['(:num)/products'] = 'products/$1';
//customer module
$route['(:num)/customer/login_user']='customer/login_user/$1';
$route['(:num)/customer/get_user_info']='customer/get_user_info/$1';
$route['(:num)/customer/login']='customer/login/$1';
$route['(:num)/customer/insert']='customer/insert/$1';
$route['(:num)/customer/home']='customer/home/$1';
//order wxpay module
$route['(:num)/wxpay/refund'] = 'orders/wxRefund/$1';
$route['(:num)/wxpay/pay'] = 'orders/wxpay/$1';
//order module
$route['(:num)/orders/check_collectme_status']='orders/check_collectme_status/$1';
$route['(:num)/orders/after_pay_order']='orders/after_pay_order/$1';
$route['(:num)/orders/cancel_order']='orders/cancel_order/$1';
$route['(:num)/orders/count_status_order']='orders/count_status_order/$1';
$route['(:num)/orders/get_order']='orders/get_order/$1';
$route['(:num)/orders/add_cartorder']='orders/add_cartorder/$1';
$route['(:num)/orders/shop_location']='orders/shop_location/$1';
$route['(:num)/orders/delete_wxaddress']='orders/delete_wxaddress/$1';
$route['(:num)/orders/add_wxaddress']='orders/add_wxaddress/$1';
$route['(:num)/orders/address_list']='orders/address_list/$1';
$route['(:num)/orders/calculation_price']='orders/calculation_price/$1';
$route['(:num)/orders/precheck_shoppingcart']='orders/precheck_shoppingcart/$1';
$route['(:num)/orders/cart_list']='orders/cart_list/$1';
$route['(:num)/orders/delete_cart']='orders/delete_cart/$1';
$route['(:num)/orders/add_cart']='orders/add_cart/$1';
// about module
$route['(:num)/AppInfo/carouselPhotos'] = 'about/carouselPhotos/$1';
$route['(:num)/about/home']='about/home/$1';
// promotions module
$route['(:num)/promotions/get_coupons'] = 'promotions/get_coupons/$1';
$route['(:num)/promotions/recv_coupon'] = 'promotions/recv_coupon/$1';
$route['(:num)/promotions/get_user_coupons'] = 'promotions/get_user_coupons/$1';
$route['(:num)/promotions/get_coupon_info'] = 'promotions/get_coupon_info/$1';
$route['(:num)/promotions/get_user_coupon_info'] = 'promotions/get_user_coupon_info/$1';
// user data module
$route['(:num)/userdata/add_data'] = 'userdata/add_data/$1';

// Wechat default
$route['default_controller'] = 'admin/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['weapp'] = '/';
$route['weapp/(.+)'] = '$1';
