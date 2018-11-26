<?php

namespace App\Exceptions;

use Exception;

class UploadException extends Exception
{
    public  function render(){

		//return response()->json(['message' =>'上传文件过大', 'code' => 403],200);
		return response()->json(['message' =>$this->getMessage(), 'code' => 403],200);

	}
}
