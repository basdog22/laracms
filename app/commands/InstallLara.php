<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class InstallLara extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'InstallLara';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs the LaraCMS from the command line.';

    /**
     * Create a new command instance.
     *
     * @return void
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

        $config = require("/../config/database.php");
        extract($config['connections'][$config['default']]);
        $this->createDb($database);
        Artisan::call('migrate', array('--force' => true));
        $this->populateDb();
        $this->info('LaraCMS Installed');

    }

    public  function populateDb(){
        $config = require("/../config/cms.php");
        extract($config);
        //addons
        //laracms
        $addon = new Addons;
        $addon->addon_name = 'laracms';
        $addon->addon_title = 'Core System Addon';
        $addon->icon_image = 'http://laravel.com/assets/img/logo-head.png';
        $addon->version = '1.0.1';
        $addon->author = 'bonweb';
        $addon->url = 'http://www.bonweb.gr';
        $addon->installed = 1;
        $addon->save();
        ClassLoader::addDirectories(array(
            public_path() . "/addons/laracms/controllers",
            public_path() . "/addons/laracms/models",
            public_path() . "/addons/laracms/helpers",
        ));
        //add the screensaver setting
        $setting = new Settings;
        $setting->area = 'backend';
        $setting->section = 'laracms';
        $setting->setting_name = 'screensaver';
        $setting->setting_value = '60000';
        $setting->autoload = 1;
        $setting->save();
        //grid manager
        $addon = new Addons;
        $addon->addon_name = 'grid_manager';
        $addon->addon_title = 'Grid Manager';
        $addon->icon_image = 'http://laravel.com/assets/img/logo-head.png';
        $addon->version = '1.0.1';
        $addon->author = 'bonweb';
        $addon->url = 'http://www.bonweb.gr';
        $addon->installed = 1;
        $addon->save();
        ClassLoader::addDirectories(array(
            public_path() . "/addons/grid_manager/controllers",
            public_path() . "/addons/grid_manager/models",
            public_path() . "/addons/grid_manager/helpers",
        ));
        require_once public_path() . "/addons/grid_manager/func.php";
        Event::fire('backend.addons.saveaddoninfo.grid_manager',array($addon));
        //themes
        $theme = new Themes;
        $theme->theme_name = 'lara';
        $theme->theme_title = 'LaraCMS Default Theme';
        $theme->icon_image = 'http://laravel.com/assets/img/logo-head.png';
        $theme->version = '1.0.1';
        $theme->author = 'bonweb';
        $theme->url = 'http://www.bonweb.gr';
        $theme->installed = 1;
        $theme->active = 1;
        $theme->save();
        //users


        $user = new User;
        $user->firstname = 'John';
        $user->lastname = 'Doe';
        $user->email = $config['admin_email'];
        $user->is_admin = '1';
        $pass = Commoner::generatePass('administrator',$config['admin_email']);
        $user->password = Hash::make($pass);
        $user->save();

        $this->info('Your Password is:'.$pass);

        //add the languages
        $lang = new Languages;
        $lang->code = 'en_US';
        $lang->title = 'English';
        $lang->image = "/uploads/flags/Englang.png";
        $lang->active = 1;
        $lang->save();
        $lang = new Languages;
        $lang->code = 'el_GR';
        $lang->title = 'Greek';
        $lang->image = "/uploads/flags/Greece.png";
        $lang->active = 1;
        $lang->save();
    }

    public  function createDb($database){
//        define('STDIN',fopen("php://stdin","r"));
        $config = require("/../config/database.php");

        extract($config['connections'][$config['default']]);

        $connection = new PDO("{$driver}:host={$host}", $username, $password);

        $connection->query("DROP DATABASE IF EXISTS ".$database);
        $connection->query("CREATE DATABASE ".$database);

    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(

        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(

        );
    }

}
