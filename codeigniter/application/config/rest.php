<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| REST Configuration
|--------------------------------------------------------------------------
*/

/*
| Default format for responses (json, xml, etc.)
*/
$config['rest_default_format'] = 'json';

/*
| Supported formats for responses
*/
$config['rest_supported_formats'] = [
    'json',
    'array',
    'csv',
    'html',
    'jsonp',
    'php',
    'serialized',
    'xml',
];

/*
| Enable Cross-Origin Resource Sharing (CORS)
| Useful if the API is accessed from different domains or localhost
*/
$config['check_cors'] = TRUE;

/*
| Allowed CORS Methods
*/
$config['allowed_cors_methods'] = ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'];

/*
| Allow all domains for CORS
*/
$config['allow_any_cors_domain'] = TRUE;

/*
| REST Authentication
| Set to FALSE to disable authentication (for public APIs)
| Options: 'basic', 'digest', 'session'
*/
$config['rest_auth'] = FALSE;

/*
| REST API Key Support
| Set to TRUE if you want to use API keys to authenticate requests
*/
$config['rest_enable_keys'] = FALSE;

/*
| REST Key Column Name
*/
$config['rest_key_column'] = 'key';

/*
| REST Enable Logging
| Enable this to log API requests in a database
*/
$config['rest_enable_logging'] = FALSE;

/*
| REST Language
| Set the default language for REST messages
*/
$config['rest_language'] = 'english';

/*
| REST Handle Exceptions
| Enable this to handle exceptions automatically
*/
$config['rest_handle_exceptions'] = TRUE;

/*
| REST Status Field Name
| The name of the field in responses that contains the status
*/
$config['rest_status_field_name'] = 'status';

/*
| REST Message Field Name
| The name of the field in responses that contains error messages
*/
$config['rest_message_field_name'] = 'error';

/*
| REST Enable Limits
| Set to TRUE to limit the number of API requests per hour
*/
$config['rest_enable_limits'] = FALSE;

/*
| REST IP Whitelist
| Enable this to restrict API access to specific IPs
*/
$config['rest_ip_whitelist_enabled'] = FALSE;

/*
| REST IP Blacklist
| Enable this to block specific IPs from accessing the API
*/
$config['rest_ip_blacklist_enabled'] = FALSE;

/*
| Added Configurations for API Keys
| Uncomment and customize if you need to use API keys
*/

// $config['rest_valid_logins'] = ['admin' => '1234']; // Example user

/*
| CORS Allowed Headers
| Set to allow specific headers for CORS requests
*/
$config['allowed_cors_headers'] = [
    'Origin',
    'X-Requested-With',
    'Content-Type',
    'Accept',
    'Authorization',
    'Access-Control-Request-Method'
];

/*
| REST Enable Keys
| Enable API key validation if required
*/
// $config['rest_enable_keys'] = TRUE;

/*
| REST Default Output Charset
| Ensure responses are encoded correctly
*/
$config['charset'] = 'UTF-8';
