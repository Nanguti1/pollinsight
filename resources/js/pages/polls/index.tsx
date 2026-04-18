import { Head, Link } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function PollList({ polls }: { polls: { id: number; title: string; position: string; end_date: string; location: string }[] }) {
    return (
        <>
            <Head title="Open Polls" />
            <motion.div initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.35 }} className="space-y-6">
                <div className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-xl backdrop-blur-xl">
                    <h1 className="text-3xl font-semibold text-slate-950">Open polls</h1>
                    <p className="mt-2 text-slate-600">Participate in live surveys for Kenya's national and county races.</p>
                </div>
                <div className="grid gap-6 lg:grid-cols-2">
                    {polls.map((poll) => (
                        <motion.div
                            key={poll.id}
                            whileHover={{ y: -3 }}
                            className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl transition"
                        >
                            <div className="flex items-center justify-between gap-3">
                                <div>
                                    <p className="text-sm uppercase tracking-[0.3em] text-slate-500">{poll.position}</p>
                                    <h2 className="mt-3 text-2xl font-semibold text-slate-950">{poll.title}</h2>
                                </div>
                                <span className="rounded-full bg-slate-800/80 px-3 py-1 text-xs uppercase tracking-[0.25em] text-white">Live</span>
                            </div>
                            <p className="mt-4 text-sm text-slate-600">{poll.location}</p>
                            <p className="mt-2 text-sm text-slate-500">Closes {poll.end_date}</p>
                            <Link href={`/polls/${poll.id}`} className="mt-6 inline-flex items-center gap-2 rounded-full bg-slate-950 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                                View poll
                            </Link>
                        </motion.div>
                    ))}
                </div>
            </motion.div>
        </>
    );
}
