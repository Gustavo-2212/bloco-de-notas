<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations
{
    public static function decryptId($id)
    {
        try {
            $id = Crypt::decrypt($id);
        }
        catch(DecryptException $e)
        {
            return redirect("home");
        }

        return $id;
    }
}
