<?php
/**
  * WARNING: Do not edit by hand, this file was generated by Crank:
  *
  * https://github.com/gocardless/crank
  */

namespace GoCardless\Services;

/**
  *  Creditor Bank Accounts
  *
  * @method \GoCardless\Core\ListResponse list() list(array $options = array(), array $headers = array()) gets a non-paginated list of models given finder options.
  *
  *  Creditor Bank Accounts hold the bank details of a
  *  [creditor](https://developer.gocardless.com/pro/#api-endpoints-creditor).
  *  These are the bank accounts which your
  *  [payouts](https://developer.gocardless.com/pro/#api-endpoints-payouts) will
  *  be sent to.
  *  
  *  Note that creditor bank accounts must be unique, and
  *  so you will encounter a `bank_account_exists` error if you try to create a
  *  duplicate bank account. You may wish to handle this by updating the
  *  existing record instead, the ID of which will be provided as
  *  `links[creditor_bank_account]` in the error response.
  */
class CreditorBankAccount extends Base
{
  
  /**
    *  Create a creditor bank account
    *
    *  Creates a new creditor bank account object.
    *  
    *  Bank account
    *  details may be supplied using the IBAN (international bank account
    *  number) or [local details](#ui-compliance-local-bank-details).
    *
    *  Example URL: /creditor_bank_accounts
    *
    *
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return CreditorBankAccount
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function create($params = array(), $headers = array())
    {
        return $this->make_request('create', 'post', '/creditor_bank_accounts', $params);
    }

  /**
    *  List creditor bank accounts
    *
    *  Returns a
    *  [cursor-paginated](https://developer.gocardless.com/pro/#overview-cursor-pagination)
    *  list of your creditor bank accounts.
    *
    *  Example URL: /creditor_bank_accounts
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
        return $this->make_request('list', 'get', '/creditor_bank_accounts', $params);
    }

  /**
    *  Get a single creditor bank account
    *
    *  Retrieves the details of an existing creditor bank account.
    *
    *  Example URL: /creditor_bank_accounts/:identity
    *
    *
    * @param string $identity Unique identifier, beginning with "BA"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return CreditorBankAccount
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function get($identity, $params = array(), $headers = array())
    {
        $path = $this->sub_url('/creditor_bank_accounts/:identity', array(
            'identity' => $identity
        ));

        return $this->make_request('get', 'get', $path, $params, $headers);
    }

  /**
    *  Disable a creditor bank account
    *
    *  Immediately disables the bank account, no money can be paid out to a
    *  disabled account.
    *  
    *  This will return a `disable_failed`
    *  error if the bank account has already been disabled.
    *  
    *  A
    *  disabled bank account can be re-enabled by creating a new bank account
    *  resource with the same details.
    *
    *  Example URL: /creditor_bank_accounts/:identity/actions/disable
    *
    *
    * @param string $identity Unique identifier, beginning with "BA"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return CreditorBankAccount
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function disable($identity, $params = array(), $headers = array())
    {
        $path = $this->sub_url('/creditor_bank_accounts/:identity/actions/disable', array(
            'identity' => $identity
        ));

        return $this->make_request('disable', 'post', $path, $params, $headers);
    }



  /**
    *  List creditor bank accounts
    *
    *  Returns a
    *  [cursor-paginated](https://developer.gocardless.com/pro/#overview-cursor-pagination)
    *  list of your creditor bank accounts.
    *
    * Example URL: /creditor_bank_accounts
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
        return '\GoCardless\Resources\CreditorBankAccount';
    }

  /**
    *  Get the key the response object is enclosed in in JSON.
    *  Used internally to wrap and unwrap http requests.
    *
    *  @return string
    */
    protected function envelopeKey()
    {
        return 'creditor_bank_accounts';
    }
}
