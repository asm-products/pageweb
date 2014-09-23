<?php

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SubscriptionPlansSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        DB::table('subscription_plans')->delete();
        DB::table('subscription_plans')->insert(array(
            [
                'name' => 'pw_personal_monthly',
                'title' => 'Personal Monthly Plan',
                'description' => 'Personal Monthly Plan in Dollars',
                'amount' => '6',
                'settings' => '',
                'created_at' => $now
            ],
            [
                'name' => 'pw_business_monthly',
                'title' => 'Business Monthly Plan',
                'description' => 'Business Monthly Plan in Dollars',
                'amount' => '14',
                'settings' => '',
                'created_at' => $now
            ],
            [
                'name' => 'pw_professional_monthly',
                'title' => 'Professional Monthly Plan',
                'description' => 'Professional Monthly Plan in Dollars',
                'amount' => '20',
                'settings' => '',
                'created_at' => $now
            ],
            [
                'name' => 'pw_personal_yearly',
                'title' => 'Personal Yearly Plan',
                'description' => 'Personal Yearly Plan in Dollars with a discount of 20%',
                'amount' => '57.60',
                'settings' => '',
                'created_at' => $now
            ],
            [
                'name' => 'pw_business_yearly',
                'title' => 'Business Yearly Plan',
                'description' => 'Business Yearly Plan in Dollars with a discount of 20%',
                'amount' => '134.40',
                'settings' => '',
                'created_at' => $now
            ],
            [
                'name' => 'pw_professional_yearly',
                'title' => 'Professional Yearly Plan',
                'description' => 'Professional Yearly Plan in Dollars with a discount of 20%',
                'amount' => '192',
                'settings' => '',
                'created_at' => $now
            ]
        ));
    }
}
