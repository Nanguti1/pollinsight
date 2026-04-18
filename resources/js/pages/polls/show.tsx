import { Head, useForm, usePage } from '@inertiajs/react';
import { motion } from 'framer-motion';
import { useEffect, useState } from 'react';

export default function PollShow({ poll, options, total_votes }: { poll: any; options: any[]; total_votes: number }) {
    const { flash } = usePage().props as any;
    const [fingerprint, setFingerprint] = useState('');
    const form = useForm({ poll_option_id: '', fingerprint: '' });

    useEffect(() => {
        let mounted = true;

        import('@fingerprintjs/fingerprintjs').then((FingerprintJS) => {
            return FingerprintJS.load();
        }).then((fpAgent) => {
            if (! mounted) {
                return;
            }

            return fpAgent.get();
        }).then((result) => {
            if (mounted && result) {
                setFingerprint(result.visitorId);
                form.setData('fingerprint', result.visitorId);
            }
        }).catch(() => {
            setFingerprint('');
        });

        return () => {
            mounted = false;
        };
    }, [form]);

    useEffect(() => {
        const interval = window.setInterval(() => {
            form.get(window.location.pathname, { preserveState: true, preserveScroll: true, only: ['options', 'total_votes'] });
        }, 5000);

        return () => window.clearInterval(interval);
    }, [form]);

    return (
        <>
            <Head title={poll.title} />
            <motion.div initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.35 }} className="space-y-6">
                <div className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-xl backdrop-blur-xl">
                    <p className="text-sm uppercase tracking-[0.3em] text-slate-500">Voting</p>
                    <h1 className="mt-3 text-3xl font-semibold text-slate-950">{poll.title}</h1>
                    <p className="mt-3 text-sm text-slate-600">Location: {poll.county?.name || poll.constituency?.name || poll.ward?.name || 'National'}</p>
                </div>

                {flash.success && (
                    <motion.div initial={{ opacity: 0, y: 8 }} animate={{ opacity: 1, y: 0 }} className="rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800 shadow-sm">
                        {flash.success}
                    </motion.div>
                )}

                <div className="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
                    <motion.section className="rounded-3xl border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Select your aspirant</h2>
                        <form
                            onSubmit={(event) => {
                                event.preventDefault();
                                form.post(`${window.location.pathname}/vote`, {
                                    preserveScroll: true,
                                });
                            }}
                            className="mt-6 space-y-4"
                        >
                            <input type="hidden" name="fingerprint" value={fingerprint} />
                            <div className="space-y-4">
                                {options.map((option) => (
                                    <label key={option.id} className="group block rounded-3xl border border-slate-200 bg-white/80 p-4 transition hover:border-slate-400">
                                        <input
                                            type="radio"
                                            name="poll_option_id"
                                            value={option.id}
                                            checked={form.data.poll_option_id === String(option.id)}
                                            onChange={(event) => form.setData('poll_option_id', event.target.value)}
                                            className="sr-only"
                                        />
                                        <div className="flex items-center gap-4">
                                            <img src={option.aspirant.photo || 'https://via.placeholder.com/80'} alt={option.aspirant.name} className="h-20 w-20 rounded-3xl object-cover" />
                                            <div>
                                                <p className="text-lg font-semibold text-slate-950">{option.aspirant.name}</p>
                                                <p className="text-sm text-slate-600">{option.aspirant.party}</p>
                                                <p className="mt-1 text-sm text-slate-500">{option.votes_count} votes</p>
                                            </div>
                                        </div>
                                    </label>
                                ))}
                            </div>
                            <button
                                type="submit"
                                disabled={!form.data.poll_option_id || !fingerprint}
                                className="inline-flex items-center justify-center rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800 disabled:cursor-not-allowed disabled:opacity-60"
                            >
                                Vote now
                            </button>
                        </form>
                    </motion.section>

                    <motion.section className="rounded-3xl border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Live results</h2>
                        <p className="mt-2 text-sm text-slate-600">Updating every 5 seconds.</p>
                        <div className="mt-5 space-y-4">
                            {options.map((option) => {
                                const percent = total_votes > 0 ? Math.round((option.votes_count / total_votes) * 100) : 0;
                                return (
                                    <div key={option.id} className="space-y-2">
                                        <div className="flex items-center justify-between text-sm text-slate-700">
                                            <span>{option.aspirant.name}</span>
                                            <span>{percent}%</span>
                                        </div>
                                        <div className="h-3 overflow-hidden rounded-full bg-slate-200">
                                            <div className="h-full rounded-full bg-slate-950 transition-all duration-300" style={{ width: `${percent}%` }} />
                                        </div>
                                    </div>
                                );
                            })}
                        </div>
                    </motion.section>
                </div>
            </motion.div>
        </>
    );
}
