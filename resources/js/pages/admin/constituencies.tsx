import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function AdminConstituencies({ constituencies, counties }: { constituencies: any[]; counties: any[] }) {
    return (
        <>
            <Head title="Constituencies" />
            <motion.div
                initial={{ opacity: 0, y: 12 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.35 }}
                className="space-y-6"
            >
                <div className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-xl backdrop-blur-xl">
                    <div className="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
                        <div>
                            <p className="text-sm uppercase tracking-[0.3em] text-slate-500">Geography management</p>
                            <h1 className="mt-3 text-3xl font-semibold text-slate-950">Constituencies</h1>
                        </div>
                    </div>
                </div>

                <div className="grid gap-6 xl:grid-cols-[1fr_0.8fr]">
                    <motion.section
                        layout
                        className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl"
                    >
                        <h2 className="text-xl font-semibold text-slate-950">Constituencies</h2>
                        <div className="mt-5 grid gap-3">
                            {constituencies.map((constituency: any) => (
                                <div key={constituency.id} className="rounded-3xl bg-white/60 p-4 shadow-sm">
                                    <p className="font-semibold text-slate-950">{constituency.name}</p>
                                    <p className="mt-1 text-sm text-slate-600">
                                        County: {constituency.county?.name}
                                    </p>
                                </div>
                            ))}
                        </div>
                    </motion.section>

                    <motion.section
                        layout
                        className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl"
                    >
                        <h2 className="text-xl font-semibold text-slate-950">Add new constituency</h2>
                        <form action="/admin/constituencies" method="post" className="mt-6 space-y-4">
                            <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''} />
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Name</label>
                                <input
                                    name="name"
                                    className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400"
                                />
                            </div>

                            <div>
                                <label className="block text-sm font-medium text-slate-700">County</label>
                                <select name="county_id" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                                    <option value="">Select county</option>
                                    {counties.map((county) => (
                                        <option key={county.id} value={county.id}>{county.name}</option>
                                    ))}
                                </select>
                            </div>

                            <button type="submit" className="inline-flex items-center justify-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                                Add constituency
                            </button>
                        </form>
                    </motion.section>
                </div>
            </motion.div>
        </>
    );
}