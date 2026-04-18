import { Head, Link } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function ContactsPage() {
    return (
        <>
            <Head title="Contact PollInsight Kenya" />
            <div className="min-h-screen bg-slate-50 px-6 py-10">
                <motion.main initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} className="mx-auto w-full max-w-4xl space-y-6">
                    <Link href="/" className="text-sm text-slate-600 underline">← Back to home</Link>
                    <section className="rounded-3xl border border-white/40 bg-white/70 p-8 shadow-lg backdrop-blur-xl">
                        <p className="text-sm uppercase tracking-[0.25em] text-slate-500">Contact</p>
                        <h1 className="mt-3 text-3xl font-bold text-slate-950">Get in touch</h1>
                        <p className="mt-4 text-slate-600">Want to partner, integrate data, or request onboarding for your county dashboard? Reach us through the channels below.</p>
                        <div className="mt-6 space-y-3 text-slate-700">
                            <p><span className="font-semibold">Email:</span> hello@pollinsight.co.ke</p>
                            <p><span className="font-semibold">Phone:</span> +254 700 000 000</p>
                            <p><span className="font-semibold">Location:</span> Nairobi, Kenya</p>
                        </div>
                    </section>
                </motion.main>
            </div>
        </>
    );
}
