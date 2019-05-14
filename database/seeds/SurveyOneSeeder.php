<?php

use Illuminate\Database\Seeder;

class SurveyOneSeeder extends Seeder
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
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'heading',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Informatie over de patiënt:',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'text',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Leeftijd:',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'textarea',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Onderliggend lijden welk invloed kan hebben op de wondgenezing: (indien niet aanwezig gelieve n.v.t te vermelden).',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'heading',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Informatie over de wond',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'radio',
                'other'       => false,
                'other_label' => null,
                'text'        => null,
                'required'    => true,
                'options'     => json_encode(['Nieuwe wond', 'Bestaande wond']),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'text',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Sinds wanneer?',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => 6,
                'survey_id'   => 1,
                'type'        => 'radio',
                'other'       => false,
                'other_label' => null,
                'text'        => null,
                'required'    => true,
                'options'     => json_encode(['dag(en)', 'week/weken']),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Welke verband is het meest recentelijk op deze wond aangebracht?',
                'required'    => true,
                'options'     => json_encode([
                    ['Fiberverbanden met hoog absorptievermogen of alginaten, gelieve de naam van het product te vermelden:'],
                    ['Schuimverband, gelieve de naam van het product te vermelden:'],
                    ['Zilververband, gelieve de naam van het product te vermelden:'],
                    ['Superabsorberend, gelieve de naam van het product te vermelden:'],
                    ['Hydrocolloïde, gelieve de naam van het product te vermelden:'],
                    ['Ander(e) type(n), gelieve de naam van het product te vermelden:'],
                    'Geen',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'radio',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Type wond:',
                'required'    => true,
                'options'     => json_encode([
                    'Acute wond',
                    'Chronische wond',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'radio',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Geïnfecteerd?',
                'required'    => true,
                'options'     => json_encode([
                    'Ja',
                    'Nee',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => true,
                'other_label' => 'Andere acute wond, namelijk:',
                'text'        => '(Indien acute wond aangevinkt) het gaat in het bijzonder om een …',
                'required'    => true,
                'options'     => json_encode([
                    'Traumatische wond (oppervlakkige schaafwond, laceratie, flyctenen, oppervlakkige snijwonden en huidscheuren)',
                    'Tweedegraads brandwond',
                    'Dermabrasie / Ontvelling',
                    'Chirurgische wond',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => true,
                'other_label' => 'Andere chronische wond, namelijk',
                'text'        => '(Indien chronische wond aangevinkt) het gaat in het bijzonder om een …',
                'required'    => true,
                'options'     => json_encode([
                    'Decubitus wond',
                    'Ulcus Cruris beenwond',
                    'Diabetische voetwond',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Wat is de hoeveelheid wondvocht?',
                'required'    => true,
                'options'     => json_encode([
                    'Droog',
                    'Vochtig',
                    'Nat',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'text',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Locatie van het wondbed',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => 14,
                'survey_id'   => 1,
                'type'        => 'text',
                'other'       => false,
                'other_label' => null,
                'text'        => '% Necrotisch (zwart)',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => 14,
                'survey_id'   => 1,
                'type'        => 'text',
                'other'       => false,
                'other_label' => null,
                'text'        => '% Granulerend (rood)',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => 14,
                'survey_id'   => 1,
                'type'        => 'text',
                'other'       => false,
                'other_label' => null,
                'text'        => '% Beslag (geel)',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => 14,
                'survey_id'   => 1,
                'type'        => 'text',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Anders, namelijk',
                'required'    => false,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => true,
                'other_label' => null,
                'text'        => 'Toestand van de huid rondom de wond:',
                'required'    => true,
                'options'     => json_encode([
                    'Gezond',
                    'Geïrriteerd/rood',
                    'Droog/eczematisch',
                    'Gemacereerd',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'heading',
                'other'       => false,
                'other_label' => null,
                'text'        => 'D0 – 1e toepassing van AQUACEL Foam of Foam Lite™ ConvaTec:',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'date',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Datum (D0):',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Type verband:',
                'required'    => true,
                'options'     => json_encode([
                    'AQUACEL Foam',
                    'AQUACEL Ag Foam',
                    'Foam Lite ConvaTec',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'label',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Afmeting verbandkeuze:',
                'required'    => true,
                'options'     => null,
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],

            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => false,
                'other_label' => null,
                'text'        => 'AQUACEL Foam – plakkend',
                'required'    => true,
                'options'     => json_encode([
                    '8 x 8 cm',
                    '10 x 10 cm',
                    '12,5 x 12,5 cm',
                    '17,5 x 17,5 cm',
                    '21 x 21 cm',
                    '25 x 30 cm',
                    '8 x 13 cm',
                    '10 x 20 cm',
                    '10 x 25 cm',
                    '10 x 30 cm',
                    '19,8 x 14 cm',
                    '20 x 16,9 cm',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => false,
                'other_label' => null,
                'text'        => 'AQUACEL Foam - zonder kleefrand',
                'required'    => true,
                'options'     => json_encode([
                    '5 x 5 cm',
                    '10 x 10 cm',
                    '15 x 15 cm',
                    '10 x 20 cm',
                    '15 x 20 cm',
                    '20 x 20 cm',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],

            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => false,
                'other_label' => null,
                'text'        => 'AQUACEL Foam – anatomische vormen',
                'required'    => true,
                'options'     => json_encode([
                    'Allround 19,8 x 14 cm',
                    'Sacrum 20 x 16,9 cm',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Foam Lite™ ConvaTec',
                'required'    => true,
                'options'     => json_encode([
                    '5 x 5 cm',
                    '8 x 8 cm',
                    '10 x 10 cm',
                    '10 x 20 cm',
                    '15 x 15 cm',
                    '5,5 x 12 cm',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => true,
                'other_label' => 'Secundair verband, gelieve het primaire verband te vermelden:',
                'text'        => 'Op welke wijze gebruikt u het gekozen verband?',
                'required'    => true,
                'options'     => json_encode([
                    'Primair verband',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => true,
                'other_label' => null,
                'text'        => 'Waarom heeft u voor dit specifieke verband gekozen? (Meerdere antwoorden zijn mogelijk)',
                'required'    => true,
                'options'     => json_encode([
                    'Vormbaar, zacht, comfortabel voor de patiënt',
                    'Vochtig wondmilieu met Hydrofiber',
                    'Bescherming van de wondranden (verticale absorptie)',
                    'Vasthouden van wondvocht en bacteriën (retentie)',
                    'Verbetering/ verkleining van de wond',
                    'Minder verbandwissels en/of draagtijd verlengd',
                    'Eenvoudig te gebruiken',
                    'Goede kennis van en ervaringen met schuimverbanden',
                    'Goede kennis van en ervaringen met Hydrofiber-verbanden',
                    'Type wond en hoeveelheid wondvocht',
                    'Fase van de wond',
                    'Locatie van de wond',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'checkbox',
                'other'       => true,
                'other_label' => null,
                'text'        => 'Hoe ervaart u het aanbrengen van het verband?',
                'required'    => true,
                'options'     => json_encode([
                    'Gemakkelijk',
                    ['Redelijk gemakkelijk (omschrijf)'],
                    ['Niet gemakkelijk (omschrijf)'],
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'radio',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Kleeft het verband bij het aanbrengen aan de handschoenen of aan zichzelf?',
                'required'    => true,
                'options'     => json_encode([
                    'Ja',
                    'Nee',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
            [
                'parent_id'   => null,
                'survey_id'   => 1,
                'type'        => 'radio',
                'other'       => false,
                'other_label' => null,
                'text'        => 'Zo ja, is het herpositioneerbaar?',
                'required'    => true,
                'options'     => json_encode([
                    'Ja',
                    'Nee',
                ]),
                'created_at'  => new \Carbon\Carbon(),
                'updated_at'  => new \Carbon\Carbon(),
            ],
        ]);
    }
}
