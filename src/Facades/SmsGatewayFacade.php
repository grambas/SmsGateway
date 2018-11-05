<?php 
namespace Grambas\SmsGateway\Facades;

use Illuminate\Support\Facades\Facade;


class SmsGatewayFacade extends Facade {

     /**
   * Get the registered name of the component.
  *
 * @return string
 */
protected static function getFacadeAccessor() { return 'SmsGateway'; }
}