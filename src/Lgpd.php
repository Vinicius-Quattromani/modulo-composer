<?php

namespace ViniciusQuattromani;

use Seed;

require_once(__DIR__ . '/components/seed.php');

class Lgpd
{   
    public function handler(
        $nome_empresa = 'NOME EMPRESA',
        $email_empresa = 'EMAIL EMPRESA',
        $site_empresa = 'SITE EMPRESA',
        $pessoa_juridica = 'PESSOA JURIDICA'
    ){
        $obj_juridico = new Seed();
        $conteudo_view = file_get_contents(__DIR__ . '/components/view.php');
        $conteudo_scss = file_get_contents(__DIR__ . '/components/politica_privacidade.scss');
        $conteudo_migrate = file_get_contents(__DIR__ . '/components/migrate.php');
        $conteudo_seed = $obj_juridico->exportSeed($nome_empresa, $email_empresa, $site_empresa, $pessoa_juridica);
        $conteudo_model = file_get_contents(__DIR__ . '/components/model.php');
        $conteudo_controller = file_get_contents(__DIR__ . '/components/controller.php');
        $conteudo_rota = '
Route::get("/politica-de-privacidade", "PoliticaPrivacidadeController@index");
        ';

        define("RAIZ", "../../../../");

        // view politica_privaciade
        if(!(file_exists(RAIZ . 'resources/views/PoliticaPrivacidade/'))){
            mkdir(RAIZ . 'resources/views/PoliticaPrivacidade/', 0777, true);
        }
        file_put_contents(RAIZ . 'resources/views/PoliticaPrivacidade/politicaPrivacidade.blade.php', $conteudo_view);
        
        // estilo sass
        if(!(file_exists(RAIZ . 'resources/sass/'))){
            mkdir(RAIZ . 'resources/sass/', 0777, true);
        }
        file_put_contents(RAIZ . 'resources/sass/politica_privacidade.scss', $conteudo_scss);

        // migration
        $destino_migration = RAIZ . 'database/migrations/'.date('Y_m_d').'_000000_create_politica_privacidade_table.php';
        if(!(file_exists(RAIZ . 'database/migrations/'))){
            mkdir(RAIZ . 'database/migrations/', 0777, true);
        }
        file_put_contents($destino_migration, $conteudo_migrate);

        // seeder
        if(!(file_exists(RAIZ . 'database/seeds/'))){
            mkdir(RAIZ . 'database/seeds/', 0777, true);
        }
        file_put_contents(RAIZ . 'database/seeds/PoliticaPrivacidadeSeeder.php', $conteudo_seed);

        // model
        if(!(file_exists(RAIZ . 'app/Models/'))){
            mkdir(RAIZ . 'app/Models/', 0777, true);
        }
        file_put_contents(RAIZ . 'app/Models/PoliticaPrivacidade.php', $conteudo_model);

        // politica privacidade controller
        if(!(file_exists(RAIZ . 'app/Http/Controllers/'))){
            mkdir(RAIZ . 'app/Http/Controllers/', 0777, true);
        }
        file_put_contents(RAIZ . 'app/Http/Controllers/PoliticaPrivacidadeController.php', $conteudo_controller);
        
        // rota
        if(!(file_exists(RAIZ . 'routes/'))){
            mkdir(RAIZ . 'routes/', 0777, true);
        }
        file_put_contents(RAIZ . 'routes/web.php', $conteudo_rota, FILE_APPEND);
        
        return true;
    }
}