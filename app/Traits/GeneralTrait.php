<?php

namespace App\Traits;

trait GeneralTrait
{
    ////////////////////////////////////////////////////////////////////////
    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    ////////////////////////////////////////////////////////////////////////
    public function returnError($msg = "", $errNum)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }

    ////////////////////////////////////////////////////////////////////////
    public function returnSuccessMessage($msg = "")
    {
        return [
            'status' => true,
            'errNum' => '',
            'msg' => $msg
        ];
    }

    ////////////////////////////////////////////////////////////////////////
    public function returnData($msg = "", $key, $value)
    {
        return response()->json([
            'status' => true,
            'errNum' => "",
            'msg' => $msg,
            $key => $value
        ]);
    }

    ////////////////////////////////////////////////////////////////////////
    public function returnValidationError($code = "", $validator)
    {
        return $this->returnError($code, $validator->errors());
    }

    ////////////////////////////////////////////////////////////////////////
    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }

    ////////////////////////////////////////////////////////////////////////
    public function getErrorCode($input)
    {
        if ($input == "name_ar")
            return 'E0011';

        else if ($input == "password")
            return 'E002';

        else
            return "";
    }

    ////////////////////////////////////////////////////////////////////////
    public function saveImage($name , $path){
        $ImageExtenstion = $name->getClientOriginalExtension();
        $ImageName = time().rand().'.'.$ImageExtenstion;
        $name->move($path,$ImageName);
        return $ImageName;
    }

}
