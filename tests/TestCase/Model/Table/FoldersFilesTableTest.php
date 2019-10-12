<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoldersFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoldersFilesTable Test Case
 */
class FoldersFilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FoldersFilesTable
     */
    public $FoldersFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FoldersFiles',
        'app.Folders',
        'app.Files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FoldersFiles') ? [] : ['className' => FoldersFilesTable::class];
        $this->FoldersFiles = TableRegistry::getTableLocator()->get('FoldersFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FoldersFiles);

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
