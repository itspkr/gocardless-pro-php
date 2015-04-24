<?php
/**
  * WARNING: Do not edit by hand, this file was generated by Crank:
  *
  * https://github.com/gocardless/crank
  */

namespace GoCardless\Services;

/**
  *  Subscriptions
  *
  * @method \GoCardless\Core\ListResponse list() list(array $options = array(), array $headers = array()) gets a non-paginated list of models given finder options.
  *
  *  Subscriptions create
  *  [payments](https://developer.gocardless.com/pro/#api-endpoints-payments)
  *  according to a schedule.
  *  
  *  #### Recurrence Rules
  *  
  *  The
  *  following rules apply when specifying recurrence:
  *  - The first payment
  *  must be charged within 1 year.
  *  - When neither `month` nor
  *  `day_of_month` are present, the subscription will recur from the `start_at`
  *  based on the `interval_unit`.
  *  - If `month` or `day_of_month` are
  *  present, the recurrence rules will be applied from the `start_at`, and the
  *  following validations apply:
  *  
  *  | interval_unit   | month          
  *                                 | day_of_month                            |

  *   *  | :-------------- | :--------------------------------------------- |
  *  :-------------------------------------- |
  *  | yearly          | optional
  *  (required if `day_of_month` provided) | optional (required if `month`
  *  provided) |
  *  | monthly         | invalid                               
  *          | required                                |
  *  | weekly         
  *  | invalid                                        | invalid                 
  *                 |
  *  
  *  Examples:
  *  
  *  | interval_unit   |
  *  interval   | month   | day_of_month   | valid?                             
  *                 |
  *  | :-------------- | :--------- | :------ |
  *  :------------- | :------------------------------------------------- |
  * 
  *  | yearly          | 1          | january | -1             | valid          
  *                                     |
  *  | yearly          | 1          |
  *  march   |                | invalid - missing `day_of_month`                
  *    |
  *  | monthly         | 6          |         | 12             | valid 
  *                                              |
  *  | monthly         | 6   
  *        | august  | 12             | invalid - `month` must be blank         
  *            |
  *  | weekly          | 2          |         |               
  *  | valid                                              |
  *  | weekly       
  *    | 2          | october | 10             | invalid - `month` and
  *  `day_of_month` must be blank |
  *  
  *  #### Rolling dates
  *  
  * 
  *  When a charge date falls on a non-business day, one of two things will
  *  happen:
  *  
  *  - if the recurrence rule specified `-1` as the
  *  `day_of_month`, the charge date will be rolled __backwards__ to the
  *  previous business day (i.e., the last working day of the month).
  *  -
  *  otherwise the charge date will be rolled __forwards__ to the next business
  *  day.
  *  
  */
class Subscription extends Base
{
  
  /**
    *  Create a subscription
    *
    *  Creates a new subscription object
    *
    *  Example URL: /subscriptions
    *
    *
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Subscription
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function create($params = array(), $headers = array())
    {
        return $this->make_request('create', 'post', '/subscriptions', $params);
    }

  /**
    *  List subscriptions
    *
    *  Returns a
    *  [cursor-paginated](https://developer.gocardless.com/pro/#overview-cursor-pagination)
    *  list of your subscriptions.
    *
    *  Example URL: /subscriptions
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
        return $this->make_request('list', 'get', '/subscriptions', $params);
    }

  /**
    *  Get a single subscription
    *
    *  Retrieves the details of a single subscription.
    *
    *  Example URL: /subscriptions/:identity
    *
    *
    * @param string $identity Unique identifier, beginning with "SB"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Subscription
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function get($identity, $params = array(), $headers = array())
    {
        $path = $this->sub_url('/subscriptions/:identity', array(
            'identity' => $identity
        ));

        return $this->make_request('get', 'get', $path, $params, $headers);
    }

  /**
    *  Update a subscription
    *
    *  Updates a subscription object.
    *
    *  Example URL: /subscriptions/:identity
    *
    *
    * @param string $identity Unique identifier, beginning with "SB"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Subscription
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function update($identity, $params = array(), $headers = array())
    {
        $path = $this->sub_url('/subscriptions/:identity', array(
            'identity' => $identity
        ));

        return $this->make_request('update', 'put', $path, $params, $headers);
    }

  /**
    *  Cancel a subscription
    *
    *  Immediately cancels a subscription; no more payments will be created
    *  under it. Any metadata supplied to this endpoint will be stored on the
    *  payment cancellation event it causes.
    *  
    *  This will fail with
    *  a cancellation_failed error if the subscription is already cancelled or
    *  finished.
    *
    *  Example URL: /subscriptions/:identity/actions/cancel
    *
    *
    * @param string $identity Unique identifier, beginning with "SB"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Subscription
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function cancel($identity, $params = array(), $headers = array())
    {
        $path = $this->sub_url('/subscriptions/:identity/actions/cancel', array(
            'identity' => $identity
        ));

        return $this->make_request('cancel', 'post', $path, $params, $headers);
    }



  /**
    *  List subscriptions
    *
    *  Returns a
    *  [cursor-paginated](https://developer.gocardless.com/pro/#overview-cursor-pagination)
    *  list of your subscriptions.
    *
    * Example URL: /subscriptions
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
        return '\GoCardless\Resources\Subscription';
    }

  /**
    *  Get the key the response object is enclosed in in JSON.
    *  Used internally to wrap and unwrap http requests.
    *
    *  @return string
    */
    protected function envelopeKey()
    {
        return 'subscriptions';
    }
}
