import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function AdminPolls({ polls, positions, counties, constituencies, wards }: { polls: any[]; positions: any[]; counties: any[]; constituencies: any[]; wards: any[] }) {
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
                                <input name="title" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400" />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Position</label>
                                <select name="position_id" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                                    {positions.map((position) => (
                                        <option key={position.id} value={position.id}>{position.name}</option>
                                    ))}
                                </select>
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">County</label>
                                <select name="county_id" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                                    <option value="">None</option>
                                    {counties.map((county) => (
                                        <option key={county.id} value={county.id}>{county.name}</option>
                                    ))}
                                </select>
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Constituency</label>
                                <select name="constituency_id" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                                    <option value="">None</option>
                                    {constituencies.map((item) => (
                                        <option key={item.id} value={item.id}>{item.name}</option>
                                    ))}
                                </select>
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Ward</label>
                                <select name="ward_id" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                                    <option value="">None</option>
                                    {wards.map((item) => (
                                        <option key={item.id} value={item.id}>{item.name}</option>
                                    ))}
                                </select>
                            </div>
                            <div className="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <label className="block text-sm font-medium text-slate-700">Start date</label>
                                    <input type="date" name="start_date" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400" />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-slate-700">End date</label>
                                    <input type="date" name="end_date" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400" />
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
