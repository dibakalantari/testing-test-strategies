<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_switches_database_connections_within_a_single_test()
    {
        DB::setDefaultConnection('sqlite');

        $sqliteUser = User::create([
            'name' => 'John',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $sqliteUser->id,
            'name' => 'John',
        ], 'sqlite');

        DB::setDefaultConnection('mysql');

        $mysqlUser = User::create([
            'name' => 'Jack',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $mysqlUser->id,
            'name' => 'Jane Smith',
        ], 'mysql');

        DB::setDefaultConnection('sqlite');

        $anotherSqliteUser = User::create([
            'name' => 'Mark Brown',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $anotherSqliteUser->id,
            'name' => 'Mark Brown',
        ], 'sqlite');
    }
}

