<?php

use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class ImportThemesCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'pageweb:import-themes';

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
        $finder = new Finder();
        $finder->directories()
            ->in(public_path() . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR)
            ->depth('== 0');

        foreach ($finder as $directory) {
            /** @var $directory \Symfony\Component\Finder\SplFileInfo */
            $configFile = $directory->getRealPath() . DIRECTORY_SEPARATOR . 'config.php';
            if (file_exists($configFile)) {
                $config = $this->requireConfig($configFile);
                $data = [
                    'name' => $directory->getBasename(),
                    'category_id' => 0,
                    'description' => isset($config['description']) ? $config['description'] : '',
                    'title' => isset($config['title']) ? $config['title'] : ''
                ];

                /** @var $themeRepo \PageWeb\Repository\ThemeRepository */
                $themeRepo = App::make('PageWeb\Repository\ThemeRepository');

                if ($themeRepo->findByName($data['name'])) {
                    $this->output->writeln('Theme: "' . $directory->getBasename() . '" skipped!.');
                    continue;
                }

                if ($themeRepo->save($data)) {
                    $this->output->writeln('Theme: "' . $directory->getBasename() . '" import successful.');
                } else {
                    $this->output->writeln('Theme: "' . $directory->getBasename() . '" import failed.');
                }
            }
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

    protected function requireConfig($file)
    {
        return require_once $file;
    }
}
