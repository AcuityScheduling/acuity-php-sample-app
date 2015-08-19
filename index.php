<?php
require_once('vendor/autoload.php');
require_once('config.php');

ini_set('session.save_path', '');
session_start();

// Acuity OAuth Connection
$acuity = new AcuitySchedulingOAuth([
  'accessToken' => $_SESSION['acuityAccessToken'],
  'clientId' => CLIENT_ID,
  'clientSecret' => CLIENT_SECRET,
  'redirectUri' => REDIRECT_URI
]);

// Router:
$method = $_SERVER['REQUEST_METHOD'];
$path   = $_SERVER['PATH_INFO'] ? $_SERVER['PATH_INFO'] : '/';

if ($method === 'GET' && $path === '/') {

  if ($acuity->isConnected()) {
    $me = $acuity->request('me');
    $today = strftime('%Y-%m-%d');
    $agenda = $acuity->request('appointments', [
      'query' => [
        'minDate' => $today,
        'maxDate' => $today
      ]
    ]);
  } else {
    $authorizationUrl = $acuity->getAuthorizeUrl(['scope' => 'api-v1']);
  }

  include 'templates/index.tpl.php';

} else
if ($method === 'GET' && $path === '/oauth2') {
  $response = $acuity->requestAccessToken($_GET['code']);
  $accessToken = $response['access_token'];
  if ($accessToken) {
    $_SESSION['acuityAccessToken'] = $accessToken;
    header('Location: /');
  }
} else
if ($method === 'GET' && $path === '/disconnect') {
  session_destroy();
  header('Location: /');
} else {
  // 404
}
