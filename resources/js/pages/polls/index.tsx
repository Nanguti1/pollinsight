import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';
import { useCallback, useState } from 'react';
import PollCard from '@/components/public/poll-card';

type Poll = {
    id: number;
    title: string;
    position: string;
    end_date: string;
    location: string;
};

export default function PollList({ polls, positions, counties, filters }: { polls: Poll[]; positions: { id: number; name: string }[]; counties: { id: number; name: string }[]; filters: { position_id?: number; county_id?: number } }) {
    const [availablePositions, setAvailablePositions] = useState(positions);
    const [availableCounties, setAvailableCounties] = useState(counties);
    const [hasLoadedFilterOptions, setHasLoadedFilterOptions] = useState(positions.length > 0 && counties.length > 0);

    const loadFilterOptions = useCallback(async () => {
        if (hasLoadedFilterOptions) {
            return;
        }

        const response = await fetch('/polls/filter-options', {
            headers: {
                Accept: 'application/json',
            },
        });

        if (!response.ok) {
            return;
        }

        const data = (await response.json()) as {
            positions?: { id: number; name: string }[];
            counties?: { id: number; name: string }[];
        };

        setAvailablePositions(data.positions ?? []);
        setAvailableCounties(data.counties ?? []);
        setHasLoadedFilterOptions(true);
    }, [hasLoadedFilterOptions]);

    return (
        <>
            <Head title="Polls" />

            <section className="rounded-3xl border border-white/40 bg-white/65 p-8 shadow-xl backdrop-blur-xl">
                <h1 className="text-3xl font-bold tracking-tight text-slate-950">Active polls</h1>
                <p className="mt-2 text-slate-600">Filter live polls by position and county, then cast your vote.</p>

                <form action="/polls" method="get" className="mt-6 grid gap-3 md:grid-cols-[1fr_1fr_auto]">
                    <select name="position_id" defaultValue={filters.position_id ?? ''} onFocus={() => void loadFilterOptions()} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900">
                        <option value="">All positions</option>
                        {availablePositions.map((position) => (
                            <option key={position.id} value={position.id}>{position.name}</option>
                        ))}
                    </select>
                    <select name="county_id" defaultValue={filters.county_id ?? ''} onFocus={() => void loadFilterOptions()} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900">
                        <option value="">All counties</option>
                        {availableCounties.map((county) => (
                            <option key={county.id} value={county.id}>{county.name}</option>
                        ))}
                    </select>
                    <motion.button whileTap={{ scale: 0.98 }} type="submit" className="rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                        Apply filters
                    </motion.button>
                </form>
            </section>

            <section className="mt-8">
                {polls.length > 0 ? (
                    <div className="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                        {polls.map((poll, index) => (
                            <motion.div key={poll.id} initial={{ opacity: 0, y: 8 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: index * 0.03 }}>
                                <PollCard poll={poll} />
                            </motion.div>
                        ))}
                    </div>
                ) : (
                    <div className="rounded-3xl border border-white/40 bg-white/70 p-6 text-sm text-slate-600">
                        No active polls match your current filters.
                    </div>
                )}
            </section>
        </>
    );
}
