<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = Category::create([
            'type' => '4',
            'name' => 'SALDO INICIAL',
            'slug' => Str::slug('SALDO INICIAL')
        ]);

        $subcategory1 = Subcategory::create([
            'name' => 'SALDO INICIAL',
            'slug' => Str::slug('SALDO INICIAL'),
            'category_id' => 1
        ]);

        $category2 = Category::create([
            'type' => '4',
            'name' => 'AJUSTES',
            'slug' => Str::slug('AJUSTES')
        ]);

        $subcategory2 = Subcategory::create([
            'name' => 'AJUSTES',
            'slug' => Str::slug('AJUSTES'),
            'category_id' => 2
        ]);

        $category3 = Category::create([
            'type' => '3',
            'name' => 'TRANFER',
            'slug' => Str::slug('TRANFER')
        ]);

        $subcategory3 = Subcategory::create([
            'name' => 'TRANFER',
            'slug' => Str::slug('TRANFER'),
            'category_id' => 3
        ]);

        $category4 = Category::create([
            'type' => '1',
            'name' => 'SALARIO',
            'slug' => Str::slug('SALARIO')
        ]);
        
        $subcategory4 = Subcategory::create([
            'name' => 'SALARIO',
            'slug' => Str::slug('SALARIO'),
            'category_id' => 4
        ]);

        $category5 = Category::create([
            'type' => '1',
            'name' => 'INVERSIONES',
            'slug' => Str::slug('INVERSIONES')
        ]);
        
        $subcategory5 = Subcategory::create([
            'name' => 'PLAZO FIJO',
            'slug' => Str::slug('PLAZO FIJO'),
            'category_id' => 5
        ]);

        $category6 = Category::create([
            'type' => '2',
            'name' => 'ALIMENTOS',
            'slug' => Str::slug('ALIMENTOS')
        ]);
        
        $subcategory6 = Subcategory::create([
            'name' => 'ALIMENTOS',
            'slug' => Str::slug('ALIMENTOS'),
            'category_id' => 6
        ]);

        $category7 = Category::create([
            'type' => '2',
            'name' => 'ASISTENCIA FAMILIAR',
            'slug' => Str::slug('ASISTENCIA FAMILIAR')
        ]);
        
        $subcategory7 = Subcategory::create([
            'name' => 'KINESIOLOGIA JOSE',
            'slug' => Str::slug('KINESIOLOGIA JOSE'),
            'category_id' => 7
        ]);

        $category8 = Category::create([
            'type' => '2',
            'name' => 'SALIDA A COMER',
            'slug' => Str::slug('SALIDA A COMER')
        ]);
        
        $subcategory8 = Subcategory::create([
            'name' => 'SALIDA A COMER',
            'slug' => Str::slug('SALIDA A COMER'),
            'category_id' => 8
        ]);

        $category9 = Category::create([
            'type' => '2',
            'name' => 'CUIDADO PERSONAL',
            'slug' => Str::slug('CUIDADO PERSONAL')
        ]);
        
        $subcategory9 = Subcategory::create([
            'name' => 'PELUQUERIA',
            'slug' => Str::slug('PELUQUERIA'),
            'category_id' => 9
        ]);

        $category10 = Category::create([
            'type' => '2',
            'name' => 'FAUSTINA',
            'slug' => Str::slug('FAUSTINA')
        ]);
        
        $subcategory10 = Subcategory::create([
            'name' => 'FAUSTINA',
            'slug' => Str::slug('FAUSTINA'),
            'category_id' => 10
        ]);

        $category11 = Category::create([
            'type' => '2',
            'name' => 'OTROS GASTOS',
            'slug' => Str::slug('OTROS GASTOS')
        ]);
        
        $subcategory11 = Subcategory::create([
            'name' => 'OTROS GASTOS',
            'slug' => Str::slug('OTROS GASTOS'),
            'category_id' => 11
        ]);

        $category12 = Category::create([
            'type' => '2',
            'name' => 'REFACCIONES',
            'slug' => Str::slug('REFACCIONES')
        ]);
        
        $subcategory12 = Subcategory::create([
            'name' => 'REFACCIONES',
            'slug' => Str::slug('REFACCIONES'),
            'category_id' => 12
        ]);

        $category13 = Category::create([
            'type' => '2',
            'name' => 'NAVIDAD',
            'slug' => Str::slug('NAVIDAD')
        ]);
        
        $subcategory13 = Subcategory::create([
            'name' => 'NAVIDAD',
            'slug' => Str::slug('NAVIDAD'),
            'category_id' => 13
        ]);

        $category14 = Category::create([
            'type' => '2',
            'name' => 'ASISTENCIA SANITARIA',
            'slug' => Str::slug('ASISTENCIA SANITARIA')
        ]);
        
        $subcategory14 = Subcategory::create([
            'name' => 'ATENCION MEDICA',
            'slug' => Str::slug('ATENCION MEDICA'),
            'category_id' => 14
        ]);

        $subcategory15 = Subcategory::create([
            'name' => 'DENTISTA',
            'slug' => Str::slug('DENTISTA'),
            'category_id' => 14
        ]);

        $subcategory16 = Subcategory::create([
            'name' => 'LABORATORIO',
            'slug' => Str::slug('LABORATORIO'),
            'category_id' => 14
        ]);

        $category15 = Category::create([
            'type' => '2',
            'name' => 'FACTURAS',
            'slug' => Str::slug('FACTURAS')
        ]);

        $subcategory17 = Subcategory::create([
            'name' => 'SIS',
            'slug' => Str::slug('SIS'),
            'category_id' => 15
        ]);

        $subcategory18 = Subcategory::create([
            'name' => 'ELECTRICIDAD',
            'slug' => Str::slug('ELECTRICIDAD'),
            'category_id' => 15
        ]);

        $subcategory19 = Subcategory::create([
            'name' => 'AGUA',
            'slug' => Str::slug('AGUA'),
            'category_id' => 15
        ]);

        $subcategory20 = Subcategory::create([
            'name' => 'TV CABLE',
            'slug' => Str::slug('TV CABLE'),
            'category_id' => 15
        ]);

        $subcategory21 = Subcategory::create([
            'name' => 'INTERNET',
            'slug' => Str::slug('INTERNET'),
            'category_id' => 15
        ]);

        $subcategory22 = Subcategory::create([
            'name' => 'NETFLIX',
            'slug' => Str::slug('NETFLIX'),
            'category_id' => 15
        ]);
        
        $subcategory23 = Subcategory::create([
            'name' => 'INMOBILIARIO',
            'slug' => Str::slug('INMOBILIARIO'),
            'category_id' => 15
        ]);

        $subcategory24 = Subcategory::create([
            'name' => 'TGIU',
            'slug' => Str::slug('TGIU'),
            'category_id' => 15
        ]);

        $subcategory25 = Subcategory::create([
            'name' => 'GAS',
            'slug' => Str::slug('GAS'),
            'category_id' => 15
        ]);

        $subcategory26 = Subcategory::create([
            'name' => 'CAUT',
            'slug' => Str::slug('CAUT'),
            'category_id' => 15
        ]);

        $category16 = Category::create([
            'type' => '2',
            'name' => 'FARMACIA',
            'slug' => Str::slug('FARMACIA')
        ]);

        $subcategory27 = Subcategory::create([
            'name' => 'MEDICAMENTOS',
            'slug' => Str::slug('MEDICAMENTOS'),
            'category_id' => 16
        ]);

        $subcategory28 = Subcategory::create([
            'name' => 'HIGIENE Y PERFUMERIA',
            'slug' => Str::slug('HIGIENE Y PERFUMERIA'),
            'category_id' => 16
        ]);

        $category17 = Category::create([
            'type' => '2',
            'name' => 'JUEGOS Y AZAR',
            'slug' => Str::slug('JUEGOS Y AZAR')
        ]);

        $subcategory29 = Subcategory::create([
            'name' => 'BINGO CAUT',
            'slug' => Str::slug('BINGO CAUT'),
            'category_id' => 17
        ]);

        $subcategory30 = Subcategory::create([
            'name' => 'RIFA BOMBEROS',
            'slug' => Str::slug('RIFA BOMBEROS'),
            'category_id' => 17
        ]);

        $subcategory31 = Subcategory::create([
            'name' => 'RIFA SAMCO',
            'slug' => Str::slug('RIFA SAMCO'),
            'category_id' => 17
        ]);

        $subcategory32 = Subcategory::create([
            'name' => 'RIFA PALENQUE',
            'slug' => Str::slug('RIFA PALENQUE'),
            'category_id' => 17
        ]);

        $subcategory33 = Subcategory::create([
            'name' => 'QUINI 6',
            'slug' => Str::slug('QUINI 6'),
            'category_id' => 17
        ]);

        $subcategory34 = Subcategory::create([
            'name' => 'OTRO',
            'slug' => Str::slug('OTRO'),
            'category_id' => 17
        ]);

        $category18 = Category::create([
            'type' => '2',
            'name' => 'MASCOTAS',
            'slug' => Str::slug('MASCOTAS')
        ]);

        $subcategory35 = Subcategory::create([
            'name' => 'BALANCEADO',
            'slug' => Str::slug('BALANCEADO'),
            'category_id' => 18
        ]);

        $subcategory36 = Subcategory::create([
            'name' => 'PELUQUERIA CANINA',
            'slug' => Str::slug('PELUQUERIA CANINA'),
            'category_id' => 18
        ]);

        $subcategory37 = Subcategory::create([
            'name' => 'VETERINARIO',
            'slug' => Str::slug('VETERINARIO'),
            'category_id' => 18
        ]);

        $category19 = Category::create([
            'type' => '2',
            'name' => 'TIEMPO LIBRE',
            'slug' => Str::slug('TIEMPO LIBRE')
        ]);

        $subcategory38 = Subcategory::create([
            'name' => 'OCIO',
            'slug' => Str::slug('OCIO'),
            'category_id' => 19
        ]);

        $subcategory39 = Subcategory::create([
            'name' => 'DEPORTES',
            'slug' => Str::slug('DEPORTES'),
            'category_id' => 19
        ]);

        $category20 = Category::create([
            'type' => '2',
            'name' => 'VESTIMENTA',
            'slug' => Str::slug('VESTIMENTA')
        ]);

        $subcategory40 = Subcategory::create([
            'name' => 'CALZADO',
            'slug' => Str::slug('CALZADO'),
            'category_id' => 20
        ]);

        $subcategory41 = Subcategory::create([
            'name' => 'ROPA',
            'slug' => Str::slug('ROPA'),
            'category_id' => 20
        ]);

        $category21 = Category::create([
            'type' => '2',
            'name' => 'VIVIENDA',
            'slug' => Str::slug('VIVIENDA')
        ]);

        $subcategory42 = Subcategory::create([
            'name' => 'MANTENIMIENTO',
            'slug' => Str::slug('MANTENIMIENTO'),
            'category_id' => 21
        ]);

        $subcategory43 = Subcategory::create([
            'name' => 'MUEBLES Y ACCESORIOS',
            'slug' => Str::slug('MUEBLES Y ACCESORIOS'),
            'category_id' => 21
        ]);

        $subcategory44 = Subcategory::create([
            'name' => 'ART LIMPIEZA',
            'slug' => Str::slug('ART LIMPIEZA'),
            'category_id' => 21
        ]);

        $category22 = Category::create([
            'type' => '2',
            'name' => 'MOVILIDAD',
            'slug' => Str::slug('MOVILIDAD')
        ]);

        $subcategory45 = Subcategory::create([
            'name' => 'COMBUSTIBLE AUTO',
            'slug' => Str::slug('COMBUSTIBLE AUTO'),
            'category_id' => 22
        ]);

        $subcategory46 = Subcategory::create([
            'name' => 'SEGURO AUTO',
            'slug' => Str::slug('SEGURO AUTO'),
            'category_id' => 22
        ]);

        $subcategory47 = Subcategory::create([
            'name' => 'PATENTE AUTO',
            'slug' => Str::slug('PATENTE AUTO'),
            'category_id' => 22
        ]);

        $subcategory48 = Subcategory::create([
            'name' => 'SERVI AUTO',
            'slug' => Str::slug('SERVI AUTO'),
            'category_id' => 22
        ]);

        $subcategory49 = Subcategory::create([
            'name' => 'MATAFUEGO',
            'slug' => Str::slug('MATAFUEGO'),
            'category_id' => 22
        ]);

        $subcategory50 = Subcategory::create([
            'name' => 'RTV',
            'slug' => Str::slug('RTV'),
            'category_id' => 22
        ]);

        $subcategory51 = Subcategory::create([
            'name' => 'CUOTA MOTO',
            'slug' => Str::slug('CUOTA MOTO'),
            'category_id' => 22
        ]);

        $subcategory52 = Subcategory::create([
            'name' => 'COMBUSTIBLE MOTO',
            'slug' => Str::slug('COMBUSTIBLE MOTO'),
            'category_id' => 22
        ]);

        $subcategory53 = Subcategory::create([
            'name' => 'SEGURO MOTO',
            'slug' => Str::slug('SEGURO MOTO'),
            'category_id' => 22
        ]);

        $subcategory54 = Subcategory::create([
            'name' => 'PATENTE MOTO',
            'slug' => Str::slug('PATENTE MOTO'),
            'category_id' => 22
        ]);

        $subcategory55 = Subcategory::create([
            'name' => 'ACCESORIOS MOTO',
            'slug' => Str::slug('ACCESORIOS MOTO'),
            'category_id' => 22
        ]);
    }

}
