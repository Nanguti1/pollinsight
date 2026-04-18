import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';

export default function ContactsPage() {
    return (
        <>
            <Head title="Contact" />
            <div className="grid gap-6 lg:grid-cols-[1.1fr_0.9fr]">
                <motion.section initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} className="rounded-3xl border border-white/40 bg-white/65 p-8 shadow-xl backdrop-blur-xl">
                    <p className="text-sm uppercase tracking-[0.25em] text-slate-500">Contact</p>
                    <h1 className="mt-3 text-4xl font-bold tracking-tight text-slate-950">Get in touch</h1>
                    <p className="mt-4 text-slate-600">We would love to hear from you. Reach out for partnerships, county onboarding, or product feedback.</p>

                    <form className="mt-8 space-y-4">
                        <div>
                            <label htmlFor="name" className="block text-sm font-medium text-slate-700">Name</label>
                            <input id="name" name="name" type="text" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/90 px-4 py-3 text-sm outline-none transition focus:border-slate-400" placeholder="Your name" />
                        </div>
                        <div>
                            <label htmlFor="email" className="block text-sm font-medium text-slate-700">Email</label>
                            <input id="email" name="email" type="email" className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/90 px-4 py-3 text-sm outline-none transition focus:border-slate-400" placeholder="you@example.com" />
                        </div>
                        <div>
                            <label htmlFor="message" className="block text-sm font-medium text-slate-700">Message</label>
                            <textarea id="message" name="message" rows={5} className="mt-2 w-full rounded-2xl border border-slate-200 bg-white/90 px-4 py-3 text-sm outline-none transition focus:border-slate-400" placeholder="How can we help?" />
                        </div>
                        <motion.button whileTap={{ scale: 0.98 }} type="button" className="rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                            Send message
                        </motion.button>
                    </form>
                </motion.section>

                <motion.aside initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.05 }} className="rounded-3xl border border-white/40 bg-white/65 p-8 shadow-xl backdrop-blur-xl">
                    <h2 className="text-xl font-semibold text-slate-950">Platform office</h2>
                    <div className="mt-4 space-y-3 text-sm text-slate-700">
                        <p><span className="font-semibold">Email:</span> hello@pollinsight.co.ke</p>
                        <p><span className="font-semibold">Phone:</span> +254 700 000 000</p>
                        <p><span className="font-semibold">Location:</span> Nairobi, Kenya</p>
                    </div>
                </motion.aside>
            </div>
        </>
    );
}
