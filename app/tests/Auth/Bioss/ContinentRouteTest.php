<?php


class ContinentRouteTest extends TestCase {
    
    
    public function test_continent_index(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/continents');
        $this->assertTrue($response->isOk());
        
    }
    public function test_continent_create(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','continents/create');
        $this->assertTrue($response->isOk());
        
    }
    public function test_continent_show(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','continents/1');
        $this->assertTrue($response->isOk());
        
    }
    public function test_continent_edit(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','continents/1/edit');
        $this->assertTrue($response->isOk());
        
    }

    public function test_continent_store(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('POST','continents/store');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_continent_update(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('PUT','continents/1/update');
        $this->assertEquals(302, $response->getStatusCode());
    }
    // public function test_continent_destroy(){
    //     $bioss_continent = new User(array('type' => 'Bioss'));
    //     $this->be($bioss_continent);
    //     $response = $this->call('DELETE','continents/1/destroy');
    //     $this->assertTrue($response->isOk());
    // }
        
}



