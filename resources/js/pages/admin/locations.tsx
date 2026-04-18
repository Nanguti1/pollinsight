import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';
import { useState } from 'react';

export default function AdminLocations({ counties, constituencies, wards }: { counties: any[]; constituencies: any[]; wards: any[] }) {
    const [type, setType] = useState<'county' | 'constituency' | 'ward'>('county');

    return (
        <>
            <Head title="Locations" />
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
                            <h1 className="mt-3 text-3xl font-semibold text-slate-950">Counties, constituencies & wards</h1>
                        </div>
                        <div className="flex flex-wrap items-center gap-2">
                            {(['county', 'constituency', 'ward'] as const).map((value) => (
                                <button
                                    key={value}
                                    type="button"
                                    onClick={() => setType(value)}
                                    className={`rounded-full px-3 py-2 text-sm transition ${type === value ? 'bg-slate-950 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'}`}
                                >
                                    {value}
                                </button>
                            ))}
                        </div>
                    </div>
                </div>

                <div className="grid gap-6 xl:grid-cols-[1fr_0.8fr]">
                    <motion.section
                        layout
                        className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl"
                    >
                        <h2 className="text-xl font-semibold text-slate-950">{type === 'county' ? 'Counties' : type === 'constituency' ? 'Constituencies' : 'Wards'}</h2>
                        <div className="mt-5 grid gap-3">
                            {(type === 'county' ? counties : type === 'constituency' ? constituencies : wards).map((item: any) => (
                                <div key={item.id} className="rounded-3xl bg-white/60 p-4 shadow-sm">
                                    <p className="font-semibold text-slate-950">{item.name}</p>
                                    <p className="mt-1 text-sm text-slate-600">
                                        {type === 'county' ? `${item.constituencies?.length ?? 0} constituencies` : type === 'constituency' ? `County: ${item.county?.name}` : `Ward in ${item.constituency?.name}`}
                                    </p>
                                </div>
                            ))}
                        </div>
                    </motion.section>

                    <motion.section
                        layout
                        className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl"
                    >
                        <h2 className="text-xl font-semibold text-slate-950">Add new {type}</h2>
                        <form action="/admin/locations" method="post" className="mt-6 space-y-4">
                            <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''} />
                            <input type="hidden" name="type" value={type} />
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Name</label>
                                <input
                                    name="name"
                                    className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400"
                                />
                            </div>

                            {type === 'constituency' && (
                                <div>
                                    <label className="block text-sm font-medium text-slate-700">County</label>
                                    <select name="county_id" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                                        <option value="">Select county</option>
                                        {counties.map((county) => (
                                            <option key={county.id} value={county.id}>{county.name}</option>
                                        ))}
                                    </select>
                                </div>
                            )}

                            {type === 'ward' && (
                                <div>
                                    <label className="block text-sm font-medium text-slate-700">Constituency</label>
                                    <select name="constituency_id" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                                        <option value="">Select constituency</option>
                                        {constituencies.map((constituency) => (
                                            <option key={constituency.id} value={constituency.id}>{constituency.name}</option>
                                        ))}
                                    </select>
                                </div>
                            )}

                            <button type="submit" className="inline-flex items-center justify-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                                Add {type}
                            </button>
                        </form>
                    </motion.section>
                </div>
            </motion.div>
        </>
    );
}

AdminLocations.layout = {
    breadcrumbs: [
        {
            title: 'Admin',
            href: '/admin/dashboard',
        },
        {
            title: 'Locations',
            href: '/admin/locations',
        },
    ],
};
