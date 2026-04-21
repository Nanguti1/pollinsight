import { Head, useForm, usePage } from '@inertiajs/react';
import { AnimatePresence, motion } from 'framer-motion';
import { useEffect, useState } from 'react';

export default function PollShow({ poll, options, total_votes }: { poll: { id: number; title: string; location: string }; options: any[]; total_votes: number }) {
    const { flash = {} } = (usePage().props as any) || {};
    const [fingerprint, setFingerprint] = useState('');
    const form = useForm({ poll_option_id: '', fingerprint: '' });

    useEffect(() => {
        let mounted = true;

        import('@fingerprintjs/fingerprintjs')
            .then((FingerprintJS) => FingerprintJS.load())
            .then((fpAgent) => {
                if (!mounted) {
                    return null;
                }

                return fpAgent.get();
            })
            .then((result) => {
                if (mounted && result) {
                    setFingerprint(result.visitorId);
                    form.setData('fingerprint', result.visitorId);
                }
            })
            .catch(() => {
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

        return () => {
            window.clearInterval(interval);
        };
    }, [form]);

    return (
        <>
            <Head title={poll.title} />

            <section className="rounded-3xl border border-white/40 bg-white/65 p-8 shadow-xl backdrop-blur-xl">
                <p className="text-xs uppercase tracking-[0.25em] text-slate-500">Voting booth</p>
                <h1 className="mt-3 text-3xl font-bold tracking-tight text-slate-950">{poll.title}</h1>
                <p className="mt-2 text-sm text-slate-600">{poll.location}</p>
            </section>

            <AnimatePresence>
                {flash.success && (
                    <motion.div
                        initial={{ opacity: 0, y: 6 }}
                        animate={{ opacity: 1, y: 0 }}
                        exit={{ opacity: 0, y: -6 }}
                        className="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800"
                    >
                        {flash.success}
                    </motion.div>
                )}
                {flash.error && (
                    <motion.div
                        initial={{ opacity: 0, y: 6 }}
                        animate={{ opacity: 1, y: 0 }}
                        exit={{ opacity: 0, y: -6 }}
                        className="mt-6 rounded-2xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800"
                    >
                        {flash.error}
                    </motion.div>
                )}
            </AnimatePresence>

            <div className="mt-6 grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
                <section className="rounded-3xl border border-white/40 bg-white/65 p-6 shadow-lg backdrop-blur-xl">
                    <h2 className="text-xl font-semibold text-slate-950">Choose your aspirant</h2>

                    <form
                        onSubmit={(event) => {
                            event.preventDefault();
                            form.post(`${window.location.pathname}/vote`, { preserveScroll: true });
                        }}
                        className="mt-5 space-y-4"
                    >
                        <input type="hidden" name="fingerprint" value={fingerprint} />

                        {options.map((option) => {
                            const isSelected = form.data.poll_option_id === String(option.id);

                            return (
                                <motion.label
                                    key={option.id}
                                    whileHover={{ scale: 1.01 }}
                                    whileTap={{ scale: 0.99 }}
                                    className={`block cursor-pointer rounded-3xl border p-4 transition duration-200 ${isSelected ? 'border-slate-900 bg-slate-950 text-white' : 'border-slate-200 bg-white/90 text-slate-900 hover:border-slate-400'}`}
                                >
                                    <input
                                        type="radio"
                                        name="poll_option_id"
                                        value={option.id}
                                        checked={isSelected}
                                        onChange={(event) => form.setData('poll_option_id', event.target.value)}
                                        className="sr-only"
                                    />
                                    <div className="flex items-center gap-4">
                                        <img src={option.aspirant.photo || '/avatar.jpg'} alt={option.aspirant.name} className="h-16 w-16 rounded-2xl object-cover" />
                                        <div>
                                            <p className="font-semibold">{option.aspirant.name}</p>
                                            <p className={`text-sm ${isSelected ? 'text-white/80' : 'text-slate-600'}`}>{option.aspirant.party}</p>
                                        </div>
                                    </div>
                                </motion.label>
                            );
                        })}

                        <motion.button
                            whileTap={{ scale: 0.98 }}
                            type="submit"
                            disabled={!form.data.poll_option_id || !fingerprint || form.processing}
                            className="inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition duration-200 hover:bg-slate-800 disabled:cursor-not-allowed disabled:opacity-50"
                        >
                            {form.processing ? 'Submitting...' : 'Submit vote'}
                        </motion.button>
                    </form>
                </section>

                <section className="rounded-3xl border border-white/40 bg-white/65 p-6 shadow-lg backdrop-blur-xl">
                    <h2 className="text-xl font-semibold text-slate-950">Live results</h2>
                    <p className="mt-1 text-xs text-slate-500">Auto-refresh every 5 seconds</p>
                    <div className="mt-5 space-y-4">
                        {options.map((option) => {
                            const percentage = total_votes > 0 ? Math.round((option.votes_count / total_votes) * 100) : 0;

                            return (
                                <div key={option.id}>
                                    <div className="mb-1 flex items-center justify-between text-sm text-slate-700">
                                        <span>{option.aspirant.name}</span>
                                        <span>{percentage}%</span>
                                    </div>
                                    <div className="h-2.5 overflow-hidden rounded-full bg-slate-200">
                                        <motion.div
                                            initial={{ width: 0 }}
                                            animate={{ width: `${percentage}%` }}
                                            transition={{ duration: 0.25 }}
                                            className="h-full rounded-full bg-slate-900"
                                        />
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                </section>
            </div>
        </>
    );
}
