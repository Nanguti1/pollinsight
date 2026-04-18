import { Head, Link, usePage } from '@inertiajs/react';
import { motion } from 'framer-motion';
import { dashboard, login, register } from '@/routes';

export default function Welcome({ canRegister = true }: { canRegister?: boolean }) {
    const { auth } = usePage().props as any;

    return (
        <>
            <Head title="PollInsight Kenya" />
            <div className="min-h-screen bg-gradient-to-b from-slate-50 via-white to-slate-100 px-6 py-8 text-slate-900">
                <header className="mx-auto flex w-full max-w-6xl items-center justify-between">
                    <div>
                        <p className="text-xs uppercase tracking-[0.28em] text-slate-500">PollInsight Kenya</p>
                        <p className="text-sm text-slate-600">Real-time political opinion analytics</p>
                    </div>
                    <nav className="flex items-center gap-3">
                        <Link href={route('about')} className="rounded-full border border-slate-200 px-4 py-2 text-sm hover:bg-slate-100">About</Link>
                        <Link href={route('contacts')} className="rounded-full border border-slate-200 px-4 py-2 text-sm hover:bg-slate-100">Contact</Link>
                        {auth.user ? (
                            <Link href={dashboard()} className="rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white">Dashboard</Link>
                        ) : (
                            <>
                                <Link href={login()} className="rounded-full border border-slate-300 px-4 py-2 text-sm">Log in</Link>
                                {canRegister && <Link href={register()} className="rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white">Register</Link>}
                            </>
                        )}
                    </nav>
                </header>

                <main className="mx-auto mt-10 w-full max-w-6xl space-y-8">
                    <motion.section initial={{ opacity: 0, y: 14 }} animate={{ opacity: 1, y: 0 }} className="rounded-3xl border border-white/40 bg-white/60 p-8 shadow-xl backdrop-blur-xl">
                        <p className="text-sm uppercase tracking-[0.25em] text-slate-500">What we do</p>
                        <h1 className="mt-3 text-4xl font-bold">A centralized platform for tracking aspirants and public opinion across Kenya's 47 counties.</h1>
                        <p className="mt-5 max-w-3xl text-slate-600">We provide structured polling, live vote insights, and rankings across national, county, constituency, and ward levels to support transparent civic conversations.</p>
                        <div className="mt-7 flex flex-wrap gap-3">
                            <Link href="/polls" className="rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white">Explore polls</Link>
                            <Link href="/rankings" className="rounded-full border border-slate-300 px-5 py-3 text-sm font-semibold">View rankings</Link>
                        </div>
                    </motion.section>

                    <section className="grid gap-5 md:grid-cols-3">
                        <div className="rounded-3xl border border-white/40 bg-white/70 p-6 backdrop-blur-xl">
                            <h2 className="text-lg font-semibold">Who we are</h2>
                            <p className="mt-3 text-sm text-slate-600">We are a civic-tech team building independent, anonymous opinion polling infrastructure for informed democratic participation.</p>
                        </div>
                        <div className="rounded-3xl border border-white/40 bg-white/70 p-6 backdrop-blur-xl">
                            <h2 className="text-lg font-semibold">Coverage</h2>
                            <p className="mt-3 text-sm text-slate-600">County, constituency, and ward-aware insights for positions from President to MCA.</p>
                        </div>
                        <div className="rounded-3xl border border-white/40 bg-white/70 p-6 backdrop-blur-xl">
                            <h2 className="text-lg font-semibold">Integrity</h2>
                            <p className="mt-3 text-sm text-slate-600">Anonymous voting with anti-duplicate protections using device fingerprints and backend safeguards.</p>
                        </div>
                    </section>
                </main>
            </div>
        </>
    );
}
