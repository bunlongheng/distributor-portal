<?php
class AuthRouteTest extends TestCase {


    public function test_dashboard_as_bioss(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/dashboard');
        $this->assertTrue($response->isOk());

    }
    public function test_dashboard_as_distributor(){
        $user = User::where('type','=','Distributor')->first();
        $this->be($user);
        $response = $this->call('GET','/dashboard');
        $this->assertTrue($response->isOk());

    }

    public function test_change_password_as_bioss(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/account/change-password');
        $this->assertTrue($response->isOk());
    }
    public function test_change_password_as_distributor(){
        $user = User::where('type','=','Distributor')->first();
        $this->be($user);
        $response = $this->call('GET','/account/change-password');
        $this->assertTrue($response->isOk());
    }
    public function test_change_password_post_as_bioss(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('POST','/account/change-password');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_signout_as_bioss(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/account/sign-out');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_change_password_post_as_distributor(){
        $user = User::where('type','=','Distributor')->first();
        $this->be($user);
        $response = $this->call('POST','/account/change-password');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_signout_as_distributor(){
        $user = User::where('type','=','Distributor')->first();
        $this->be($user);
        $response = $this->call('GET','/account/sign-out');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_phpinfo_as_distributor(){
        $user = User::where('type','=','Distributor')->first();
        $this->be($user);
        $response = $this->call('GET','/phpinfo');
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function test_test_zone_as_distributor(){
        $user = User::where('type','=','Distributor')->first();
        $this->be($user);
        $response = $this->call('GET','/test/1');
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function test_phpinfo_as_bioss(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/phpinfo');
        $this->assertTrue($response->isOk());
    }
    public function test_test_zone_as_bioss(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/test/1');
        $this->assertTrue($response->isOk());
    }
}