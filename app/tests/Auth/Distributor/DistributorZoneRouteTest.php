
<?php


class DistributorZoneRouteTest extends TestCase {
    
    
   
   
    public function test_distributors_show_as_distributor(){
        $distributor = Distributor::findOrFail(1);
        $this->be($distributor->user()->first());
        $response = $this->call('GET','/distributors/1');
        $this->assertTrue($response->isOk());
        
    }
    public function test_distributors_edit_as_distributor(){
        $distributor = Distributor::findOrFail(1);
        $this->be($distributor->user()->first());
        $response = $this->call('GET','/distributors/1/edit');
        $this->assertTrue($response->isOk());
        
    }

    public function test_distributors_update_as_distributor(){
        $distributor = Distributor::findOrFail(1);
        $this->be($distributor->user()->first());
        $response = $this->call('PUT','/distributors/1/update');
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_catalog_downloads_index_as_distributor(){
        $distributor = Distributor::findOrFail(1);
        $this->be($distributor->user()->first());
        $response = $this->call('GET','catalog_downloads');
        $this->assertTrue($response->isOk());
    }

    public function test_catalog_downloads_download_as_distributor(){
        $distributor = Distributor::findOrFail(1);
        $this->be($distributor->user()->first());
        $response = $this->call('GET','/catalog_downloads/55/download');
        $this->assertTrue($response->isOk());
    }

    public function test_catalog_downloads_download_excel_as_distributor(){
        $distributor = Distributor::findOrFail(1);
        $this->be($distributor->user()->first());
        $response = $this->call('GET','/catalog_downloads/55/excel/download');
        $this->assertTrue($response->isOk());
    }

}

