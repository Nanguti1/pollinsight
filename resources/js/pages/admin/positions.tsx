import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function AdminPositions({ positions }: { positions: any[] }) {
    return (
        <>
            <Head title="Positions" />
            <motion.div initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.35 }} className="space-y-6">
                <div className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-xl backdrop-blur-xl">
                    <h1 className="text-3xl font-semibold text-slate-950">Political positions</h1>
                    <p className="mt-2 text-slate-600">Maintain available seat types and link them to the proper administrative level.</p>
                </div>

                <div className="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                    <motion.section className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Existing positions</h2>
                        <div className="mt-5 space-y-3">
                            {positions.map((position) => (
                                <div key={position.id} className="rounded-3xl bg-white/70 p-4 shadow-sm">
                                    <div className="flex items-center justify-between gap-4">
                                        <div>
                                            <p className="font-semibold text-slate-950">{position.name}</p>
                                            <p className="mt-1 text-sm text-slate-500">Level: {position.level}</p>
                                        </div>
                                        <span className="rounded-full bg-slate-100 px-3 py-1 text-xs uppercase tracking-widest text-slate-600">{position.level}</span>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </motion.section>

                    <motion.section className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Add new position</h2>
                        <form action="/admin/positions" method="post" className="mt-6 space-y-4">
                            <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''} />
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Name</label>
                                <input name="name" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400" />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Level</label>
                                <select name="level" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                                    <option value="national">National</option>
                                    <option value="county">County</option>
                                    <option value="constituency">Constituency</option>
                                    <option value="ward">Ward</option>
                                </select>
                            </div>
                            <button type="submit" className="inline-flex items-center justify-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                                Add position
                            </button>
                        </form>
                    </motion.section>
                </div>
            </motion.div>
        </>
    );
}

AdminPositions.layout = {
    breadcrumbs: [
        {
            title: 'Admin',
            href: '/admin/dashboard',
        },
        {
            title: 'Positions',
            href: '/admin/positions',
        },
    ],
};
