<?php namespace rdbms\unittest\mysql;

use rdbms\mysql\MySQLDBAdapter;
use rdbms\DBTableAttribute;
use rdbms\FieldType;

/**
 * TestCase
 *
 * @see    xp://rdbms.mysql.MySQLDBAdapter
 */
class TableDescriptionTest extends \unittest\TestCase {

  #[@test]
  public function auto_increment() {
    $this->assertEquals(
      new DBTableAttribute('contract_id', FieldType::INT, true, false, 8, 0, 0),
      MySQLDBAdapter::tableAttributeFrom([
        'Field'   => 'contract_id',
        'Type'    => 'int(8)',
        'Null'    => '',
        'Key'     => 'PRI',
        'Default' => null,
        'Extra'   => 'auto_increment'
      ])
    );
  }

  #[@test]
  public function unsigned_int() {
    $this->assertEquals(
      new DBTableAttribute('bz_id', FieldType::INT, false, false, 6, 0, 0),
      MySQLDBAdapter::tableAttributeFrom([
        'Field'   => 'bz_id',
        'Type'    => 'int(6) unsigned',
        'Null'    => '',
        'Key'     => '',
        'Default' => 500,
        'Extra'   => ''
      ])
    );
  }
}
