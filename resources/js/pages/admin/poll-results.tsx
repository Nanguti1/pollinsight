import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function AdminPollResults({ poll, options, total_votes }: { poll: any; options: any[]; total_votes: number }) {
    return (
        <>
            <Head title="Poll Results" />
            <motion.div initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.35 }} className="space-y-6">
                <div className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-xl backdrop-blur-xl">
                    <h1 className="text-3xl font-semibold text-slate-950">{poll.title}</h1>
                    <p className="mt-2 text-slate-600">Location: {poll.county?.name || poll.constituency?.name || poll.ward?.name || 'National'}</p>
                </div>
                <div className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl">
                    <h2 className="text-xl font-semibold text-slate-950">Results</h2>
                    <p className="mt-2 text-sm text-slate-600">Total votes cast: {total_votes}</p>
                    <div className="mt-6 space-y-3">
                        {options.map((option) => (
                            <div key={option.id} className="rounded-3xl bg-white/70 p-4 shadow-sm">
                                <div className="flex items-center justify-between gap-4">
                                    <div>
                                        <p className="font-semibold text-slate-950">{option.aspirant.name}</p>
                                        <p className="mt-1 text-sm text-slate-600">{option.aspirant.party}</p>
                                    </div>
                                    <div className="text-right">
                                        <p className="text-lg font-semibold text-slate-950">{option.votes_count}</p>
                                        <p className="text-sm text-slate-500">votes</p>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </motion.div>
        </>
    );
}

AdminPollResults.layout = {
    breadcrumbs: [
        {
            title: 'Admin',
            href: '/admin/dashboard',
        },
        {
            title: 'Poll Results',
            href: '/admin/polls',
        },
    ],
};
