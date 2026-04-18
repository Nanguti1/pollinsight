import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function AdminAspirants({ aspirants, positions, counties, constituencies, wards }: { aspirants: any[]; positions: any[]; counties: any[]; constituencies: any[]; wards: any[] }) {
    return (
        <>
            <Head title="Aspirants" />
            <motion.div initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.35 }} className="space-y-6">
                <div className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-xl backdrop-blur-xl">
                    <div>
                        <p className="text-sm uppercase tracking-[0.3em] text-slate-500">Aspirants management</p>
                        <h1 className="mt-3 text-3xl font-semibold text-slate-950">Candidates and profiles</h1>
                    </div>
                </div>

                <div className="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
                    <motion.section className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Active aspirants</h2>
                        <div className="mt-5 space-y-3">
                            {aspirants.map((aspirant) => (
                                <div key={aspirant.id} className="grid gap-3 rounded-3xl bg-white/60 p-4 shadow-sm sm:grid-cols-[auto_1fr]">
                                    <img src={aspirant.photo || 'https://via.placeholder.com/96'} alt={aspirant.name} className="h-24 w-24 rounded-3xl object-cover" />
                                    <div>
                                        <p className="text-lg font-semibold text-slate-950">{aspirant.name}</p>
                                        <p className="mt-1 text-sm text-slate-600">{aspirant.party}</p>
                                        <p className="mt-2 text-sm text-slate-500">{aspirant.position?.name} • {aspirant.county?.name || aspirant.constituency?.name || aspirant.ward?.name || 'National'}</p>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </motion.section>

                    <motion.section className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Add new aspirant</h2>
                        <form action="/admin/aspirants" method="post" className="mt-6 space-y-4">
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Full name</label>
                                <input name="name" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400" />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Profile photo URL</label>
                                <input name="photo" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400" />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Party</label>
                                <input name="party" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400" />
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
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Status</label>
                                <select name="status" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Bio</label>
                                <textarea name="bio" rows={4} className="mt-2 w-full rounded-3xl border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950 outline-none transition focus:border-slate-400" />
                            </div>
                            <button type="submit" className="inline-flex items-center justify-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                                Add aspirant
                            </button>
                        </form>
                    </motion.section>
                </div>
            </motion.div>
        </>
    );
}

AdminAspirants.layout = {
    breadcrumbs: [
        {
            title: 'Admin',
            href: '/admin/dashboard',
        },
        {
            title: 'Aspirants',
            href: '/admin/aspirants',
        },
    ],
};
