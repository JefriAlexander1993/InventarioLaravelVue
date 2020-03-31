<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
 		
 			'nombre'=>'ANTIOQUIA']);

        DB::table('departamentos')->insert([
 		
 			'nombre'=>'ATLÁNTICO']);

        DB::table('departamentos')->insert([
 			
 			'nombre'=>'BOGOTÁ, D.C.']);

        DB::table('departamentos')->insert([
 		
 			'nombre'=>'BOLÍVAR']);

        DB::table('departamentos')->insert([
 			
 			'nombre'=>'BOYACÁ']);

        DB::table('departamentos')->insert([
 			
 			'nombre'=>'CALDAS']);

        DB::table('departamentos')->insert([
 			
 			'nombre'=>'CAQUETÁ']);

        DB::table('departamentos')->insert([
 			
 			'nombre'=>'CAUCA']);

        DB::table('departamentos')->insert([
 			
 			'nombre'=>'CESAR']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'CÓRDOBA']);
		
		DB::table('departamentos')->insert([
 			
 			'nombre'=>'CUNDINAMARCA']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'CHOCÓ']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'HUILA']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'LA GUAJIRA']);
		
		DB::table('departamentos')->insert([
 			
 			'nombre'=>'MAGDALENA']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'META']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'NARIÑO']);
				
		DB::table('departamentos')->insert([
 			
 			'nombre'=>'NORTE DE SANTANDER']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'QUINDIO']);
		
		DB::table('departamentos')->insert([
 			
 			'nombre'=>'RISARALDA']);
		
		DB::table('departamentos')->insert([
 			
 			'nombre'=>'SANTANDER']);
		
		DB::table('departamentos')->insert([
 			
 			'nombre'=>'SUCRE']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'TOLIMA']);
		
		DB::table('departamentos')->insert([
 			
 			'nombre'=>'VALLE DEL CAUCA']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'ARAUCA']);
		
		DB::table('departamentos')->insert([
 			
 			'nombre'=>'CASANARE']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'PUTUMAYO']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'ARCHIPIÉLAGO DE SAN ANDRÉS.']);
		
		DB::table('departamentos')->insert([
 			
 			'nombre'=>'AMAZONAS']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'GUAINÍA']);
		
		DB::table('departamentos')->insert([
 			
 			'nombre'=>'GUAVIARE']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'VAUPÉS']);

		DB::table('departamentos')->insert([
 			
 			'nombre'=>'VICHADA']);

    }
}
