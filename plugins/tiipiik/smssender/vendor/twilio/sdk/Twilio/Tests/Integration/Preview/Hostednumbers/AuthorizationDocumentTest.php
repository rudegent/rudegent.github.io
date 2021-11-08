<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Hostednumbers;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Serialize;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class AuthorizationDocumentTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->hostedNumbers->authorizationDocuments("PXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/HostedNumbers/AuthorizationDocuments/PXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "address_sid": "AD11111111111111111111111111111111",
                "cc_emails": [
                    "aaa@twilio.com",
                    "bbb@twilio.com"
                ],
                "date_created": "2017-03-28T20:06:39Z",
                "date_updated": "2017-03-28T20:06:39Z",
                "email": "test@twilio.com",
                "links": {
                    "dependent_hosted_number_orders": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments/PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DependentHostedNumberOrders"
                },
                "sid": "PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "signing",
                "url": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments/PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->authorizationDocuments("PXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->hostedNumbers->authorizationDocuments("PXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/HostedNumbers/AuthorizationDocuments/PXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "address_sid": "ADaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "cc_emails": [
                    "test1@twilio.com",
                    "test2@twilio.com"
                ],
                "date_created": "2017-03-28T20:06:39Z",
                "date_updated": "2017-03-28T20:06:39Z",
                "email": "test+hosted@twilio.com",
                "links": {
                    "dependent_hosted_number_orders": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments/PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DependentHostedNumberOrders"
                },
                "sid": "PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "signing",
                "url": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments/PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->authorizationDocuments("PXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update();

        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->hostedNumbers->authorizationDocuments->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/HostedNumbers/AuthorizationDocuments'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "first_page_url": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments?PageSize=50&Page=0",
                    "key": "items",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments?PageSize=50&Page=0"
                },
                "items": []
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->authorizationDocuments->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "first_page_url": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments?PageSize=50&Page=0",
                    "key": "items",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments?PageSize=50&Page=0"
                },
                "items": [
                    {
                        "address_sid": "ADaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "cc_emails": [
                            "test1@twilio.com",
                            "test2@twilio.com"
                        ],
                        "date_created": "2017-03-28T20:06:39Z",
                        "date_updated": "2017-03-28T20:06:39Z",
                        "email": "test+hosted@twilio.com",
                        "links": {
                            "dependent_hosted_number_orders": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments/PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DependentHostedNumberOrders"
                        },
                        "sid": "PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "status": "signing",
                        "url": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments/PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->authorizationDocuments->read();

        $this->assertGreaterThan(0, count($actual));
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->hostedNumbers->authorizationDocuments->create(array("hostedNumberOrderSids"), "ADXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "email", "contactTitle", "contactPhoneNumber");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = array(
            'HostedNumberOrderSids' => Serialize::map(array("hostedNumberOrderSids"), function($e) { return $e; }),
            'AddressSid' => "ADXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
            'Email' => "email",
            'ContactTitle' => "contactTitle",
            'ContactPhoneNumber' => "contactPhoneNumber",
        );

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/HostedNumbers/AuthorizationDocuments',
            null,
            $values
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "address_sid": "ADaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "cc_emails": [
                    "test1@twilio.com",
                    "test2@twilio.com"
                ],
                "date_created": "2017-03-28T20:06:39Z",
                "date_updated": "2017-03-28T20:06:39Z",
                "email": "test+hosted@twilio.com",
                "links": {
                    "dependent_hosted_number_orders": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments/PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DependentHostedNumberOrders"
                },
                "sid": "PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "signing",
                "url": "https://preview.twilio.com/HostedNumbers/AuthorizationDocuments/PXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->authorizationDocuments->create(array("hostedNumberOrderSids"), "ADXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "email", "contactTitle", "contactPhoneNumber");

        $this->assertNotNull($actual);
    }
}