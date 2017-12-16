<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tracking {

    public function track13() {
        echo "traking";
    }

    function getProperty($var) {
        if ($var == 'check')
            Return false;
        if ($var == 'shipaccount')
            Return '277810689';
        if ($var == 'billaccount')
            Return '277810689';
        if ($var == 'dutyaccount')
            Return '277810689';
        if ($var == 'accounttovalidate')
            Return '277810689';
        if ($var == 'meter')
            Return '106591522';
        if ($var == 'key')
            Return 'MNUJb2Udjm08fIh3 ';
        if ($var == 'password')
            Return '8MP1DLQNbVVtdQn8rvDypXJiL';
        if ($var == 'shippingChargesPayment')
            Return 'SENDER';
        if ($var == 'internationalPaymentType')
            Return 'SENDER';
        if ($var == 'readydate')
            Return '2010-05-31T08:44:07';
        if ($var == 'readytime')
            Return '12:00:00-05:00';
        if ($var == 'closetime')
            Return '20:00:00-05:00';
        if ($var == 'closedate')
            Return date("Y-m-d");
        if ($var == 'pickupdate')
            Return date("Y-m-d", mktime(8, 0, 0, date("m"), date("d") + 1, date("Y")));
        if ($var == 'pickuptimestamp')
            Return mktime(8, 0, 0, date("m"), date("d") + 1, date("Y"));
        if ($var == 'pickuplocationid')
            Return '12';
        if ($var == 'pickupconfirmationnumber')
            Return '1';
        if ($var == 'dispatchdate')
            Return date("Y-m-d", mktime(8, 0, 0, date("m"), date("d") + 1, date("Y")));
        if ($var == 'dispatchtimestamp')
            Return mktime(8, 0, 0, date("m"), date("d") + 1, date("Y"));
        if ($var == 'dispatchlocationid')
            Return '12';
        if ($var == 'dispatchconfirmationnumber')
            Return '1';
        if ($var == 'shiptimestamp')
            Return mktime(10, 0, 0, date("m"), date("d") + 1, date("Y"));
        if ($var == 'tag_readytimestamp')
            Return mktime(10, 0, 0, date("m"), date("d") + 1, date("Y"));
        if ($var == 'tag_latesttimestamp')
            Return mktime(20, 0, 0, date("m"), date("d") + 1, date("Y"));
        if ($var == 'trackingnumber')
            Return '123456789012';
        if ($var == 'trackaccount')
            Return '277810689';
        if ($var == 'shipdate')
            Return '2012-02-07';
        if ($var == 'account')
            Return '277810689';
        if ($var == 'phonenumber')
            Return '1234567890';
        if ($var == 'closedate')
            Return '2012-04-21';
        if ($var == 'expirationdate')
            Return '2012-06-30';
        if ($var == 'hubid')
            Return '5531';
        if ($var == 'begindate')
            Return '2010-12-27';
        if ($var == 'enddate')
            Return '2010-12-29';
        if ($var == 'address1')
            Return array('StreetLines' => array('10 Fed Ex Pkwy'),
                'City' => 'Memphis',
                'StateOrProvinceCode' => 'TN',
                'PostalCode' => '38115',
                'CountryCode' => 'US');
        if ($var == 'address2')
            Return array('StreetLines' => array('13450 Farmcrest Ct'),
                'City' => 'Herndon',
                'StateOrProvinceCode' => 'VA',
                'PostalCode' => '20171',
                'CountryCode' => 'US');
        if ($var == 'locatoraddress')
            Return array(array('StreetLines' => '240 Central Park S'),
                'City' => 'Austin',
                'StateOrProvinceCode' => 'TX',
                'PostalCode' => '78701',
                'CountryCode' => 'US');
        if ($var == 'searchlocationsaddress')
            Return array(array('StreetLines' => '240 Central Park S'),
                'City' => 'Austin',
                'StateOrProvinceCode' => 'TX',
                'PostalCode' => '78701',
                'CountryCode' => 'US');
        if ($var == 'searchlocationphonenumber')
            Return '5555555555';
        if ($var == 'recipientcontact')
            Return array('ContactId' => 'arnet',
                'PersonName' => 'Recipient Contact',
                'PhoneNumber' => '1234567890');
        if ($var == 'freightaccount')
            Return '510087020';
        if ($var == 'freightbilling')
            Return array(
                'Contact' => array(
                    'ContactId' => 'freight1',
                    'PersonName' => 'Big Shipper',
                    'Title' => 'Manager',
                    'CompanyName' => 'Freight Shipper Co',
                    'PhoneNumber' => '1234567890'
                ),
                'Address' => array(
                    'StreetLines' => array('1202 Chalet Ln', 'Do Not Delete - Test Account'),
                    'City' => 'Harrison',
                    'StateOrProvinceCode' => 'AR',
                    'PostalCode' => '72601-6353',
                    'CountryCode' => 'US'
                )
            );
    }

    function setEndpoint($var){
	if($var == 'changeEndpoint') Return false;
	if($var == 'endpoint') Return '';
}

}

/* End of file Someclass.php */