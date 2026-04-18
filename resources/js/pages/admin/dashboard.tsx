import { Head, Link } from '@inertiajs/react';
import { motion } from 'framer-motion';
import { Activity, MapPin, Users, LayoutGrid, ListChecks } from 'lucide-react';

export default function AdminDashboard({ summary }: { summary: Record<string, number> }) {
    return (
        <>
            <Head title="Admin Dashboard" />
            <motion.div
                initial={{ opacity: 0, y: 12 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.35 }}
                className="space-y-6"
            >
                <div className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-xl shadow-black/5 backdrop-blur-xl">
                    <div className="flex items-center justify-between gap-4">
                        <div>
                            <p className="text-sm uppercase tracking-[0.3em] text-slate-500">Platform overview</p>
                            <h1 className="mt-3 text-3xl font-semibold text-slate-950">Polling hub</h1>
                        </div>
                        <div className="rounded-3xl bg-slate-900/90 p-3 text-white shadow-lg shadow-slate-900/10">
                            <LayoutGrid className="h-6 w-6" />
                        </div>
                    </div>
                </div>

                <div className="grid gap-4 md:grid-cols-4">
                    {[
                        { label: 'Counties', value: summary.counties, icon: MapPin },
                        { label: 'Positions', value: summary.positions, icon: ListChecks },
                        { label: 'Aspirants', value: summary.aspirants, icon: Users },
                        { label: 'Polls', value: summary.polls, icon: Activity },
                    ].map((item) => (
                        <motion.div
                            key={item.label}
                            initial={{ opacity: 0, y: 12 }}
                            animate={{ opacity: 1, y: 0 }}
                            transition={{ duration: 0.3, delay: 0.05 }}
                            className="rounded-3xl border border-white/10 bg-slate-950/5 p-5 shadow-sm shadow-slate-950/5 backdrop-blur"
                        >
                            <div className="flex items-center gap-3 text-slate-700">
                                <item.icon className="h-5 w-5 text-slate-500" />
                                <p className="text-sm uppercase tracking-[0.24em] text-slate-500">{item.label}</p>
                            </div>
                            <p className="mt-5 text-4xl font-semibold text-slate-950">{item.value}</p>
                        </motion.div>
                    ))}
                </div>

                <div className="grid gap-4 lg:grid-cols-3">
                    {[
                        { title: 'Aspirants', href: '/admin/aspirants', description: 'Manage candidates and party alignment.' },
                        { title: 'Polls', href: '/admin/polls', description: 'Create polling rounds and review results.' },
                        { title: 'Locations', href: '/admin/locations', description: 'Keep counties, constituencies, and wards updated.' },
                    ].map((item) => (
                        <motion.div
                            key={item.title}
                            whileHover={{ y: -4 }}
                            className="rounded-3xl border border-white/10 bg-white/40 p-6 shadow-lg shadow-indigo-500/5 backdrop-blur-xl transition-all duration-200"
                        >
                            <h2 className="text-xl font-semibold text-slate-950">{item.title}</h2>
                            <p className="mt-3 text-sm leading-6 text-slate-600">{item.description}</p>
                            <Link
                                href={item.href}
                                className="mt-6 inline-flex items-center gap-2 rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800"
                            >
                                Open
                            </Link>
                        </motion.div>
                    ))}
                </div>
            </motion.div>
        </>
    );
}

AdminDashboard.layout = {
    breadcrumbs: [
        {
            title: 'Admin',
            href: '/admin/dashboard',
        },
    ],
};
