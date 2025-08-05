<?php


class CountryRouteTest extends TestCase {
    
    
    public function test_country_index(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/countries');
        $this->assertTrue($response->isOk());
        
    }
    public function test_country_create(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','countries/create');
        $this->assertTrue($response->isOk());
        
    }
    public function test_country_show(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','countries/1');
        $this->assertTrue($response->isOk());
        
    }
    public function test_country_edit(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','countries/1/edit');
        $this->assertTrue($response->isOk());
        
    }

    public function test_country_store(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('POST','countries/store');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_country_update(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('PUT','countries/1/update');
        $this->assertEquals(302, $response->getStatusCode());
    }
    // public function test_country_destroy(){
    //     $bioss_country = new User(array('type' => 'Bioss'));
    //     $this->be($bioss_country);
    //     $response = $this->call('DELETE','countries/1/destroy');
    //     $this->assertTrue($response->isOk());
    // }
        
}



