<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SettingsBanksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SettingsBanksTable Test Case
 */
class SettingsBanksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SettingsBanksTable
     */
    public $SettingsBanks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SettingsBanks',
        'app.Banks',
        'app.Settings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SettingsBanks') ? [] : ['className' => SettingsBanksTable::class];
        $this->SettingsBanks = TableRegistry::getTableLocator()->get('SettingsBanks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SettingsBanks);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
