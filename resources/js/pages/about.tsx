import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function AboutPage({ aboutContent }: { aboutContent: string }) {
    return (
        <>
            <Head title="About" />
            <motion.section initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} className="rounded-3xl border border-white/40 bg-white/65 p-8 shadow-xl backdrop-blur-xl md:p-12">
                <p className="text-sm uppercase tracking-[0.25em] text-slate-500">About us</p>
                <h1 className="mt-3 text-4xl font-bold tracking-tight text-slate-950">Who we are</h1>
                <p className="mt-6 max-w-3xl whitespace-pre-line text-base leading-8 text-slate-700">{aboutContent}</p>
            </motion.section>
        </>
    );
}
