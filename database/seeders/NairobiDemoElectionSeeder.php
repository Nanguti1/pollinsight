<?php

namespace Database\Seeders;

use App\Models\Aspirant;
use App\Models\Constituency;
use App\Models\County;
use App\Models\Poll;
use App\Models\Position;
use App\Models\PoliticalParty;
use App\Models\Ward;
use App\Services\PollService;
use Illuminate\Database\Seeder;

class NairobiDemoElectionSeeder extends Seeder
{
    public function run(): void
    {
        $county = County::query()->where('name', 'NAIROBI CITY')->first();

        if (! $county) {
            return;
        }

        $positions = Position::query()->whereIn('name', [
            'Governor',
            'Senator',
            'Women Representative',
            'Member of Parliament (MP)',
            'Member of County Assembly (MCA)',
        ])->get()->keyBy('name');

        if ($positions->count() < 5) {
            return;
        }

        $westlands = Constituency::query()->where('county_id', $county->id)->where('name', 'WESTLANDS')->first();
        $starehe = Constituency::query()->where('county_id', $county->id)->where('name', 'STAREHE')->first();

        if (! $westlands || ! $starehe) {
            return;
        }

        $kitisuru = Ward::query()->where('constituency_id', $westlands->id)->where('name', 'KITISURU')->first();
        $nairobiCentral = Ward::query()->where('constituency_id', $starehe->id)->where('name', 'NAIROBI CENTRAL')->first();

        if (! $kitisuru || ! $nairobiCentral) {
            return;
        }

        $partyLookup = collect([
            ['name' => 'United Civic Movement', 'abbreviation' => 'UCM'],
            ['name' => 'Kenya Reform Alliance', 'abbreviation' => 'KRA'],
            ['name' => 'People First Party', 'abbreviation' => 'PFP'],
            ['name' => 'National Progress Front', 'abbreviation' => 'NPF'],
            ['name' => 'Forward Nairobi Party', 'abbreviation' => 'FNP'],
            ['name' => 'Citizens Voice Party', 'abbreviation' => 'CVP'],
            ['name' => 'Equity and Growth Party', 'abbreviation' => 'EGP'],
            ['name' => 'Urban Development Party', 'abbreviation' => 'UDP'],
            ['name' => 'Community Action Party', 'abbreviation' => 'CAP'],
            ['name' => 'Democratic Change Party', 'abbreviation' => 'DCP'],
        ])->mapWithKeys(function (array $party): array {
            $model = PoliticalParty::query()->updateOrCreate(
                ['name' => $party['name']],
                ['abbreviation' => $party['abbreviation']]
            );

            return [$party['name'] => $model];
        });

        $aspirants = [
            [
                'name' => 'Amina Odhiambo',
                'party' => 'United Civic Movement',
                'position_id' => $positions['Governor']->id,
                'county_id' => $county->id,
                'constituency_id' => null,
                'ward_id' => null,
                'bio' => 'Former county executive focused on service delivery and urban mobility.',
            ],
            [
                'name' => 'Peter Mwangi',
                'party' => 'Kenya Reform Alliance',
                'position_id' => $positions['Governor']->id,
                'county_id' => $county->id,
                'constituency_id' => null,
                'ward_id' => null,
                'bio' => 'Public finance expert campaigning on transparent county budgeting.',
            ],
            [
                'name' => 'Grace Njeri',
                'party' => 'People First Party',
                'position_id' => $positions['Senator']->id,
                'county_id' => $county->id,
                'constituency_id' => null,
                'ward_id' => null,
                'bio' => 'Legislative advocate championing youth enterprise and oversight.',
            ],
            [
                'name' => 'David Ochieng',
                'party' => 'National Progress Front',
                'position_id' => $positions['Senator']->id,
                'county_id' => $county->id,
                'constituency_id' => null,
                'ward_id' => null,
                'bio' => 'Current civic leader prioritizing urban safety and digital governance.',
            ],
            [
                'name' => 'Lucy Wambui',
                'party' => 'Forward Nairobi Party',
                'position_id' => $positions['Women Representative']->id,
                'county_id' => $county->id,
                'constituency_id' => null,
                'ward_id' => null,
                'bio' => 'Community organizer focused on women-led enterprise funding.',
            ],
            [
                'name' => 'Fatuma Noor',
                'party' => 'Citizens Voice Party',
                'position_id' => $positions['Women Representative']->id,
                'county_id' => $county->id,
                'constituency_id' => null,
                'ward_id' => null,
                'bio' => 'Rights advocate driving countywide social inclusion programs.',
            ],
            [
                'name' => 'John Kamau',
                'party' => 'Equity and Growth Party',
                'position_id' => $positions['Member of Parliament (MP)']->id,
                'county_id' => $county->id,
                'constituency_id' => $westlands->id,
                'ward_id' => null,
                'bio' => 'Policy consultant campaigning on jobs and infrastructure in Westlands.',
            ],
            [
                'name' => 'Brian Kiptoo',
                'party' => 'Urban Development Party',
                'position_id' => $positions['Member of Parliament (MP)']->id,
                'county_id' => $county->id,
                'constituency_id' => $westlands->id,
                'ward_id' => null,
                'bio' => 'Entrepreneur focused on SME growth and digital economy reforms.',
            ],
            [
                'name' => 'Mercy Achieng',
                'party' => 'Community Action Party',
                'position_id' => $positions['Member of County Assembly (MCA)']->id,
                'county_id' => $county->id,
                'constituency_id' => $westlands->id,
                'ward_id' => $kitisuru->id,
                'bio' => 'Grassroots mobilizer advocating better neighborhood public amenities.',
            ],

            [
                'name' => 'Irene Naliaka',
                'party' => 'Urban Development Party',
                'position_id' => $positions['Member of County Assembly (MCA)']->id,
                'county_id' => $county->id,
                'constituency_id' => $westlands->id,
                'ward_id' => $kitisuru->id,
                'bio' => 'Civic planner focused on roads, street lighting, and public safety in Kitisuru.',
            ],
            [
                'name' => 'Kevin Mutiso',
                'party' => 'Democratic Change Party',
                'position_id' => $positions['Member of County Assembly (MCA)']->id,
                'county_id' => $county->id,
                'constituency_id' => $starehe->id,
                'ward_id' => $nairobiCentral->id,
                'bio' => 'Youth leader focused on safety, sanitation, and ward-level transparency.',
            ],
        ];

        foreach ($aspirants as $aspirantData) {
            $party = $partyLookup[$aspirantData['party']];

            Aspirant::query()->updateOrCreate(
                [
                    'name' => $aspirantData['name'],
                    'position_id' => $aspirantData['position_id'],
                ],
                [
                    'photo' => null,
                    'party' => $party->name,
                    'political_party_id' => $party->id,
                    'county_id' => $aspirantData['county_id'],
                    'constituency_id' => $aspirantData['constituency_id'],
                    'ward_id' => $aspirantData['ward_id'],
                    'bio' => $aspirantData['bio'],
                    'status' => 'active',
                ]
            );
        }

        $pollService = app(PollService::class);

        $polls = [
            [
                'title' => 'Nairobi Governor Preference Poll',
                'position_id' => $positions['Governor']->id,
                'county_id' => $county->id,
                'constituency_id' => null,
                'ward_id' => null,
            ],
            [
                'title' => 'Nairobi Senator Preference Poll',
                'position_id' => $positions['Senator']->id,
                'county_id' => $county->id,
                'constituency_id' => null,
                'ward_id' => null,
            ],
            [
                'title' => 'Nairobi Women Representative Poll',
                'position_id' => $positions['Women Representative']->id,
                'county_id' => $county->id,
                'constituency_id' => null,
                'ward_id' => null,
            ],
            [
                'title' => 'Westlands MP Preference Poll',
                'position_id' => $positions['Member of Parliament (MP)']->id,
                'county_id' => null,
                'constituency_id' => $westlands->id,
                'ward_id' => null,
            ],
            [
                'title' => 'Kitisuru MCA Preference Poll',
                'position_id' => $positions['Member of County Assembly (MCA)']->id,
                'county_id' => null,
                'constituency_id' => null,
                'ward_id' => $kitisuru->id,
            ],
        ];

        foreach ($polls as $pollData) {
            $poll = Poll::query()->updateOrCreate(
                ['title' => $pollData['title']],
                [
                    'position_id' => $pollData['position_id'],
                    'county_id' => $pollData['county_id'],
                    'constituency_id' => $pollData['constituency_id'],
                    'ward_id' => $pollData['ward_id'],
                    'start_date' => now()->subDays(2)->toDateString(),
                    'end_date' => now()->addDays(14)->toDateString(),
                    'is_active' => true,
                ]
            );

            $pollService->createOptions($poll);
        }
    }
}
