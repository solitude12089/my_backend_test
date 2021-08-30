<?php

namespace App\Actions\Auth;

use Illuminate\Http\Response;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Carbon\Carbon;
class Token
{
    use AsAction;

   
    public function handle(ActionRequest $request)
    {
        $payload = auth()->getPayload();
        $tokenStatus = collect([
            'expired_at' => $payload->get('exp'),
            'not_before_at' => $payload->get('nbf'),
            'issued_at' => $payload->get('iat'),
        ]) 
        ->map(fn($value) => Carbon::createFromTimestamp($value)->toIso8601ZuluString());
        return $tokenStatus;
       
    }
}
