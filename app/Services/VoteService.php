<?php

namespace App\Services;

use App\Models\Poll;
use App\Models\PollOption;
use App\Models\Vote;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class VoteService
{
    public function castVote(Poll $poll, PollOption $option, string $fingerprint, ?string $ipAddress, ?string $userAgent): Vote
    {
        $this->ensurePollIsActive($poll);
        $this->ensureOptionBelongsToPoll($poll, $option);
        $this->ensureFingerprintIsUnique($poll->id, $fingerprint);

        return Vote::create([
            'poll_id' => $poll->id,
            'poll_option_id' => $option->id,
            'fingerprint' => $fingerprint,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
        ]);
    }

    protected function ensurePollIsActive(Poll $poll): void
    {
        if (! $poll->is_active || now()->lt($poll->start_date) || now()->gt($poll->end_date)) {
            throw new \InvalidArgumentException('This poll is not currently accepting votes.');
        }
    }

    protected function ensureOptionBelongsToPoll(Poll $poll, PollOption $option): void
    {
        if ($option->poll_id !== $poll->id) {
            throw new \InvalidArgumentException('Invalid poll option selected.');
        }
    }

    protected function ensureFingerprintIsUnique(int $pollId, string $fingerprint): void
    {
        if (Vote::where('poll_id', $pollId)->where('fingerprint', $fingerprint)->exists()) {
            throw new \InvalidArgumentException('A vote for this poll has already been recorded from this device.');
        }
    }
}
