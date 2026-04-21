import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

type PoliticalParty = {
    id: number;
    name: string;
    abbreviation: string | null;
    aspirants_count: number;
};

export default function AdminPoliticalParties({ politicalParties }: { politicalParties: PoliticalParty[] }) {
    return (
        <>
            <Head title="Political Parties" />
            <motion.div initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.35 }} className="space-y-6">
                <div className="rounded-[10px] border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                    <h1 className="text-3xl font-semibold text-slate-950">Political parties</h1>
                    <p className="mt-2 text-slate-600">Create, update, and remove political parties used across aspirants and reporting.</p>
                </div>

                <div className="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                    <motion.section className="rounded-[10px] border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Registered political parties</h2>
                        <div className="mt-5 space-y-3">
                            {politicalParties.map((party) => (
                                <div key={party.id} className="rounded-[10px] bg-white/70 p-4 shadow-sm">
                                    <div className="flex items-center justify-between gap-4">
                                        <div>
                                            <p className="font-semibold text-slate-950">{party.name}</p>
                                            <p className="mt-1 text-sm text-slate-500">{party.abbreviation || 'No abbreviation'} • {party.aspirants_count} aspirants</p>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </motion.section>

                    <motion.section className="rounded-[10px] border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Add political party</h2>
                        <form action="/admin/political-parties" method="post" className="mt-6 space-y-4">
                            <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''} />
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Party name</label>
                                <input name="name" required className="mt-2 w-full rounded-[10px] border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950" />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Abbreviation</label>
                                <input name="abbreviation" maxLength={20} className="mt-2 w-full rounded-[10px] border border-slate-200 bg-white/80 px-4 py-3 text-sm text-slate-950" />
                            </div>
                            <button type="submit" className="inline-flex items-center justify-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                                Add political party
                            </button>
                        </form>
                    </motion.section>
                </div>
            </motion.div>
        </>
    );
}

AdminPoliticalParties.layout = {
    breadcrumbs: [
        {
            title: 'Admin',
            href: '/admin/dashboard',
        },
        {
            title: 'Political Parties',
            href: '/admin/political-parties',
        },
    ],
};
