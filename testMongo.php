<?php
require('./vendor/autoload.php');
require('./mongodb.php');
use PHPUnit\Framework\TestCase;
final class DBTest extends TestCase
{
  public function crearDB() {
    $monguito = new mongodb();
    return $monguito;
  }
  public function testEstadisticas(){
    $monguito = $this->crearDB();
    $monguito->insert([
      'registros' => 13,
      'valor' => true
    ]);

    $this->assertEquals(1, $monguito->estadisticas());
  }
  public function testInsert()
  {
    $monguito = $this->crearDB();
    $this->assertTrue($monguito->insert([
        'registros' => 13,
        'valor' => true
    ]));
    $this->assertFalse($monguito->insert());
    $this->assertFalse($monguito->insert(3));
    $this->assertFalse($monguito->insert('s'));
  }
  


}