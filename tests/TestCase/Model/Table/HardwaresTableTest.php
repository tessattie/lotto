<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HardwaresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HardwaresTable Test Case
 */
class HardwaresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HardwaresTable
     */
    public $Hardwares;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Hardwares'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Hardwares') ? [] : ['className' => HardwaresTable::class];
        $this->Hardwares = TableRegistry::getTableLocator()->get('Hardwares', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hardwares);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
