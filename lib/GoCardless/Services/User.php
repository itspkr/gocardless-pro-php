<?php
/**
  * WARNING: Do not edit by hand, this file was generated by Crank:
  *
  * https://github.com/gocardless/crank
  */

namespace GoCardless\Services;

/**
  *  Users
  *
  * @method \GoCardless\Core\ListResponse list() list(array $options = array(), array $headers = array()) gets a non-paginated list of models given finder options.
  *
  *  
  */
class User extends Base
{
  
  /**
    *  Create a user
    *
    *  <a name="user_exists"></a>Creates a new user object. Email addresses must
    *  be unique.
    *
    *  Example URL: /users
    *
    *
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return User
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function create($params = array(), $headers = array())
    {
        return $this->make_request('create', 'post', '/users', $params);
    }

  /**
    *  List users
    *
    *  Returns a
    *  [cursor-paginated](https://developer.gocardless.com/pro/#overview-cursor-pagination)
    *  list of your users.
    *
    *  Example URL: /users
    *
    *
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return \GoCardless\Core\ListResponse
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function do_list($params = array(), $headers = array())
    {
        return $this->make_request('list', 'get', '/users', $params);
    }

  /**
    *  Get a single user
    *
    *  Retrieves the details of an existing user. In addition to the usual
    *  permissions based access rules, any user can access their own record.
    *
    *  Example URL: /users/:identity
    *
    *
    * @param string $identity Unique identifier, beginning with "US"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return User
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function get($identity, $params = array(), $headers = array())
    {
        $path = $this->sub_url('/users/:identity', array(
            'identity' => $identity
        ));

        return $this->make_request('get', 'get', $path, $params, $headers);
    }

  /**
    *  Update a user
    *
    *  Updates a user object. Supports all of the fields supported when creating
    *  a user.
    *
    *  Example URL: /users/:identity
    *
    *
    * @param string $identity Unique identifier, beginning with "US"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return User
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function update($identity, $params = array(), $headers = array())
    {
        $path = $this->sub_url('/users/:identity', array(
            'identity' => $identity
        ));

        return $this->make_request('update', 'put', $path, $params, $headers);
    }

  /**
    *  Enable a user
    *
    *  Enables a user
    *
    *  Example URL: /users/:identity/actions/enable
    *
    *
    * @param string $identity Unique identifier, beginning with "US"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return User
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function enable($identity, $params = array(), $headers = array())
    {
        $path = $this->sub_url('/users/:identity/actions/enable', array(
            'identity' => $identity
        ));

        return $this->make_request('enable', 'post', $path, $params, $headers);
    }

  /**
    *  Disable a user
    *
    *  Disables a user
    *
    *  Example URL: /users/:identity/actions/disable
    *
    *
    * @param string $identity Unique identifier, beginning with "US"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return User
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function disable($identity, $params = array(), $headers = array())
    {
        $path = $this->sub_url('/users/:identity/actions/disable', array(
            'identity' => $identity
        ));

        return $this->make_request('disable', 'post', $path, $params, $headers);
    }



  /**
    *  List users
    *
    *  Returns a
    *  [cursor-paginated](https://developer.gocardless.com/pro/#overview-cursor-pagination)
    *  list of your users.
    *
    * Example URL: /users
    *
    * @param int $list_max The maximum number of records to return while paginating.
    * @param string[mixed] $params POST/URL parameters for the argument. Automatically wrapped.
    * @param string[string] $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return \GoCardless\Core\Paginator
    **/
    public function all($list_max, $params = array(), $headers = array())
    {
        return new \GoCardless\Core\Paginator($this, $list_max, $this->do_list($params), $params, $headers);
    }


   /**
    * Get the resource loading class.
    * Used internally to send http requests.
    *
    * @return string
    */
    protected function resourceClass()
    {
        return '\GoCardless\Resources\User';
    }

  /**
    *  Get the key the response object is enclosed in in JSON.
    *  Used internally to wrap and unwrap http requests.
    *
    *  @return string
    */
    protected function envelopeKey()
    {
        return 'users';
    }
}
