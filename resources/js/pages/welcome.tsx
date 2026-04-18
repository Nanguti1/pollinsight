import { Head, Link } from '@inertiajs/react';
import { motion } from 'framer-motion';
import PollCard from '@/components/public/poll-card';

export default function Welcome({ activePolls }: { activePolls: { id: number; title: string; position: string; location: string; end_date: string }[] }) {
    return (
        <>
            <Head title="Home" />
            <section className="rounded-3xl border border-white/40 bg-white/60 p-8 shadow-xl backdrop-blur-xl md:p-12">
                <motion.p initial={{ opacity: 0, y: 8 }} animate={{ opacity: 1, y: 0 }} className="text-sm uppercase tracking-[0.25em] text-slate-500">
                    Political polls & insights
                </motion.p>
                <motion.h1 initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.05 }} className="mt-4 max-w-4xl text-4xl font-bold tracking-tight text-slate-950 md:text-5xl">
                    A centralized platform for tracking political aspirants and public opinion across Kenya.
                </motion.h1>
                <motion.p initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.1 }} className="mt-5 max-w-2xl text-slate-600">
                    Explore structured polls across the 47 counties, monitor public sentiment in real time, and view transparent candidate rankings.
                </motion.p>
                <motion.div initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.15 }} className="mt-7">
                    <Link href="/polls" className="inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition duration-200 hover:bg-slate-800">
                        View active polls
                    </Link>
                </motion.div>
            </section>

            <section className="mt-10">
                <div className="mb-5 flex items-end justify-between gap-3">
                    <div>
                        <h2 className="text-2xl font-semibold text-slate-950">Active polls</h2>
                        <p className="text-sm text-slate-600">Vote in live public opinion polls by position and location.</p>
                    </div>
                    <Link href="/polls" className="text-sm font-semibold text-slate-700 underline underline-offset-4">See all</Link>
                </div>

                {activePolls.length > 0 ? (
                    <div className="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                        {activePolls.map((poll) => (
                            <PollCard key={poll.id} poll={poll} />
                        ))}
                    </div>
                ) : (
                    <div className="rounded-3xl border border-white/40 bg-white/70 p-6 text-sm text-slate-600">No active polls right now. Please check back soon.</div>
                )}
            </section>
        </>
    );
}
