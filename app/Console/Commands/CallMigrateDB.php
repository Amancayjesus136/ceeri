<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class CallMigrateDB extends Command {

  protected $signature = 'script:migrate-db';

  protected $description = 'Script para traspasar la info de las tablas old a las new';

  private $credentials;

  public function __construct()
  {
      parent::__construct();
  }

  public function handle()
  {
    $eventos = DB::table('old_sga_eventos')->get();
    //return dd($eventos);
    if ($eventos) {
      foreach ($eventos as $old) {

        DB::table('new_sga_eventos')->insert([
          'idtipoevento' => $old->idtipoevento,
          'idmodalidad' => $old->idmodalidad,
          'idmetodologia' => $old->idmetodologia,
          'eve_nombre' => $old->eve_nombre,
          'eve_feini' => $old->eve_feini,
          'eve_fecfin' => $old->eve_fecfin,
          'eve_horas' => $old->eve_horas,
          'eve_lugar' => $old->eve_lugar,
          'eve_horario' => $old->eve_horario,
          'eve_contenido' => $old->eve_contenido,
          'eve_costo' => $old->eve_costo,
          'eve_alcance' => $old->eve_alcance,
          'eve_nbecas' => $old->eve_nbecas,
          'idtiposolicitud' => $old->idtiposolicitud,
          'idfuentefinanciamiento' => $old->idfuentefinanciamiento,
          'eve_anio' => $old->eve_anio,
          'eve_acta' => $old->eve_acta,
          'idcurso' => $old->idcurso,
          'eve_cupos' => $old->eve_cupos,
          'idcentrocapacitacion' => $old->idcentrocapacitacion,
          'idformato' => $old->idformato,
          'idformato2' => $old->idformato2,
          'eve_mask' => '',
          'eve_curso' => '',
          'eve_evaluar' => '',
          'eve_estado' => '',
          'eve_mensaje' => ''
        ]);
      }
    }
  }
}