import { Head, Link } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function AboutPage() {
    return (
        <>
            <Head title="About PollInsight Kenya" />
            <div className="min-h-screen bg-slate-50 px-6 py-10">
                <motion.main initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} className="mx-auto w-full max-w-4xl space-y-6">
                    <Link href="/" className="text-sm text-slate-600 underline">← Back to home</Link>
                    <section className="rounded-3xl border border-white/40 bg-white/70 p-8 shadow-lg backdrop-blur-xl">
                        <p className="text-sm uppercase tracking-[0.25em] text-slate-500">About us</p>
                        <h1 className="mt-3 text-3xl font-bold text-slate-950">Who we are</h1>
                        <p className="mt-4 text-slate-600">PollInsight Kenya is a centralized civic-tech platform focused on anonymous public opinion polling and real-time political analytics. We track aspirants and trends across all 47 counties using structured geography and position-aware polling.</p>
                        <p className="mt-4 text-slate-600">Our mission is to make political sentiment measurable, transparent, and accessible while preserving voter anonymity and platform performance.</p>
                    </section>
                </motion.main>
            </div>
        </>
    );
}
