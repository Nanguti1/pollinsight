<?php

namespace Tests\Feature;

use App\Models\Aspirant;
use App\Models\County;
use App\Models\Poll;
use App\Models\PollOption;
use App\Models\Position;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicVoteFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_cast_vote_without_missing_rate_limiter_error(): void
    {
        $poll = $this->createActiveGovernorPoll();
        $option = $poll->options()->firstOrFail();

        $response = $this->post(route('polls.vote', $poll), [
            'poll_option_id' => $option->id,
            'fingerprint' => 'device-abc-123',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Vote recorded successfully.');

        $this->assertDatabaseHas('votes', [
            'poll_id' => $poll->id,
            'poll_option_id' => $option->id,
            'fingerprint' => 'device-abc-123',
        ]);
    }

    public function test_duplicate_vote_shows_user_friendly_error_message(): void
    {
        $poll = $this->createActiveGovernorPoll();
        $option = $poll->options()->firstOrFail();

        Vote::create([
            'poll_id' => $poll->id,
            'poll_option_id' => $option->id,
            'fingerprint' => 'device-duplicate',
            'ip_address' => '127.0.0.1',
            'user_agent' => 'PHPUnit',
        ]);

        $response = $this->post(route('polls.vote', $poll), [
            'poll_option_id' => $option->id,
            'fingerprint' => 'device-duplicate',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error', 'A vote for this poll has already been recorded from this device.');
        $this->assertSame(1, Vote::count());
    }

    private function createActiveGovernorPoll(): Poll
    {
        $position = Position::create(['name' => 'Governor', 'level' => 'county']);
        $county = County::create(['name' => 'Nairobi']);

        $poll = Poll::create([
            'title' => 'Governor Poll',
            'position_id' => $position->id,
            'county_id' => $county->id,
            'start_date' => now()->subDay(),
            'end_date' => now()->addDay(),
            'is_active' => true,
        ]);

        $firstAspirant = Aspirant::create([
            'name' => 'Aspirant One',
            'photo' => null,
            'party' => 'Party A',
            'position_id' => $position->id,
            'county_id' => $county->id,
            'bio' => null,
            'status' => 'active',
        ]);

        $secondAspirant = Aspirant::create([
            'name' => 'Aspirant Two',
            'photo' => null,
            'party' => 'Party B',
            'position_id' => $position->id,
            'county_id' => $county->id,
            'bio' => null,
            'status' => 'active',
        ]);

        PollOption::create([
            'poll_id' => $poll->id,
            'aspirant_id' => $firstAspirant->id,
        ]);

        PollOption::create([
            'poll_id' => $poll->id,
            'aspirant_id' => $secondAspirant->id,
        ]);

        return $poll->fresh(['options']);
    }
}
