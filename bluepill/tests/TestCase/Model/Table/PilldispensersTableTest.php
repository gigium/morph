<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PilldispensersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PilldispensersTable Test Case
 */
class PilldispensersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PilldispensersTable
     */
    public $Pilldispensers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pilldispensers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pilldispensers') ? [] : ['className' => 'App\Model\Table\PilldispensersTable'];
        $this->Pilldispensers = TableRegistry::get('Pilldispensers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pilldispensers);

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
