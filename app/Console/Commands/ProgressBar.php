<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProgressBar extends Command
{

    protected $signature = 'import:excel';

    protected $description = 'Laravel Excel importer';

    public function handle()
    {
        $this->output->title('Starting import');
        (new UsersImport)->withOutput($this->output)->import('users.xlsx');
        $this->output->success('Import successful');
    }

}
