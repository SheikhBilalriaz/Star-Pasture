<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserSubscriptionHandler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-subscription-handler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handles user payment renewals and subscription expirations.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->update_annual_subscription();
    }

    private function update_annual_subscription()
    {
        $users = User::where('subscription_expires_on', '<', now())->where('is_active', true)->get();

        foreach ($users as $user) {
            if ($user->emailCount->email_count > 2) {
                $user->is_active = false;
                $user->save();
                //TODO: Send an email of saying that account is deactivated
                continue;
            }
            $user->sendAnnualSubscriptionNotification();
            $user->emailCount->email_count += 1;
            $user->emailCount->save();
        }
    }
}
