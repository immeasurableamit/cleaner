<?php

namespace App;

class Base64Image {

	/*
	 * @returns array ( decoded_base64, image_extension )
	 */
	public function decode( string $encoded_base64 )
	{
		preg_match("/data:image\/(.*?);/",$encoded_base64,$image_extension); // extract the image extension

        $image = preg_replace('/data:image\/(.*?);base64,/','',$encoded_base64); // remove the type part
        $image = str_replace(' ', '+', $image);

		return [
			'decoded_base64_image' => base64_decode( $image ),
			'extension' => $image_extension[1],
		];

	}
	
	protected function putSlashAtEndIfNotPresent( $path )
	{
		return substr( $path, -1 ) == "/" ?: $path .= "/";
	}

	public function save( string $encoded_base64, string $dir_path )
	{
		if ( ! is_dir( $dir_path )) {
			throw new \Exception("Directory does not exists: $dir_path");
		}

		$decoded_result = $this->decode($encoded_base64);

		$file_name = time().".".$decoded_result['extension'];

		$dir_path  = $this->putSlashAtEndIfNotPresent( $dir_path );
		$file_path = $dir_path.$file_name;

	
		file_put_contents( $file_path, $decoded_result['decoded_base64_image'] );
		return $file_name;
	}
}
