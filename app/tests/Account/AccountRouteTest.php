<?php

//////////////////////
// RouteTestAccount //
//////////////////////
class AccountRouteTest extends TestCase {
    
    public function test_index(){
        $response = $this->call('GET','/');
        $this->assertEquals(302, $response->getStatusCode());
    }
    
    public function test_signin(){
        $response = $this->call('GET','/account/sign-in');
        $this->assertTrue($response->isOk());
    }
    public function test_signin_post(){
        $response = $this->call('POST','/account/sign-in');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_set_password(){
        $response = $this->call('GET','/account/set-password/HbCs1jWXJSKAcTnQkgQIowLsDcvSTlRdKQ3l2DX46bhjtX8omGxTpsLdWZ0m');
        $this->assertTrue($response->isOk());
    }
    public function test_set_password_post(){
        $response = $this->call('POST','/account/set-password/', 
            array( "code" => "uWw9dz9r7E4lDofpEwcWJxwK7GREhFjKzeqhRwoZeGCRUFQMIspdppIavZaC"));
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_reset_password(){
        $response = $this->call('GET','/account/reset-password/uWw9dz9r7E4lDofpEwcWJxwK7GREhFjKzeqhRwoZeGCRUFQMIspdppIavZaC');
        $this->assertTrue($response->isOk());
    }
    public function test_reset_password_post(){
        $response = $this->call('POST','/account/reset-password/', 
            array( "code" => "uWw9dz9r7E4lDofpEwcWJxwK7GREhFjKzeqhRwoZeGCRUFQMIspdppIavZaC"));
        $this->assertEquals(302, $response->getStatusCode());
    }


    public function test_forgot_password(){
        $response = $this->call('GET','/account/forgot-password');
        $this->assertTrue($response->isOk());
    }
    public function test_forgot_password_post(){
        $response = $this->call('POST','/account/forgot-password');
        $this->assertEquals(302, $response->getStatusCode());
    }

    

    
    
        
}