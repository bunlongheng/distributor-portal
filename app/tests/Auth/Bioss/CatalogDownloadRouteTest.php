<?php


class CatalogDownloadRouteTest extends TestCase {
    
    
    public function test_catalog_downloads_index(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','/catalog_downloads');
        $this->assertTrue($response->isOk());
        
    }
    public function test_catalog_downloads_create(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','catalog_downloads/create');
        $this->assertTrue($response->isOk());
        
    }
    public function test_catalog_downloads_show(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','catalog_downloads/55');
        $this->assertTrue($response->isOk());
        
    }
    public function test_catalog_downloads_edit(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','catalog_downloads/55/edit');
        $this->assertTrue($response->isOk());
        
    }

    public function test_catalog_downloads_store(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('POST','catalog_downloads/store');
        $this->assertEquals(302, $response->getStatusCode());
    }
    public function test_catalog_downloads_update(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('PUT','catalog_downloads/55/update');
        $this->assertEquals(302, $response->getStatusCode());
    }
    // public function test_catalog_downloads_destroy(){
    //     $bioss_catalog_downloads = new User(array('type' => 'Bioss'));
    //     $this->be($bioss_catalog_downloads);
    //     $response = $this->call('DELETE','catalog_downloads/55/destroy');
    //     $this->assertTrue($response->isOk());
    // }

    public function test_catalog_downloads_download_internal(){
        $user = User::where('type','=','Bioss')->first();
        $this->be($user);
        $response = $this->call('GET','catalog_downloads/55/download/1');
        $this->assertTrue($response->isOk());
    }
        
}



