<?php

use Illuminate\Console\Command;
use PageWeb\Model\ThemeCategory;

class CreateThemeCategory extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'pageweb:create-theme-category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Theme Category';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->themeCategory = new ThemeCategory();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $name = $this->ask('Name: ');

        if (!empty($name)) {
            $this->themeCategory->name = $name;
            $this->themeCategory->save();

            $this->output->writeln('Theme Category created successfully');
        } else {
            $this->output->writeln('Theme Category name is required');
        }
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
