<?php

use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produits')->delete();
        
        \DB::table('produits')->insert(array (
            0 => 
            array (
                'code' => 'bureau-de-direction',
                'nom' => 'bureau de direction',
                'image' => '["articles\\/\\/59dd6f02c63f22f788bdaac5d6105a2b.jpg"]',
                'prix_achat' => 120000.0,
                'prix_vente' => 101500.0,
                'quantite' => 100,
                'description' => '<table border="1" bordercolor="#ccc" cellpadding="5" cellspacing="0" style="border-collapse:collapse; height:96px; width:192px">
<tbody>
<tr>
<td>Poids</td>
<td>1kg</td>
</tr>
<tr>
<td>Dimensions</td>
<td>345 &times; 455 cm</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>',
                'code_categorie' => 'accessoires-de-bureau',
                'vues' => 0,
                'enabled' => 1,
                'owner_id' => 4,
                'deleted_at' => NULL,
                'created_at' => '2021-06-19 16:28:27',
                'updated_at' => '2021-06-19 16:28:27',
            ),
        ));
        
        
    }
}