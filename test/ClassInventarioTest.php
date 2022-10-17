<?php
require './src/inventario.php';

use PHPUnit\Framework\TestCase;
final class ClassInventarioTest extends TestCase
{
    public function testInventario(){
        $state = new inventario();
        $salida = '';
        
        $this->assertEquals(4, $state->suspende(25, 29, 30, 4), $salida = "NO PRODUCCION");
        echo "\n".$salida;
        $this->assertEquals(2, $state->suspende(29, 29, 30, 4), $salida = "PRODUCCION");
        echo "\n".$salida;
        $this->assertEquals(4, $state->remueve(4, 29, 15, 30 ,3), $salida = "BAJA");
        echo "\n".$salida;
        $this->assertEquals(4, $state->remueve(29, 29, 15, 30 ,3), $salida = "EN CATALOGO");
        echo "\n".$salida;
        $this->assertTrue(4 == $state->ensamble(1), $salida = "ENSAMBLADO");
        echo "\n".$salida;
        $this->assertFalse(4 == $state->ensamble(3), $salida  = "NO ENSAMBLADO");
        echo "\n".$salida;
    }
}