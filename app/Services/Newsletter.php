<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter{
    public function subscribe(string $email, string $list = null){
        $list ??= config('services.mailchimp.lists.xubscribers');
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us13'
        ]);

        return $this->client()->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    protected function client() {
        $mailchimp = new ApiClient();

        return $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us13'

        ]);
    }
}
