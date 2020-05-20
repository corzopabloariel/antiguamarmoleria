<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Auth\UpdateController AS uC;
use Illuminate\Support\Facades\Mail;
use App\Mail\AvisoMail;

class UpdateRegister extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualización de DB 11, 17 y 22hs';

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
        Mail::to( "corzo.pabloariel@gmail.com" )->send( new AvisoMail( "Inicio de Script - Actualización de base" ) );
        (new uC)->automoviles();
        (new uC)->clientes();
        (new uC)->polizas();
        Mail::to( "corzo.pabloariel@gmail.com" )->send( new AvisoMail( "Fin de Script - Actualización de base" ) );
    }
}
