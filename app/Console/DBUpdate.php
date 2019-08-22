<?php

namespace App\Console;

use DB;
use Illuminate\Console\Command;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class DBUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Updates the database";

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
    public function handle()
    {
        $this->output->getFormatter()->setStyle('info', new OutputFormatterStyle('red'));

        if($this->confirm("Are you sure ?"))
        {
            $this->output->getFormatter()->setStyle('info', new OutputFormatterStyle('blue'));

            $this->info("Updating Database...\n");

            $this->info("Updating price types table...\n");
            $this->updatePriceTypesTable();

            $this->info("Updating properties table...\n");
            $this->updatePropertiesTable();

            $this->info("Adding project types table...\n");
            $this->addProjectTypesTable();

            $this->info("Adding project locations table...\n");
            $this->addProjectLocationsTable();

            $this->info("Adding projects table...\n");
            $this->addProjectsTable();
        }
    }

    public function updatePriceTypesTable()
    {
        DB::insert("INSERT INTO price_types (heading, created_at, updated_at) VALUES (?, ?, ?)", ['Price Guide', null, null]);
    }

    public function updatePropertiesTable()
    {
        DB::statement("ALTER TABLE properties ADD price_to INT NULL AFTER price");
        DB::statement("ALTER TABLE properties ADD project_id INT NULL AFTER location_id");
        DB::statement("ALTER TABLE properties CHANGE area area DECIMAL(10,2) UNSIGNED NULL");
    }

    public function addProjectTypesTable()
    {
        DB::statement("DROP TABLE IF EXISTS project_types");
        DB::statement("CREATE TABLE IF NOT EXISTS project_types (
                            id int(11) NOT NULL AUTO_INCREMENT,
                            project_type_name varchar(255) NOT NULL,
                            slug varchar(255) NOT NULL,
                            created_at timestamp NOT NULL,
                            updated_at timestamp NOT NULL,
                            PRIMARY KEY (id)
                    ) ENGINE=MyISAM DEFAULT CHARSET=latin1");
    }

    public function addProjectLocationsTable()
    {
        DB::statement("DROP TABLE IF EXISTS project_locations");

        DB::statement("CREATE TABLE IF NOT EXISTS project_locations (
                            id int(10) NOT NULL AUTO_INCREMENT,
                            location_id int(10) NOT NULL,
                            project_location_name varchar(255) NOT NULL,
                            slug varchar(255) NOT NULL,
                            location_image varchar(255) NOT NULL,
                            master_plan_image varchar(255) DEFAULT NULL,
                            description text NOT NULL,
                            created_at timestamp NOT NULL,
                            updated_at timestamp NOT NULL,
                            PRIMARY KEY (id)
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1");
    }

    public function addProjectsTable()
    {
        DB::statement("DROP TABLE IF EXISTS projects;");

        DB::statement("CREATE TABLE IF NOT EXISTS projects (
                            id int(10) NOT NULL AUTO_INCREMENT,
                            project_location_id int(10) NOT NULL,
                            project_type_id int(11) NOT NULL,
                            project_name varchar(255) NOT NULL,
                            project_image varchar(255) NOT NULL,
                            slug varchar(255) NOT NULL,
                            created_at timestamp NOT NULL,
                            updated_at timestamp NOT NULL,
                            PRIMARY KEY (id)
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1");
    }
}
