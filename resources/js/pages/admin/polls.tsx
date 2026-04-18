import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';
import { useMemo, useState } from 'react';

type LocationOption = { id: number; name: string; county_id?: number; constituency_id?: number };

export default function AdminPolls({
    polls,
    positions,
    counties,
    constituencies,
    wards,
    allConstituencies,
    allWards,
    filters,
}: {
    polls: any[];
    positions: any[];
    counties: LocationOption[];
    constituencies: LocationOption[];
    wards: LocationOption[];
    allConstituencies: LocationOption[];
    allWards: LocationOption[];
    filters: any;
}) {
    const [selectedCounty, setSelectedCounty] = useState<string>('');
    const [selectedConstituency, setSelectedConstituency] = useState<string>('');

    const createConstituencies = useMemo(() => {
        if (!selectedCounty) {
            return allConstituencies;
        }

        return allConstituencies.filter((item) => String(item.county_id) === selectedCounty);
    }, [allConstituencies, selectedCounty]);

    const createWards = useMemo(() => {
        if (!selectedConstituency) {
            return allWards;
        }

        return allWards.filter((item) => String(item.constituency_id) === selectedConstituency);
    }, [allWards, selectedConstituency]);

    return (
        <>
            <Head title="Polls" />
            <motion.div initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.35 }} className="space-y-6">
                <div className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-xl backdrop-blur-xl">
                    <div>
                        <p className="text-sm uppercase tracking-[0.3em] text-slate-500">Polling management</p>
                        <h1 className="mt-3 text-3xl font-semibold text-slate-950">Create structured polls</h1>
                    </div>
                </div>

                <motion.section className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl">
                    <h2 className="text-xl font-semibold text-slate-950">Filter polls</h2>
                    <form action="/admin/polls" method="get" className="mt-5 grid gap-4 md:grid-cols-3 xl:grid-cols-6">
                        <select name="position_id" defaultValue={filters.position_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">
                            <option value="">All positions</option>
                            {positions.map((position) => (
                                <option key={position.id} value={position.id}>{position.name}</option>
                            ))}
                        </select>
                        <select name="county_id" defaultValue={filters.county_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">
                            <option value="">All counties</option>
                            {counties.map((county) => (
                                <option key={county.id} value={county.id}>{county.name}</option>
                            ))}
                        </select>
                        <select name="constituency_id" defaultValue={filters.constituency_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">
                            <option value="">All constituencies</option>
                            {constituencies.map((item) => (
                                <option key={item.id} value={item.id}>{item.name}</option>
                            ))}
                        </select>
                        <select name="ward_id" defaultValue={filters.ward_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">
                            <option value="">All wards</option>
                            {wards.map((item) => (
                                <option key={item.id} value={item.id}>{item.name}</option>
                            ))}
                        </select>
                        <select name="is_active" defaultValue={filters.is_active ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">
                            <option value="">Any status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <button type="submit" className="rounded-full bg-slate-950 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800">Apply</button>
                    </form>
                </motion.section>

                <div className="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
                    <motion.section className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Current polls</h2>
                        <div className="mt-5 space-y-3">
                            {polls.map((poll) => (
                                <div key={poll.id} className="rounded-3xl bg-white/70 p-4 shadow-sm">
                                    <div className="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                                        <div>
                                            <p className="font-semibold text-slate-950">{poll.title}</p>
                                            <p className="mt-1 text-sm text-slate-600">{poll.position?.name} • {poll.county?.name || poll.constituency?.name || poll.ward?.name || 'National'}</p>
                                        </div>
                                        <div className="flex gap-2 text-xs text-slate-500">
                                            <span>{poll.is_active ? 'Active' : 'Inactive'}</span>
                                            <span>Ends {poll.end_date}</span>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </motion.section>

                    <motion.section className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Create poll</h2>
                        <form action="/admin/polls" method="post" className="mt-6 space-y-4">
                            <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''} />
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Title</label>
                                <input name="title" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Position</label>
                                <select name="position_id" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm">
                                    {positions.map((position) => (
                                        <option key={position.id} value={position.id}>{position.name}</option>
                                    ))}
                                </select>
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">County</label>
                                <select
                                    name="county_id"
                                    value={selectedCounty}
                                    onChange={(event) => {
                                        setSelectedCounty(event.target.value);
                                        setSelectedConstituency('');
                                    }}
                                    className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm"
                                >
                                    <option value="">None</option>
                                    {counties.map((county) => (
                                        <option key={county.id} value={county.id}>{county.name}</option>
                                    ))}
                                </select>
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Constituency</label>
                                <select
                                    name="constituency_id"
                                    value={selectedConstituency}
                                    onChange={(event) => setSelectedConstituency(event.target.value)}
                                    className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm"
                                >
                                    <option value="">None</option>
                                    {createConstituencies.map((item) => (
                                        <option key={item.id} value={item.id}>{item.name}</option>
                                    ))}
                                </select>
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Ward</label>
                                <select name="ward_id" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm">
                                    <option value="">None</option>
                                    {createWards.map((item) => (
                                        <option key={item.id} value={item.id}>{item.name}</option>
                                    ))}
                                </select>
                            </div>
                            <div className="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <label className="block text-sm font-medium text-slate-700">Start date</label>
                                    <input type="date" name="start_date" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm" />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-slate-700">End date</label>
                                    <input type="date" name="end_date" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm" />
                                </div>
                            </div>
                            <div className="flex items-center gap-3">
                                <input type="checkbox" name="is_active" id="is_active" className="h-5 w-5 rounded border-slate-300 text-slate-950 focus:ring-slate-500" />
                                <label htmlFor="is_active" className="text-sm text-slate-700">Activate poll now</label>
                            </div>
                            <button type="submit" className="inline-flex items-center justify-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                                Create poll
                            </button>
                        </form>
                    </motion.section>
                </div>
            </motion.div>
        </>
    );
}

AdminPolls.layout = {
    breadcrumbs: [
        {
            title: 'Admin',
            href: '/admin/dashboard',
        },
        {
            title: 'Polls',
            href: '/admin/polls',
        },
    ],
};
