<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Send email via Sendgrid
     */
    protected function sendEmail($to, $user)
    {
      
$subject = "verify email";

$message = view('EmailTemplate.verify-email', compact('user'))->render();
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <rfq@example.com>' . "\r\n";

// mail($to,$subject,$message,$headers);
    }
    
    /**
     * Gets the unique Email Verification token
     */
    public function _getForgotPasswordVerificationToken()
    {
        $token = '';

        while (true) 
        {
            $token = $this->_random_string(FORGOT_PASSWORD_VERIFICATION_TOKEN_LENGTH);

            $token_exists = User::select('id')->where('remember_token', $token)->count();

            if ($token_exists == 0)
            {
                break;
            }
        }

        return $token;
    }

     /**
     * Generates random string as per the given length
     * 
     * @param type $length
     * @param type $valid_chars
     * @return type
     */
    private function _random_string($length, $valid_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890")
    {
        $random_string = "";
        $num_valid_chars = strlen($valid_chars);
        for ($i = 0; $i < $length; $i++) {
            $random_pick = mt_rand(1, $num_valid_chars);
            $random_char = trim($valid_chars[$random_pick - 1]);

            if (!$random_char)
            {
                $i--;
            } 
            else 
            {
                $random_string .= $random_char;
            }
        }
        return $random_string;
    }

}
