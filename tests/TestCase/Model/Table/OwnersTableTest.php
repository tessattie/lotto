<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OwnersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OwnersTable Test Case
 */
class OwnersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OwnersTable
     */
    public $Owners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Owners'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Owners') ? [] : ['className' => OwnersTable::class];
        $this->Owners = TableRegistry::getTableLocator()->get('Owners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Owners);

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
