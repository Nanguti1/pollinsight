import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function RankingsIndex({ rankings, positions, counties, constituencies, wards, filters }: { rankings: any[]; positions: any[]; counties: any[]; constituencies: any[]; wards: any[]; filters: any }) {
    return (
        <>
            <Head title="Rankings" />

            <section className="rounded-3xl border border-white/40 bg-white/65 p-8 shadow-xl backdrop-blur-xl">
                <h1 className="text-3xl font-bold tracking-tight text-slate-950">Rankings</h1>
                <p className="mt-2 text-slate-600">Compare aspirants by live vote totals across locations and positions.</p>

                <form action="/rankings" method="get" className="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-5">
                    <select name="position_id" defaultValue={filters.position_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900">
                        <option value="">All positions</option>
                        {positions.map((position) => (
                            <option key={position.id} value={position.id}>{position.name}</option>
                        ))}
                    </select>
                    <select name="county_id" defaultValue={filters.county_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900">
                        <option value="">All counties</option>
                        {counties.map((county) => (
                            <option key={county.id} value={county.id}>{county.name}</option>
                        ))}
                    </select>
                    <select name="constituency_id" defaultValue={filters.constituency_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900">
                        <option value="">All constituencies</option>
                        {constituencies.map((item) => (
                            <option key={item.id} value={item.id}>{item.name}</option>
                        ))}
                    </select>
                    <select name="ward_id" defaultValue={filters.ward_id ?? ''} className="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900">
                        <option value="">All wards</option>
                        {wards.map((item) => (
                            <option key={item.id} value={item.id}>{item.name}</option>
                        ))}
                    </select>
                    <motion.button whileTap={{ scale: 0.98 }} type="submit" className="rounded-full bg-slate-950 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                        Apply filters
                    </motion.button>
                </form>
            </section>

            <section className="mt-8 space-y-3">
                {rankings.length > 0 ? rankings.map((item, index) => (
                    <motion.article
                        key={item.aspirant_id}
                        initial={{ opacity: 0, y: 6 }}
                        animate={{ opacity: 1, y: 0 }}
                        transition={{ delay: index * 0.02 }}
                        className="rounded-3xl border border-white/40 bg-white/65 p-5 shadow-lg shadow-slate-900/5 backdrop-blur-xl"
                    >
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-xs uppercase tracking-[0.2em] text-slate-500">Rank #{index + 1}</p>
                                <h2 className="mt-1 text-xl font-semibold text-slate-950">{item.name}</h2>
                                <p className="text-sm text-slate-600">{item.party} • {item.position_name}</p>
                            </div>
                            <p className="text-2xl font-bold text-slate-950">{item.votes}</p>
                        </div>
                    </motion.article>
                )) : (
                    <div className="rounded-3xl border border-white/40 bg-white/70 p-6 text-sm text-slate-600">No rankings data for selected filters.</div>
                )}
            </section>
        </>
    );
}
