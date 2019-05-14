<?php

use Illuminate\Database\Seeder;

class SurveyThreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_questions')->insert([
            [
                'parent_id'  => null,
                'survey_id'  => 3,
                'type'       => 'radio',
                'other'      => true,
                'other_label' => null,
                'text'       => 'Bent u van plan om de behandeling voort te zetten met het gekozen verband?',
                'options'    => json_encode([
                    'Ja',
                    'Nee',
                ]),
                'created_at' => new \Carbon\Carbon(),
                'updated_at' => new \Carbon\Carbon(),
            ],
            [
                'parent_id'  => null,
                'survey_id'  => 3,
                'type'       => 'range',
                'other'      => false,
                'other_label' => null,
                'text'       => 'Zo ja, voor hoeveel van uw patiënten die een Schuimverband verband nodig hebben wilt u het gaan gebruiken? Geef een score van 0% tot 100%: 0% = geen van deze patiënten, 100% = al deze patiënten',
                'options'    => json_encode([
                    'percent' => true,
                    'min' => 0,
                    'max' => 100,
                ]),
                'created_at' => new \Carbon\Carbon(),
                'updated_at' => new \Carbon\Carbon(),
            ],
            [
                'parent_id'  => null,
                'survey_id'  => 3,
                'type'       => 'range',
                'other'      => false,
                'other_label' => null,
                'text'       => 'Algemene beoordeling van uw tevredenheid met het verband AQUACEL Foam of Foam Lite™ ConvaTec: Geef een cijfer van 1 t/m 10: 1 =  totaal niet tevreden, en 10 = zeer tevreden',
                'options'    => json_encode([
                    'percent' => false,
                    'min' => 0,
                    'max' => 10,
                ]),
                'created_at' => new \Carbon\Carbon(),
                'updated_at' => new \Carbon\Carbon(),
            ],
            [
                'parent_id'  => null,
                'survey_id'  => 3,
                'type'       => 'range',
                'other'      => false,
                'other_label' => null,
                'text'       => 'Algemene beoordeling van de door u in kaart gebrachte tevredenheid van de patiënt met AQUACEL Foam of Foam Lite™ ConvaTec: Geef een cijfer van 1 t/m 10: 1 =  totaal niet tevreden, en 10 = zeer tevreden',
                'options'    => json_encode([
                    'percent' => false,
                    'min' => 0,
                    'max' => 10,
                ]),
                'created_at' => new \Carbon\Carbon(),
                'updated_at' => new \Carbon\Carbon(),
            ],
            [
                'parent_id'  => null,
                'survey_id'  => 3,
                'type'       => 'radio',
                'other'      => true,
                'other_label' => null,
                'text'       => 'Zou u het verband AQUACEL Foam of Foam Lite™ ConvaTec  aanbevelen aan een andere zorgprofessional?',
                'options'    => json_encode([
                    'Ja',
                    'Nee',
                ]),
                'created_at' => new \Carbon\Carbon(),
                'updated_at' => new \Carbon\Carbon(),
            ],
            [
                'parent_id'  => null,
                'survey_id'  => 3,
                'type'       => 'range',
                'other'      => false,
                'other_label' => null,
                'text'       => 'Komt het voor dat u een tweede verband moet aanbrengen omdat het eerste aan zichzelf of aan uw handschoenen kleeft? Geef een score van 0% tot 100%: 0% = nooit, en 100% = altijd',
                'options'    => json_encode([
                    'percent' => true,
                    'min' => 0,
                    'max' => 100,
                ]),
                'created_at' => new \Carbon\Carbon(),
                'updated_at' => new \Carbon\Carbon(),
            ],
        ]);
    }
}
