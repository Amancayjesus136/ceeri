<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class CallRenameOldDB extends Command {

  protected $signature = 'script:rename-old';

  protected $description = 'Script para renombrar tablas a old';

  private $credentials;

  public function __construct()
  {
      parent::__construct();
  }

  public function handle()
  {
    $tables = DB::select('SHOW TABLES');
    //return dd($tables);
    if ($tables) {
      foreach ($tables as $table) {
        if (
          !str_contains($table->Tables_in_sgav2, 'new_') &&
          !str_contains($table->Tables_in_sgav2, 'old_')
        ) {
          DB::statement('RENAME TABLE `'.$table->Tables_in_sgav2.'` TO `old_'.$table->Tables_in_sgav2.'`;');

          echo 'Antiguo: '.$table->Tables_in_sgav2.'<br>';
          echo 'Nuevo: old_'.$table->Tables_in_sgav2;
          echo '<hr>';
        }
      }
    }
  }
}