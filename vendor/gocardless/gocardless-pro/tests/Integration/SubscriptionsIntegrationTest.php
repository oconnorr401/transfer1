<?php
//
// WARNING: Do not edit by hand, this file was generated by Crank:
// https://github.com/gocardless/crank
//

namespace GoCardlessPro\Integration;

class SubscriptionsIntegrationTest extends IntegrationTestBase
{
    public function testResourceModelExists()
    {
        $obj = new \GoCardlessPro\Resources\Subscription(array());
        $this->assertNotNull($obj);
    }
    
    public function testSubscriptionsCreate()
    {
        $fixture = $this->loadJsonFixture('subscriptions')->create;
        $this->stub_request($fixture);

        $service = $this->client->subscriptions();
        $response = call_user_func_array(array($service, 'create'), (array)$fixture->url_params);

        $body = $fixture->body->subscriptions;
    
        $this->assertInstanceOf('\GoCardlessPro\Resources\Subscription', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->day_of_month, $response->day_of_month);
        $this->assertEquals($body->end_date, $response->end_date);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->interval, $response->interval);
        $this->assertEquals($body->interval_unit, $response->interval_unit);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->month, $response->month);
        $this->assertEquals($body->name, $response->name);
        $this->assertEquals($body->payment_reference, $response->payment_reference);
        $this->assertEquals($body->start_date, $response->start_date);
        $this->assertEquals($body->status, $response->status);
        $this->assertEquals($body->upcoming_payments, $response->upcoming_payments);
    

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    public function testSubscriptionsCreateWithIdempotencyConflict()
    {
        $fixture = $this->loadJsonFixture('subscriptions')->create;

        $idempotencyConflictResponseFixture = $this->loadFixture('idempotent_creation_conflict_invalid_state_error');

        // The POST request responds with a 409 to our original POST, due to an idempotency conflict
        $this->mock->append(new \GuzzleHttp\Psr7\Response(409, [], $idempotencyConflictResponseFixture));

        // The client makes a second request to fetch the resource that was already
        // created using our idempotency key. It responds with the created resource,
        // which looks just like the response for a successful POST request.
        $this->mock->append(new \GuzzleHttp\Psr7\Response(200, [], json_encode($fixture->body)));

        $service = $this->client->subscriptions();
        $response = call_user_func_array(array($service, 'create'), (array)$fixture->url_params);
        $body = $fixture->body->subscriptions;

        $this->assertInstanceOf('\GoCardlessPro\Resources\Subscription', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->day_of_month, $response->day_of_month);
        $this->assertEquals($body->end_date, $response->end_date);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->interval, $response->interval);
        $this->assertEquals($body->interval_unit, $response->interval_unit);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->month, $response->month);
        $this->assertEquals($body->name, $response->name);
        $this->assertEquals($body->payment_reference, $response->payment_reference);
        $this->assertEquals($body->start_date, $response->start_date);
        $this->assertEquals($body->status, $response->status);
        $this->assertEquals($body->upcoming_payments, $response->upcoming_payments);
        

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $conflictRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $conflictRequest->getUri()->getPath());
        $getRequest = $this->history[1]['request'];
        $this->assertEquals($getRequest->getUri()->getPath(), '/subscriptions/ID123');
    }
    
    public function testSubscriptionsList()
    {
        $fixture = $this->loadJsonFixture('subscriptions')->list;
        $this->stub_request($fixture);

        $service = $this->client->subscriptions();
        $response = call_user_func_array(array($service, 'list'), (array)$fixture->url_params);

        $body = $fixture->body->subscriptions;
    
        $records = $response->records;
        $this->assertInstanceOf('\GoCardlessPro\Core\ListResponse', $response);
        $this->assertInstanceOf('\GoCardlessPro\Resources\Subscription', $records[0]);

        $this->assertEquals($fixture->body->meta->cursors->before, $response->before);
        $this->assertEquals($fixture->body->meta->cursors->after, $response->after);
    

    
        foreach (range(0, count($body) - 1) as $num) {
            $record = $records[$num];
            $this->assertEquals($body[$num]->amount, $record->amount);
            $this->assertEquals($body[$num]->created_at, $record->created_at);
            $this->assertEquals($body[$num]->currency, $record->currency);
            $this->assertEquals($body[$num]->day_of_month, $record->day_of_month);
            $this->assertEquals($body[$num]->end_date, $record->end_date);
            $this->assertEquals($body[$num]->id, $record->id);
            $this->assertEquals($body[$num]->interval, $record->interval);
            $this->assertEquals($body[$num]->interval_unit, $record->interval_unit);
            $this->assertEquals($body[$num]->links, $record->links);
            $this->assertEquals($body[$num]->metadata, $record->metadata);
            $this->assertEquals($body[$num]->month, $record->month);
            $this->assertEquals($body[$num]->name, $record->name);
            $this->assertEquals($body[$num]->payment_reference, $record->payment_reference);
            $this->assertEquals($body[$num]->start_date, $record->start_date);
            $this->assertEquals($body[$num]->status, $record->status);
            $this->assertEquals($body[$num]->upcoming_payments, $record->upcoming_payments);
            
        }

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    
    public function testSubscriptionsGet()
    {
        $fixture = $this->loadJsonFixture('subscriptions')->get;
        $this->stub_request($fixture);

        $service = $this->client->subscriptions();
        $response = call_user_func_array(array($service, 'get'), (array)$fixture->url_params);

        $body = $fixture->body->subscriptions;
    
        $this->assertInstanceOf('\GoCardlessPro\Resources\Subscription', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->day_of_month, $response->day_of_month);
        $this->assertEquals($body->end_date, $response->end_date);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->interval, $response->interval);
        $this->assertEquals($body->interval_unit, $response->interval_unit);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->month, $response->month);
        $this->assertEquals($body->name, $response->name);
        $this->assertEquals($body->payment_reference, $response->payment_reference);
        $this->assertEquals($body->start_date, $response->start_date);
        $this->assertEquals($body->status, $response->status);
        $this->assertEquals($body->upcoming_payments, $response->upcoming_payments);
    

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    
    public function testSubscriptionsUpdate()
    {
        $fixture = $this->loadJsonFixture('subscriptions')->update;
        $this->stub_request($fixture);

        $service = $this->client->subscriptions();
        $response = call_user_func_array(array($service, 'update'), (array)$fixture->url_params);

        $body = $fixture->body->subscriptions;
    
        $this->assertInstanceOf('\GoCardlessPro\Resources\Subscription', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->day_of_month, $response->day_of_month);
        $this->assertEquals($body->end_date, $response->end_date);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->interval, $response->interval);
        $this->assertEquals($body->interval_unit, $response->interval_unit);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->month, $response->month);
        $this->assertEquals($body->name, $response->name);
        $this->assertEquals($body->payment_reference, $response->payment_reference);
        $this->assertEquals($body->start_date, $response->start_date);
        $this->assertEquals($body->status, $response->status);
        $this->assertEquals($body->upcoming_payments, $response->upcoming_payments);
    

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    
    public function testSubscriptionsCancel()
    {
        $fixture = $this->loadJsonFixture('subscriptions')->cancel;
        $this->stub_request($fixture);

        $service = $this->client->subscriptions();
        $response = call_user_func_array(array($service, 'cancel'), (array)$fixture->url_params);

        $body = $fixture->body->subscriptions;
    
        $this->assertInstanceOf('\GoCardlessPro\Resources\Subscription', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->day_of_month, $response->day_of_month);
        $this->assertEquals($body->end_date, $response->end_date);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->interval, $response->interval);
        $this->assertEquals($body->interval_unit, $response->interval_unit);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->month, $response->month);
        $this->assertEquals($body->name, $response->name);
        $this->assertEquals($body->payment_reference, $response->payment_reference);
        $this->assertEquals($body->start_date, $response->start_date);
        $this->assertEquals($body->status, $response->status);
        $this->assertEquals($body->upcoming_payments, $response->upcoming_payments);
    

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    public function testSubscriptionsCancelWithIdempotencyConflict()
    {
        $fixture = $this->loadJsonFixture('subscriptions')->cancel;

        $idempotencyConflictResponseFixture = $this->loadFixture('idempotent_creation_conflict_invalid_state_error');

        // The POST request responds with a 409 to our original POST, due to an idempotency conflict
        $this->mock->append(new \GuzzleHttp\Psr7\Response(409, [], $idempotencyConflictResponseFixture));

        // The client makes a second request to fetch the resource that was already
        // created using our idempotency key. It responds with the created resource,
        // which looks just like the response for a successful POST request.
        $this->mock->append(new \GuzzleHttp\Psr7\Response(200, [], json_encode($fixture->body)));

        $service = $this->client->subscriptions();
        $response = call_user_func_array(array($service, 'cancel'), (array)$fixture->url_params);
        $body = $fixture->body->subscriptions;

        $this->assertInstanceOf('\GoCardlessPro\Resources\Subscription', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->day_of_month, $response->day_of_month);
        $this->assertEquals($body->end_date, $response->end_date);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->interval, $response->interval);
        $this->assertEquals($body->interval_unit, $response->interval_unit);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->month, $response->month);
        $this->assertEquals($body->name, $response->name);
        $this->assertEquals($body->payment_reference, $response->payment_reference);
        $this->assertEquals($body->start_date, $response->start_date);
        $this->assertEquals($body->status, $response->status);
        $this->assertEquals($body->upcoming_payments, $response->upcoming_payments);
        

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $conflictRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $conflictRequest->getUri()->getPath());
        $getRequest = $this->history[1]['request'];
        $this->assertEquals($getRequest->getUri()->getPath(), '/subscriptions/ID123');
    }
    
}
