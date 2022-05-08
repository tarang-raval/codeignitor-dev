<?php 

namespace App\Controllers;

use App\Controllers\BaseController;

class Migrate extends BaseController
{ 
  public function index()
  {
    echo 'Controller file index method run.';
  } 
  public function CreateMigration($version = NULL)
  {
    $this->load->library('migration'); 
    if(isset($version) && ($this->migration->version($version) === FALSE))
    {
      show_error($this->migration->error_string());
    } 
    elseif(is_null($version) && $this->migration->latest() === FALSE)
    {
      show_error($this->migration->error_string());
    }
     else
    {
      echo 'The migration file has executed successfully.';
    }
  }  
  public function undoMigration($version = NULL)
  {
    $this->load->library('migration');
    $migrations = $this->migration->find_migrations();
    $migrationKeys = array();
    foreach($migrations as $key => $migration)
    {
      $migrationKeys[] = $key;
    }
    if(isset($version) && array_key_exists($version,$migrations) && $this->migration->version($version))
    {
      echo 'The migration was undo';
      exit;
    }
    elseif(isset($version) && !array_key_exists($version,$migrations))
    {
      echo "The migration with selected version doesn't exist.";
    }
    else
    {
      $penultimate = (sizeof($migrationKeys)==1) ? 0 :      $migrationKeys[sizeof($migrationKeys) – 2];
      if($this->migration->version($penultimate))
      {
        echo 'The migration has been reverted successfully.';
        exit;
      }
      else
      {
        echo 'Couldn\'t roll back the migration.';
        exit;
      }
    }
  } 
  public function resetMigration()
  {
    $this->load->library('migration');
    if($this->migration->current()!== FALSE)
    {
      echo 'The migration was revert to the version set in the config file.';
      return TRUE;
    }
    else
    {
      echo 'Couldn\'t reset migration.';
      show_error($this->migration->error_string());
      exit;
    }
  }
} 