<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route[ADMIN_DIR] = ADMIN_DIR."/index";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/Settings/spaceList'] = ADMIN_DIR.'/Space/index';
$route['admin/Settings/add_space'] = ADMIN_DIR.'/space/add';
$route['admin/Settings/edit_space/(:num)'] = ADMIN_DIR.'/space/updateSpace/$1';
$route['admin/Settings/delet_space/(:num)'] = ADMIN_DIR.'/space/deleteSpace/$1';

$route['spaces'] = 'home/spaces';
$route['spaces/(:num)'] = 'home/rooms/$1';

$route['inbox'] = 'Dashboard/inbox';
$route['compose'] = 'Dashboard/compose';
$route['rentals'] = 'Dashboard/rentals';
$route['wishlists'] = 'Dashboard/wishlists';
$route['invite'] = 'Dashboard/invite';
$route['contactList'] = 'Dashboard/contactList';

$route['listing'] = 'Listing/listing';
$route['preview-listing/(:num)'] = 'Listing/preview_listing/$1';
$route['manage-listing/(:num)'] = 'Listing/manage_listing/$1';
$route['my-reservations'] = 'Listing/Listing2';
$route['reservation-requirements'] = 'Listing/Listing3';

$route['account/payment-methods'] = 'account/payment_methods';
$route['account/payout-preferences'] = 'account/payout_preferences';
$route['account/transaction-history'] = 'account/transaction_history';
$route['account/connected-apps'] = 'account/connected_apps';

$route['Space/become-a-partner'] = 'Space/become_a_partner';
$route['Space/become-a-partner/(:num)'] = 'Space/become_a_partner/$1';

$route['Space/workspace-detail'] = 'Space/workspace_detail';

$route['Space/space-description'] = 'Space/space_description';
$route['Space/profile-photo'] = 'Space/profile_photo';
$route['Space/verify-phone'] = 'Space/verify_phone';

$route['Space/professional-requirements'] = 'Space/professional_requirements';
$route['Space/cleanup-procedures'] = 'Space/cleanup_procedures';
$route['Space/review-professional-requirements'] = 'Space/review_professional_requirements';
$route['Space/review-how-professional-book'] = 'Space/review_how_professional_book';
$route['Space/hosting-terms'] = 'Space/hosting_terms';
$route['Space/availability-questions'] = 'Space/availability_questions';
$route['Space/availability-settings'] = 'Space/availability_settings';
$route['Space/price-settings'] = 'Space/price_settings';
$route['Space/additional-pricing'] = 'Space/additional_pricing';
$route['Space/booking-scenarios'] = 'Space/booking_scenarios';
$route['Space/local-laws'] = 'Space/local_laws';
$route['Space/publish-listing'] = 'Space/publish_listing';
$route['Space/preview-layout'] = 'Space/preview_layout';
$route['Space/preview-layout/(:num)'] = 'Space/preview_layout/$1';