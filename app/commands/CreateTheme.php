<?php

use Illuminate\Console\Command;
use PageWeb\Model\Theme;

/**
 * @author Tiamiyu waliu
 */
class CreateTheme extends Command
{
    /**
     * Console command name
     *
     * @var String
     */
    protected $name = 'pageweb:create-theme';

    /**
     * Console command Description
     *
     * @var string
     */
    protected $description = 'Create Theme';

    /**
     * Create a new Command instance
     */
    public function __construct()
    {
        parent::__construct();
        $this->theme = new Theme;
    }

    /**
     * Execute the console command
     */
    public function fire()
    {
        $name = $this->ask('Name: ');
        $description = $this->ask('Description: ');
        $categoryId = $this->ask('Category Id: ');

        if (empty($name) or empty($description) or empty($categoryId)) {
            $this->output->writeln('Please All this fields are required');

        } else {
            $this->theme->name = $name;
            $this->theme->description = $description;
            $this->theme->category_id = $categoryId;
            $this->theme->save();

            $this->output->writeln("\r\n");
            $this->output->writeln('Your Theme Is Created');
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
