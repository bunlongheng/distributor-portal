<?php


class UserRouteTest extends TestCase {
    
    
    public function test_user_index(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/users');
        $this->assertTrue($response->isOk());
        
    }
    public function test_user_create(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','users/create');
        $this->assertTrue($response->isOk());
        
    }
    public function test_user_show(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','users/1');
        $this->assertTrue($response->isOk());
        
    }
    public function test_user_edit(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','users/1/edit');
        $this->assertTrue($response->isOk());
        
    }

    public function test_user_store(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('POST','users/store');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_user_update(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('PUT','users/1/update');
        $this->assertEquals(302, $response->getStatusCode());
    }
    // public function test_user_destroy(){
    //     $bioss_user = new User(array('type' => 'Bioss'));
    //     $this->be($bioss_user);
    //     $response = $this->call('DELETE','users/1/destroy');
    //     $this->assertTrue($response->isOk());
    // }
        
}

