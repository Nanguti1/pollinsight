import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function RankingsIndex({ rankings, positions, counties, constituencies, filters }: { rankings: any[]; positions: any[]; counties: any[]; constituencies: any[]; filters: any }) {
    return (
        <>
            <Head title="Rankings" />
            <motion.div initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.35 }} className="space-y-6">
                <div className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-xl backdrop-blur-xl">
                    <h1 className="text-3xl font-semibold text-slate-950">Rankings</h1>
                    <p className="mt-2 text-slate-600">Browse vote-based aspirant rankings by position and location.</p>
                </div>

                <motion.section className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl">
                    <h2 className="text-xl font-semibold text-slate-950">Filters</h2>
                    <form action="/rankings" method="get" className="mt-5 grid gap-4 sm:grid-cols-2">
                        <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''} />
                        <select name="position_id" defaultValue={filters.position_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                            <option value="">All positions</option>
                            {positions.map((position) => (
                                <option key={position.id} value={position.id}>{position.name}</option>
                            ))}
                        </select>
                        <select name="county_id" defaultValue={filters.county_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                            <option value="">All counties</option>
                            {counties.map((county) => (
                                <option key={county.id} value={county.id}>{county.name}</option>
                            ))}
                        </select>
                        <select name="constituency_id" defaultValue={filters.constituency_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                            <option value="">All constituencies</option>
                            {constituencies.map((item) => (
                                <option key={item.id} value={item.id}>{item.name}</option>
                            ))}
                        </select>
                        <button type="submit" className="w-full rounded-3xl bg-slate-950 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                            Apply filters
                        </button>
                    </form>
                </motion.section>

                <motion.section className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                    <div className="flex items-center justify-between gap-4">
                        <h2 className="text-xl font-semibold text-slate-950">Current rankings</h2>
                        <span className="rounded-full bg-slate-950/10 px-3 py-1 text-sm text-slate-700">{rankings.length} items</span>
                    </div>
                    <div className="mt-5 space-y-4">
                        {rankings.map((item, index) => (
                            <div key={item.aspirant_id} className="rounded-3xl border border-slate-200 bg-slate-950/5 p-4 shadow-sm">
                                <div className="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <p className="text-sm text-slate-500">#{index + 1}</p>
                                        <p className="text-lg font-semibold text-slate-950">{item.name}</p>
                                        <p className="text-sm text-slate-600">{item.party} • {item.position_name}</p>
                                    </div>
                                    <div className="text-right">
                                        <p className="text-2xl font-semibold text-slate-950">{item.votes}</p>
                                        <p className="text-sm text-slate-500">votes</p>
                                    </div>
                                </div>
                            </div>
                        ))}
                        {rankings.length === 0 && <p className="text-sm text-slate-600">No votes have been cast yet for your current filter.</p>}
                    </div>
                </motion.section>
            </motion.div>
        </>
    );
}
