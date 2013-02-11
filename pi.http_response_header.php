<?php
class Plugin_http_response_header extends Plugin {

  var $meta = array(
    'name'       => 'HTTP Response-Header',
    'version'    => '0.1',
    'author'     => 'Tim Perkins',
    'author_url' => 'http://livingstaccato.com'
  );

  public function index()
  {
    // hmm. there has got to be a better way.
    global $app;

    $if_user_agent = $this->fetch_param('if_user_agent', null, 'is_string', false, false);
    $field = $this->fetch_param('field', null, 'is_string', false, false);
    $value = $this->fetch_param('value', null, 'is_string', false, false);
    $meta = $this->fetch_param('meta', false, false, true);

    if (!empty($app) && !empty($if_user_agent))
      $user_agent = $app->request()->getUserAgent();

    if (!empty($if_user_agent) && (strpos($user_agent, $if_user_agent) === false))
      return false;

    if (!empty($field) && !empty($value)) {

      if (!empty($app))
        $app->response()->header($field, $value);

      if ($meta)
        return '<meta http-equiv="'.$field.'" content="'.$value.'" />';

    }

  }
}
