<?php

namespace Tests\Unit;

use App\Models\Competition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;


class CompetitionTest extends TestCase
{
    use RefreshDatabase;

    #test
    public function test_it_can_create_a_competition()
    {
        $competition = Competition::create([
            'name' => 'Premier League',
            'type' => 'league',
            'country' => 'England',
            'api_id' => 39,
        ]);

        $this->assertDatabaseHas('competitions', [
            'name' => 'Premier League',
            'type' => 'league',
            'country' => 'England',
            'api_id' => 39,
        ]);
    }

    #test
    public function test_it_has_expected_columns()
    {
        $columns = Schema::getColumnListing('competitions');

        $this->assertContains('id', $columns);
        $this->assertContains('name', $columns);
        $this->assertContains('type', $columns);
        $this->assertContains('country', $columns);
        $this->assertContains('api_id', $columns);
        $this->assertContains('created_at', $columns);
        $this->assertContains('updated_at', $columns);
    }
}
