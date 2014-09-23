<?php

use Cartalyst\Sentry\Groups\GroupNotFoundException;
use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\UserExistsException;
use Illuminate\Console\Command;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class CreateAdminUserCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'pageweb:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new admin user.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->sentry = app('sentry.admin');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $email = $this->ask('Email: ');
        $firstName = $this->ask('First Name: ');
        $lastName = $this->ask('Last Name: ');
        $password = $this->ask('Password: ');

        try {
            $credentials = [
                'email' => e($email),
                'password' => $password,
                'first_name' => e($firstName),
                'last_name' => e($lastName),
            ];

            $user = $this->sentry->register($credentials, $activate = true);

            $this->output->writeln("\r\n");
            $this->output->writeln('Admin User Created Successfully.');
            $this->output->writeln(str_repeat("=", 50));
            $this->output->writeln('Email: ' . $email);
            $this->output->writeln('First Name: ' . $firstName);
            $this->output->writeln('Last Name: ' . $lastName);

        } catch (LoginRequiredException $e) {
            $this->output->writeln('Email is required.');
        } catch (PasswordRequiredException $e) {
            $this->output->writeln('Password is required.');
        } catch (UserExistsException $e) {
            $this->output->writeln('User with these details already exists.');
        } catch (GroupNotFoundException $e) {
            $this->output->writeln('Invalid group');
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
