<?php


class TierRouteTest extends TestCase {
    
    
    public function test_tier_index(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/tiers');
        $this->assertTrue($response->isOk());
        
    }
    public function test_tier_create(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','tiers/create');
        $this->assertTrue($response->isOk());
        
    }
    public function test_tier_show(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','tiers/1');
        $this->assertTrue($response->isOk());
        
    }
    public function test_tier_edit(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','tiers/1/edit');
        $this->assertTrue($response->isOk());
        
    }

    public function test_tier_store(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('POST','tiers/store');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_tier_update(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('PUT','tiers/1/update');
        $this->assertEquals(302, $response->getStatusCode());
    }
    // public function test_tier_destroy(){
    //     $bioss_tier = new User(array('type' => 'Bioss'));
    //     $this->be($bioss_tier);
    //     $response = $this->call('DELETE','tiers/1/destroy');
    //     $this->assertTrue($response->isOk());
    // }
        
}



