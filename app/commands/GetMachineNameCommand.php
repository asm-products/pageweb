<?php

use Illuminate\Console\Command;

class GetMachineNameCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'pageweb:machine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets your development machine name.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->output->writeln(sprintf('Your machine name: %s', gethostname()));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
