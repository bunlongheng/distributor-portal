<?php


class ExportTypeRouteTest extends TestCase {
    
    
    public function test_export_type_index(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/export_types');
        $this->assertTrue($response->isOk());
        
    }
    public function test_export_type_create(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','export_types/create');
        $this->assertTrue($response->isOk());
        
    }
    public function test_export_type_show(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','export_types/1');
        $this->assertTrue($response->isOk());
        
    }
    public function test_export_type_edit(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','export_types/1/edit');
        $this->assertTrue($response->isOk());
        
    }

    public function test_export_type_store(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('POST','export_types/store');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_export_type_update(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('PUT','export_types/1/update');
        $this->assertEquals(302, $response->getStatusCode());
    }
    // public function test_export_type_destroy(){
    //     $bioss_export_type = new User(array('type' => 'Bioss'));
    //     $this->be($bioss_export_type);
    //     $response = $this->call('DELETE','export_types/1/destroy');
    //     $this->assertTrue($response->isOk());
    // }
        
}



