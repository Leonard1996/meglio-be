<?php

namespace Database\Seeders;

use App\Models\DataPrivacy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataPrivacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_privacies = [
            [
                'id' => 1,
                'order_number' => 1,
                'type' => 1,
                'content' => 'Il cliente acconsente al trattamento dei dati appartenenti a categorie particolari, per finalità connesse all’attività di consulenza e distribuzione assicurativa e di altre attività accessorie. '
            ],
            [
                'id' => 2,
                'order_number' => 2,
                'type' => 1,
                'content' => 'Il cliente acconsente alla conservazione dei contratti di assicurazione consegnati per la valutazione delle esigenze assicurative.',
            ],
            [
                'id' => 3,
                'order_number' => 3,
                'type' => 1,
                'content' => 'Il cliente acconsente al trattamento dei dati personali per finalità promozionali e di marketing attraverso strumenti tradizionali e strumenti di comunicazione elettronica?',
            ],
            [
                'id' => 4,
                'order_number' => 4,
                'type' => 1,
                'content' => 'Il cliente acconsente al trattamento dei dati personali per la comunicazione a soggetti terzi operanti nei settori delle telecomunicazioni, nei servizi bancari, finanziari ed assicurativi e IT (Information Technology) e nell’ambito della vendita diretta di beni e servizi per finalità promozionali e di marketing, sia attraverso strumenti tradizionali sia per il tramite di strumenti di comunicazione elettronica.',
            ]
        ];


        DataPrivacy::upsert($data_privacies,
            ['content'], ['content']
        );
    }
}
