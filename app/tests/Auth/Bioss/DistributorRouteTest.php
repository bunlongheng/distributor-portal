<?php
class DistributorRouteTest extends TestCase {


    public function test_distributor_index(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/distributors');
        $this->assertTrue($response->isOk());
    }
    public function test_distributor_create(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','distributors/create');
        $this->assertTrue($response->isOk());
    }
    public function test_distributor_show(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','distributors/1');
        $this->assertTrue($response->isOk());
    }
    public function test_distributor_edit(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','distributors/1/edit');
        $this->assertTrue($response->isOk());
    }
    public function test_distributor_disabled(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','distributors/disabled');
        $this->assertTrue($response->isOk());
    }
    public function test_distributor_list_view(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','distributors/list_view');
        $this->assertTrue($response->isOk());
    }
    public function test_distributor_send_invitation(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET', 'distributors/1/send_invitation');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_distributor_store(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('POST','distributors/store');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_distributor_update(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('PUT','distributors/1/update');
        $this->assertEquals(302, $response->getStatusCode());
    }
// public function test_distributor_destroy(){
//     $bioss_user = new User(array('type' => 'Bioss'));
//     $this->be($bioss_user);
//     $response = $this->call('DELETE','distributors/1/destroy');
//     $this->assertTrue($response->isOk());
// }
}