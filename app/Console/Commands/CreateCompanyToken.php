<?php

namespace App\Console\Commands;

use App\Helpers\Helpers;
use App\Models\Company;
use Illuminate\Console\Command;

class CreateCompanyToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-token
                            {company : Name of the company }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $company_name = $this->argument('company');

        $token = Helpers::createCompanyTooken($company_name);

        $company = Company::where('name', strtolower($company_name))->update(['token' => $token]);

        if ($company) {
            return $company;
        }

        return 'Company with this name doesnt exist!';
    }
}
