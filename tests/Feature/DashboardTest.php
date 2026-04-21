<?php

namespace Tests\Feature;

use App\Models\Aspirant;
use App\Models\Constituency;
use App\Models\County;
use App\Models\PoliticalParty;
use App\Models\Position;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_page()
    {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_visit_the_dashboard()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('dashboard'));
        $response->assertOk();
    }

    public function test_dashboard_displays_dynamic_summary_cards(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $county = County::create(['name' => 'Nairobi']);
        $constituency = Constituency::create(['name' => 'Westlands', 'county_id' => $county->id]);
        $ward = Ward::create(['name' => 'Parklands/Highridge', 'constituency_id' => $constituency->id]);

        $governor = Position::create(['name' => 'Governor', 'level' => 'county']);
        $senator = Position::create(['name' => 'Senator', 'level' => 'county']);
        $womenRep = Position::create(['name' => 'Women Representative', 'level' => 'county']);
        $mp = Position::create(['name' => 'Member of Parliament (MP)', 'level' => 'constituency']);
        $mca = Position::create(['name' => 'Member of County Assembly (MCA)', 'level' => 'ward']);

        $party = PoliticalParty::create(['name' => 'Unity Party', 'abbreviation' => 'UP']);

        Aspirant::create([
            'name' => 'Aspirant Governor',
            'party' => $party->name,
            'political_party_id' => $party->id,
            'position_id' => $governor->id,
            'county_id' => $county->id,
            'status' => 'active',
        ]);

        Aspirant::create([
            'name' => 'Aspirant Senator',
            'party' => $party->name,
            'political_party_id' => $party->id,
            'position_id' => $senator->id,
            'county_id' => $county->id,
            'status' => 'active',
        ]);

        Aspirant::create([
            'name' => 'Aspirant Women Rep',
            'party' => $party->name,
            'political_party_id' => $party->id,
            'position_id' => $womenRep->id,
            'county_id' => $county->id,
            'status' => 'active',
        ]);

        Aspirant::create([
            'name' => 'Aspirant MP',
            'party' => $party->name,
            'political_party_id' => $party->id,
            'position_id' => $mp->id,
            'constituency_id' => $constituency->id,
            'status' => 'active',
        ]);

        Aspirant::create([
            'name' => 'Aspirant MCA',
            'party' => $party->name,
            'political_party_id' => $party->id,
            'position_id' => $mca->id,
            'ward_id' => $ward->id,
            'status' => 'active',
        ]);

        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Total Aspirants')
            ->assertSee('MCA Aspirants')
            ->assertSee('MP Aspirants')
            ->assertSee('Women Rep Aspirants')
            ->assertSee('Senator Aspirants')
            ->assertSee('Governor Aspirants')
            ->assertSee('Political Parties')
            ->assertSee('Wards')
            ->assertSee('Constituencies')
            ->assertSee('Counties');
    }
}
