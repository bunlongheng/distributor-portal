<?php

use Illuminate\Support\Facades\Config;

class FileUploader
{
    static public function UploadViaSsh($file, $file_name)
    {
        try {
            $file_config = Config::get('filesystems.disks.ssh');
            $sftp = new Net_SFTP($file_config['host']);
            $key = new Crypt_RSA();
            $key->loadKey(file_get_contents(base_path() . '/app/config/' . $file_config['private_file']));
            if (!$sftp->login($file_config['username'], $key)) {
                return [
                    'status' => false,
                    'message' => 'Login Failed'
                ];
            }
            return $sftp->put($file_config['path'] . $file_name, $file, NET_SFTP_LOCAL_FILE);
        } catch (exception $e) {
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}