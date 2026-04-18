import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function AdminWards({ wards, constituencies }: { wards: any[]; constituencies: any[] }) {
    return (
        <>
            <Head title="Wards" />
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
                            <h1 className="mt-3 text-3xl font-semibold text-slate-950">Wards</h1>
                        </div>
                    </div>
                </div>

                <div className="grid gap-6 xl:grid-cols-[1fr_0.8fr]">
                    <motion.section
                        layout
                        className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl"
                    >
                        <h2 className="text-xl font-semibold text-slate-950">Wards</h2>
                        <div className="mt-5 grid gap-3">
                            {wards.map((ward: any) => (
                                <div key={ward.id} className="rounded-3xl bg-white/60 p-4 shadow-sm">
                                    <p className="font-semibold text-slate-950">{ward.name}</p>
                                    <p className="mt-1 text-sm text-slate-600">
                                        Constituency: {ward.constituency?.name} ({ward.constituency?.county?.name})
                                    </p>
                                </div>
                            ))}
                        </div>
                    </motion.section>

                    <motion.section
                        layout
                        className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl"
                    >
                        <h2 className="text-xl font-semibold text-slate-950">Add new ward</h2>
                        <form action="/admin/wards" method="post" className="mt-6 space-y-4">
                            <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''} />
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Name</label>
                                <input
                                    name="name"
                                    className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400"
                                />
                            </div>

                            <div>
                                <label className="block text-sm font-medium text-slate-700">Constituency</label>
                                <select name="constituency_id" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                                    <option value="">Select constituency</option>
                                    {constituencies.map((constituency) => (
                                        <option key={constituency.id} value={constituency.id}>{constituency.name} ({constituency.county?.name})</option>
                                    ))}
                                </select>
                            </div>

                            <button type="submit" className="inline-flex items-center justify-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                                Add ward
                            </button>
                        </form>
                    </motion.section>
                </div>
            </motion.div>
        </>
    );
}