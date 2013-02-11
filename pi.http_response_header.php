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
    // Hmm. There has got to be a better way.
    global $app;

    $if_user_agent = $this->fetch_param('if_user_agent', null, 'is_string',
                                        false, false);
    $field = $this->fetch_param('field', null, 'is_string', false, false);
    $value = $this->fetch_param('value', null, 'is_string', false, false);
    $meta = $this->fetch_param('meta', false, false, true);

    // If $app and $if_user_agent aren't empty then set $user_agent to the
    // USER_AGENT
    if (!empty($app) && !empty($if_user_agent)) {
      $user_agent = $app->request()->getUserAgent();
    }

    // If the value of $if_user_agent is found in $user_agent then return
    // nothing.
    if (!empty($if_user_agent) && !empty($user_agent) && 
       (strpos($user_agent, $if_user_agent) === false)) {
      return false;
    }

    // If the $field and $value aren't empty then set the header and
    // return a meta tag if $meta is true.
    if (!empty($field) && !empty($value)) {
      if (!empty($app)) {
        $app->response()->header($field, $value);
      }

      if ($meta) {
        return '<meta http-equiv="'.$field.'" content="'.$value.'" />';
      }
    }
  }
}
