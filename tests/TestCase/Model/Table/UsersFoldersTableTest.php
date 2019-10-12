<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersFoldersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersFoldersTable Test Case
 */
class UsersFoldersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersFoldersTable
     */
    public $UsersFolders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsersFolders',
        'app.Users',
        'app.Folders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsersFolders') ? [] : ['className' => UsersFoldersTable::class];
        $this->UsersFolders = TableRegistry::getTableLocator()->get('UsersFolders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersFolders);

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
